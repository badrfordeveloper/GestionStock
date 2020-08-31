<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Ligneachat;
use App\Helpers\Checker;
use Illuminate\Http\Request;

class LigneachatsController extends Controller
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
            $ligneachats = Ligneachat::where('produit_id', 'LIKE', "%$keyword%")
                ->orWhere('achat_id', 'LIKE', "%$keyword%")
                ->orWhere('quantite', 'LIKE', "%$keyword%")
                ->orWhere('prix_unite', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $ligneachats = Ligneachat::latest()->paginate($perPage);
        }

        return view('admin.ligneachats.index', compact('ligneachats'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.ligneachats.create');
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
        
        Ligneachat::create($requestData);

        return redirect('admin/ligneachats')->with('flash_message', 'Ligneachat added!');
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
        $ligneachat = Ligneachat::findOrFail($id);

        return view('admin.ligneachats.show', compact('ligneachat'));
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
        $ligneachat = Ligneachat::findOrFail($id);

        return view('admin.ligneachats.edit', compact('ligneachat'));
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
        
        $ligneachat = Ligneachat::findOrFail($id);
        $ligneachat->update($requestData);

        return redirect('admin/ligneachats')->with('flash_message', 'Ligneachat updated!');
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
        Ligneachat::destroy($id);

        return redirect('admin/ligneachats')->with('flash_message', 'Ligneachat deleted!');
    }
}
