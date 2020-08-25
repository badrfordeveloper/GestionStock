<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Vente;
use App\Commande;
use App\User;
use App\Commande_produit; 
use App\Produit;
use Illuminate\Http\Request;
use Carbon\Carbon;


class VentesController extends Controller
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

    public function addVenteFromCommande(Commande $commande){

        if($commande->status = "en vente"){

            // get commande produit
             $commande_produit = Commande_produit::where('commande_id','=',$commande->id)
                        ->join('produits', 'produits.id', '=', 'commande_produit.produit_id')
                        ->select('commande_produit.*')
                        ->get();
  
            // check if stock still exist
             $flag=false;
            foreach ($commande_produit as $p) {
                    $produit = Produit::find($p->produit_id);
                     if( $produit->quantite<$p->quantite){
                        $flag=true;
                     }
            }
            // update quantity of products in stock if still available
            if(!$flag){
                foreach ($commande_produit as $p) {
                    $produit = Produit::find($p->produit_id);
                    $produit->quantite -= $p->quantite;
                    $produit->save();
                }
            }
            else{
                return redirect('admin/commandes')->with('error', 'cant effect vente cause of quantité');
            }

            //update status of commande
            $commande->status = "en vente" ;
            $commande->save();


                       
            // add vente
            $vente = new Vente;
            $vente->date = Carbon::now();
            $vente->etat = "en vente" ;
            $vente->commande_id =  $commande->id ;
            $vente->save();
        }

            return redirect('admin/ventes')->with('flash_message', 'Vente added!');



    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $ventes = Vente::where('date', 'LIKE', "%$keyword%")
                ->orWhere('etat', 'LIKE', "%$keyword%")
                ->orWhere('commande_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ventes = Vente::latest()->paginate($perPage);
        }

        return view('admin.ventes.index', compact('ventes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.ventes.create');
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
        
        $requestData = $request->all();
        
        Vente::create($requestData);

        return redirect('admin/ventes')->with('flash_message', 'Vente added!');
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
        

            $vente = Vente::findOrFail($id);


                 $commande_produit = Commande_produit::where('commande_id','=',$vente->commande_id)
                            ->join('produits', 'produits.id', '=', 'commande_produit.produit_id')
                            ->select('produits.id', 'produits.created_at', 'produits.updated_at', 'produits.nom', 'produits.image','produits.description', 'produits.image', 'commande_produit.prix_unite as prix', 'commande_produit.quantite', 'produits.categorie_id','produits.quantite as StockQuantite','produits.prix as Currentprix')
                            ->get();
               
        

  /*      dd($commande_produit) ;*/
   
        $clients = User::where('type_id',3)->get();

        return view('admin.ventes.show', compact('vente','clients','commande_produit'));
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
        $vente = Vente::findOrFail($id);

        return view('admin.ventes.edit', compact('vente'));
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
        
        $requestData = $request->all();
        
        $vente = Vente::findOrFail($id);
        $vente->update($requestData);

        return redirect('admin/ventes')->with('flash_message', 'Vente updated!');
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
        Vente::destroy($id);

        return redirect('admin/ventes')->with('flash_message', 'Vente deleted!');
    }
}
