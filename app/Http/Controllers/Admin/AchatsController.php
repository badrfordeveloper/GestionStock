<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Achat;
use App\Produit;
use App\Achat_produit;
use App\User;
use Illuminate\Http\Request;

class AchatsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $achats = Achat::where('date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $achats = Achat::latest()->paginate($perPage);
        }

        return view('admin.achats.index', compact('achats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $fournisseurs = User::where('type_id',4)->get();
        return view('admin.achats.create',compact('fournisseurs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
          // retrieve data from serialize array becarful with order of input

        $Date=$request->mydata[1]['value'];
/*        $Facture=$request->mydata[2]['value'];*/
        $fournissour_id=$request->mydata[2]['value'];

      /*  $total=0;*/

        // calculer total et reduce qtte from stock
       foreach ($request->myproduct as $p) {

            /*$total+=$p['prix']*$p['RQtte'];*/
            $produit = Produit::find($p['id']);
            $produit->quantite += $p['RQtte'];
            $produit->save();
        }


        //add Achat
        $achat = new Achat;
        $achat->date = $Date ;
      /*  $achat->status = $Status ;
        $achat->total = $total ;*/
        $achat->user_id = $fournissour_id ;
        $achat->save();


        //add the product in ligneCommande
        foreach ($request->myproduct as $p) {


            $achat->Produits()->attach($p['id'],['quantite' =>  $p['RQtte']]);

  /*          $lignecommande = new Lignecommande;
            $lignecommande->quantite = $p['RQtte'];
            $lignecommande->prix_unite = $p['prix'];
            $lignecommande->produit_id = $p['id'];
            $lignecommande->commande_id =  $commande->id;
            $lignecommande->save();*/
        }
            echo 'ajouter avec Succes';
        /*
        
        Achat::create($requestData);

        return redirect('admin/achats')->with('flash_message', 'Achat added!');*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $achat_produit = Achat_produit::where('achat_id','=',$id)
                        ->join('produits', 'produits.id', '=', 'achat_produit.produit_id')
                        ->select('produits.id', 'produits.nom','achat_produit.quantite as RQtte')
                        ->get();

        $achat = Achat::findOrFail($id);
        $fournisseurs = User::where('type_id',4)->get();

        return view('admin.achats.show', compact('achat','fournisseurs','achat_produit'));

        /*return view('admin.achats.show', compact('achat'));*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {

               $achat_produit = Achat_produit::where('achat_id','=',$id)
                            ->join('produits', 'produits.id', '=', 'achat_produit.produit_id')
                            ->select('produits.id', 'produits.nom','achat_produit.quantite as RQtte')
                            ->get();

        $achat = Achat::findOrFail($id);
        $fournisseurs = User::where('type_id',4)->get();

        return view('admin.achats.edit', compact('achat','fournisseurs','achat_produit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {

        // retrieve data from serialize array becarful with order of input
         $Date=$request->mydata[2]['value'];
        /* $Facture=$request->mydata[2]['value'];*/
        $fournissour_id=$request->mydata[3]['value'];
        $total=0;


         $achat_produitss = Achat_produit::where('achat_id','=',$id)->get();


        foreach ($achat_produitss as $achat) {

            $found=false;
            foreach ($request->myproduct as $p) {

                if($p['id']==$achat->produit_id){
                    $found=true;
                    break;
                }
            }

            if($found==false){
                $produit = Produit::find($achat->produit_id);
                $produit->quantite -= $achat->quantite;
                $produit->save();
            }
            
        }




        // calculer total et reduce qtte from stock
        foreach ($request->myproduct as $p) {
            $produit = Produit::find($p['id']);

            $achat_produit = Achat_produit::where('produit_id','=',$p['id'])
                            ->where('achat_id','=',$id)
                            ->get();

            if(count($achat_produit)){
                if($p['RQtte']<$achat_produit[0]->quantite){
                    $newQTTe=$achat_produit[0]->quantite-$p['RQtte'];
                    $produit->quantite -= $newQTTe;
                }else if ($p['RQtte']> $achat_produit[0]->quantite){
                    $newQTTe=$p['RQtte']-$achat_produit[0]->quantite;
                    $produit->quantite += $newQTTe;
                }

            }
            else{
                $produit->quantite += $p['RQtte'];
            }

           

            $produit->save();
        }


        //add Commande

            $achat = Achat::findOrFail($id);
            $achat->date = $Date ;
          /*  $achat->status = $Status ;
            $achat->total = $total ;*/
            $achat->user_id = $fournissour_id ;
            $achat->save();

                $data = array();

                //add the product in ligneCommande
                foreach ($request->myproduct as $p) {
          /*          if(count($data)>=1){
                        array_push($data[0], $p['id'] => array('quantite' =>  $p['RQtte'] ,'prix_unite' => $p['prix']));
                    }
                    else{*/
                        $data[$p['id'] ]=array('quantite' =>  $p['RQtte']);
                          /*array_push($data, [$p['id'] => array('quantite' =>  $p['RQtte'] ,'prix_unite' => $p['prix'])]);*/
              /*      }*/
                    
                /*    $commande->Produits()->attach($p['id'],['quantite' =>  $p['RQtte'] ,'prix_unite' => $p['prix']]);*/

          /*          $lignecommande = new Lignecommande;
                    $lignecommande->quantite = $p['RQtte'];
                    $lignecommande->prix_unite = $p['prix'];
                    $lignecommande->produit_id = $p['id'];
                    $lignecommande->commande_id =  $commande->id;
                    $lignecommande->save();*/
                }
               

                  $achat->Produits()->sync( $data);

     /*   dd($data );*/

 

        echo 'update avec Succes';
        
      /*  $requestData = $request->all();
        
        $achat = Achat::findOrFail($id);
        $achat->update($requestData);

        return redirect('admin/achats')->with('flash_message', 'Achat updated!');*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Achat::destroy($id);

        return redirect('admin/achats')->with('flash_message', 'Achat deleted!');
    }
}
