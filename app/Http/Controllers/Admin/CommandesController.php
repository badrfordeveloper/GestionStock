<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Commande;
use App\User;
use App\Produit;
use App\Lignecommande; 
use App\Commande_produit; 
use Illuminate\Http\Request;

class CommandesController extends Controller
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
            $commandes = Commande::where('date', 'LIKE', "%$keyword%")
                ->orWhere('total', 'LIKE', "%$keyword%")
                ->orWhere('status', 'LIKE', "%$keyword%")
                ->orWhere('user_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $commandes = Commande::latest()->paginate($perPage);
        }

        return view('admin.commandes.index', compact('commandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $clients = User::all();
        return view('admin.commandes.create',compact('clients'));
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
        dd($request->post() );
        // retrieve data from serialize array becarful with order of input
        $Date=$request->mydata[1]['value'];
        $Status=$request->mydata[2]['value'];
        $Client_id=$request->mydata[3]['value'];

        $total=0;

        // calculer total et reduce qtte from stock
        foreach ($request->myproduct as $p) {

            $total+=$p['prix']*$p['RQtte'];
  /*          $produit = Produit::find($p['id']);
            $produit->quantite -= $p['RQtte'];
            $produit->save();*/
        }


        //add Commande
        $commande = new Commande;
        $commande->date = $Date ;
        $commande->status = $Status ;
        $commande->total = $total ;
        $commande->user_id = $Client_id ;
        $commande->save();


        //add the product in ligneCommande
        foreach ($request->myproduct as $p) {


            $commande->Produits()->attach($p['id'],['quantite' =>  $p['RQtte'] ,'prix_unite' => $p['prix']]);

  /*          $lignecommande = new Lignecommande;
            $lignecommande->quantite = $p['RQtte'];
            $lignecommande->prix_unite = $p['prix'];
            $lignecommande->produit_id = $p['id'];
            $lignecommande->commande_id =  $commande->id;
            $lignecommande->save();*/
        }

        echo 'ajouter avec Succes';
    /*    $requestData = $request->all();
        
        Commande::create($requestData);*/

      /*  return redirect('admin/commandes')->with('flash_message', 'Commande added!');*/
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
        $commande = Commande::findOrFail($id);

        return view('admin.commandes.show', compact('commande'));
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
/*
            Currentprix: 200
            StockQuantite: 10
            categorie_id: 2
            created_at: "2020-06-29T10:17:25.000000Z"
            description: "description products"
            id: 1
            image: "produits/y1MnjR4g6YZajhtqpmE4mMoFQ5QwpwxfCbeRFWyE.png"
            nom: "produits1"
            prix: 200
            quantite: 10
            updated_at: "2020-07-14T09:52:48.000000Z"

            $*/

        $commande_produit = Commande_produit::where('commande_id','=',$id)
                            ->join('produits', 'produits.id', '=', 'commande_produit.produit_id')
                            ->select('produits.id', 'produits.created_at', 'produits.updated_at', 'produits.nom', 'produits.description', 'produits.image', 'commande_produit.prix_unite as prix', 'commande_produit.quantite', 'produits.categorie_id','produits.quantite as StockQuantite','produits.prix as Currentprix')
                            ->get();
               
        $commande = Commande::findOrFail($id);

  /*      dd($commande_produit) ;*/
   
        $clients = User::all();

        return view('admin.commandes.edit', compact('commande','clients','commande_produit'));
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
        $Status=$request->mydata[3]['value'];
        $Client_id=$request->mydata[4]['value'];

        $total=0;

        

        // calculer total et reduce qtte from stock
        foreach ($request->myproduct as $p) {

            $total+=$p['prix']*$p['RQtte'];
  /*          $produit = Produit::find($p['id']);
            $produit->quantite -= $p['RQtte'];
            $produit->save();*/
        }


        //add Commande

            $commande = Commande::findOrFail($id);
            $commande->date = $Date ;
            $commande->status = $Status ;
            $commande->total = $total ;
            $commande->user_id = $Client_id ;
            $commande->save();

                $data = array();

                //add the product in ligneCommande
                foreach ($request->myproduct as $p) {
          /*          if(count($data)>=1){
                        array_push($data[0], $p['id'] => array('quantite' =>  $p['RQtte'] ,'prix_unite' => $p['prix']));
                    }
                    else{*/
                        $data[$p['id'] ]=array('quantite' =>  $p['RQtte'] ,'prix_unite' => $p['prix']);
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
               

                 $commande->Produits()->sync( $data);

     /*   dd($data );*/

 

        echo 'update avec Succes';


        
      /*  $requestData = $request->all();
        
      

        return redirect('admin/commandes')->with('flash_message', 'Commande updated!');*/
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
        $commande=Commande::find($id);
        $commande->Produits()->detach();

        Commande::destroy($id);

        return redirect('admin/commandes')->with('flash_message', 'Commande deleted!');
    }
}
