<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produit;
use App\Photo;
use App\Category;
use App\User;
use App\Commande;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $categories;
    public function __construct()
    {
         $this->categories =Category::all();
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $produits=Produit::all();
        $produitsPromo=Produit::all();
        $currency ="Dhs";
        $categories=$this->categories;

        return view('home',compact('produits','currency','produitsPromo','categories'));
    }

    public function search(Request $request)
    {
        $val = $request->input('search');

        $produits =Produit::where('nom_pr', 'LIKE', "%$val%")->orderBy('id', 'desc')->paginate(16);

        $categories = $this->categories;
        $currency="Dhs";

        return view('public/all',compact('produits','categories','currency'));
    }

    public function byCategorie($id)
    {
        $produits = Produit::where("categorie_id","=",$id)->orderBy('id', 'desc')->paginate(16);

        $cat = Category::find($id);

        $categories = $this->categories;
        $currency="Dhs";
        
        return view('public/categorie',compact('produits','cat','categories','currency'));
    }

    public function detailProduct($id,$name)
    {
        $similaireProduct=array();
        $produit = Produit::where("id","=" ,$id)->where("nom","=" ,urldecode($name))->get();
        //var_dump($produit);exit();

        //$produit = Produit::find($id);
        if (count($produit) > 0) 
        {
            
            $similaireProduct  = Produit::where("categorie_id","=" ,$produit[0]->categorie_id)->where("id","!=" ,$produit[0]->id)->orderBy('id', 'desc')->offset(0)->limit(4)->get();
            $produit = $produit[0];

            $categories = $this->categories;
            $currency="Dhs";
            
            return view('public/detail_produit',compact('produit','similaireProduct','categories','currency'));
        }
        else
        {
             return redirect('/');
        }

    }
    public function panier()
    {
        $categories = $this->categories;
        $currency="Dhs";

        return view('public/panier',compact('categories','currency'));

    }


    public function addToCart($id ,$redirct = false,$qte="",$attrs=array(),$valattrs=array())
    {
        $qantity = ($qte!="") ? $qte : 1;
        $attrs = ($attrs!="") ? $attrs : NULL;
        $valattrs = ($valattrs!="") ? $valattrs : NULL;

        $product = Produit::find($id);
 
        if(!$product) {
 
            abort(404);
 
        }
        
        $price =$product->prix;
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first product
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "id" => $id,
                        "name" => $product->nom,
                        "quantity" => $qantity,
                        "price" => $price,
                        "photos" => $product->images,
                        "attrs" => $attrs,
                        "valattrs" =>$valattrs
                    ]
            ];
 
        }
        // if cart not empty then check if this product exist then increment quantity
        else if(isset($cart[$id])) {
 
            $cart[$id]['quantity'] = $cart[$id]['quantity'] + $qantity;
 
            session()->put('cart', $cart);

            return array("valid" => true, "msg" => "Produit Ajouté au panier avec success");
 
            //return redirect()->back()->with('success', __('msg.msg_success_addtocart') );
 
        }
        // if item not exist in cart then add to cart with quantity = 1
        else
        {
            $cart[$id] = [
                "id" => $id,
                "name" => $product->nom,
                "quantity" => $qantity,
                "price" => $price,
                "photos" => $product->images,
                "attrs" => $attrs,
                "valattrs" =>$valattrs
            ];

        }
 
        session()->put('cart', $cart);

        if ($redirct) {
            return redirect()->back()->with('success', __('msg.msg_success_addtocart') );
        }
        else
        {
            return array("valid" => true, "msg" => "Produit Ajouté au panier avec success");
        }
 
        
    }

    public function getCountCart()
    {
        if (is_array(session('cart')) && count(session('cart')) > 0)
        {
            return count(session('cart'));
        }

        return 0 ;
    }

    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');
 
            $cart[$request->id]["quantity"] = $request->quantity;
 
            session()->put('cart', $cart);
 
            session()->flash('success', __('msg.msg_success_updatecart'));
        }
    }
 
    public function removeCart(Request $request)
    {
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', __('Produit supprimé avec succeess') );
        }
    }

    public function commander(Request $request, $id,$detailPr = 0)
    {
        $attrs =array();
        $valattrs = array();
        $qte = $request->input('qty');
        $attrsids = $request->input('attrs');

        if(count($attrsids) > 0)
        {
            foreach ($attrsids as $attr) {
               $valattrs[] = $request->input('valattrs'.$attr);
               $attrs[] = Attribute::find($attr)->nom_attr;
            }
        }

        $this->addToCart($id,false,$qte,$attrs,$valattrs);

        if ($detailPr == 1) {
            return true ;
            
        }

        return redirect('panier');
    }

    public function getAllProduct()
    {
        $allproducts ="";
        if(session('cart'))
        {
            foreach(session('cart') as $id => $details)
            {

                $variants ="";
                if (count($details['attrs']) == count($details['valattrs'])) 
                {
                    
                    for($i = 0 ; $i < count($details['attrs']) ;$i++)
                    {
                        $variants.=$details['attrs'][$i]." : ". $details['valattrs'][$i]. " - ";
                    }

                }

                $allproducts .= "( ".$details['quantity']." ) ( ".$variants." ) ".$details['name'];
            }
        }

        return $allproducts;
                                        
    }

    public function commanderNow($id)
    {
        $this->addToCart($id,false);

        return redirect('panier');
    }
    
    public function thanks()
    {
        $data =array("categories"=> $this->categories,"currency"=>"dhs");

        return view('public/merci',$data);
    }

    public function placeorder(Request $request)
    {
        $cart = session()->get('cart');
        $user=User::firstOrNew([
                'email' => $request->input('email'),
                'nom' => $request->input('nom'),
              ]);
        if(!$user->id)
        {
            $user->nom = $request->input('nom');
            $user->email = $request->input('email');
            $user->tel = $request->input('tel');
            $user->adresse = $request->input('adresse');
            $user->type_id = 3;
            $user->save();
        }

        $commande =new Commande();
        $commande->date = date("Y-m-d H:i:s");
        $commande->status="en attente";
        $commande->user_id=$user->id;
        $commande->save();

        if (count($cart) > 0) 
        {
            foreach($cart as $id => $details)
            {
                $produit = Produit::find($details['id']);

                $commande->Produits()->attach($details['id'],['quantite' =>  $details['quantity'],'prix_unite' => $produit->prix ]);

            }

            $request->session()->forget('cart');

        }

         return redirect('merci');

    }
    public function placeorderNow(Request $request)
    {
        $this->addToCart($request->input('key'),false,$request->input('qty'));
        $this->placeorder($request);
         return redirect('merci');
    }

}
