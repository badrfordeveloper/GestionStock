<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Retour;
use App\Vente;
use App\User;
use App\Commande_produit; 
use App\Produit;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RetoursController extends Controller
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

     public function addRetourFromVente(Vente $vente){

            if($vente->etat != "en retour"){

            // get commande produit

             $commande_produit = Commande_produit::where('commande_id','=',$vente->commande->id)
                        ->join('produits', 'produits.id', '=', 'commande_produit.produit_id')
                        ->select('commande_produit.*')
                        ->get();
  
  
                foreach ($commande_produit as $p) {
                    $produit = Produit::find($p->produit_id);
                    $produit->quantite += $p->quantite;
                    $produit->save();
                }


            //update status of commande
            $vente->etat = "en retour" ;
            $vente->save();


                       
            // add vente
            $retour = new Retour;
            $retour->date = Carbon::now();
            $retour->vente_id =  $vente->id ;
            $retour->save();

            }

            return redirect('admin/retours')->with('flash_message', 'Retour added!');



    }

    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $retours = Retour::where('date', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $retours = Retour::latest()->paginate($perPage);
        }

        return view('admin.retours.index', compact('retours'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.retours.create');
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
        
        Retour::create($requestData);

        return redirect('admin/retours')->with('flash_message', 'Retour added!');
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
        $retour = Retour::findOrFail($id);
                 $commande_produit = Commande_produit::where('commande_id','=',$retour->vente->commande_id)
                            ->join('produits', 'produits.id', '=', 'commande_produit.produit_id')
                            ->select('produits.id', 'produits.created_at', 'produits.updated_at', 'produits.nom', 'produits.description', 'produits.image', 'commande_produit.prix_unite as prix', 'commande_produit.quantite', 'produits.categorie_id','produits.quantite as StockQuantite','produits.prix as Currentprix')
                            ->get();
               

  /*      dd($commande_produit) ;*/
   
        $clients = User::where('type_id',3)->get();

        return view('admin.retours.show', compact('retour','clients','commande_produit'));
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
        $retour = Retour::findOrFail($id);

        return view('admin.retours.edit', compact('retour'));
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
        
        $retour = Retour::findOrFail($id);
        $retour->update($requestData);

        return redirect('admin/retours')->with('flash_message', 'Retour updated!');
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
        Retour::destroy($id);

        return redirect('admin/retours')->with('flash_message', 'Retour deleted!');
    }
}
