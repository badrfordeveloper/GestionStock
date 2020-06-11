<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Lignecommande;
use Illuminate\Http\Request;

class LignecommandesController extends Controller
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
            $lignecommandes = Lignecommande::where('produit_id', 'LIKE', "%$keyword%")
                ->orWhere('commande_id', 'LIKE', "%$keyword%")
                ->orWhere('quantite', 'LIKE', "%$keyword%")
                ->orWhere('prix_unite', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $lignecommandes = Lignecommande::latest()->paginate($perPage);
        }

        return view('admin.lignecommandes.index', compact('lignecommandes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.lignecommandes.create');
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
        
        Lignecommande::create($requestData);

        return redirect('admin/lignecommandes')->with('flash_message', 'Lignecommande added!');
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
        $lignecommande = Lignecommande::findOrFail($id);

        return view('admin.lignecommandes.show', compact('lignecommande'));
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
        $lignecommande = Lignecommande::findOrFail($id);

        return view('admin.lignecommandes.edit', compact('lignecommande'));
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
        
        $lignecommande = Lignecommande::findOrFail($id);
        $lignecommande->update($requestData);

        return redirect('admin/lignecommandes')->with('flash_message', 'Lignecommande updated!');
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
        Lignecommande::destroy($id);

        return redirect('admin/lignecommandes')->with('flash_message', 'Lignecommande deleted!');
    }
}
