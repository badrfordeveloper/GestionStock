<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Produit;
use App\Photo;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProduitsController extends Controller
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
            $produits = Produit::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('description', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->orWhere('prix', 'LIKE', "%$keyword%")
                ->orWhere('qunatite', 'LIKE', "%$keyword%")
                ->orWhere('categorie_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $produits = Produit::latest()->paginate($perPage);
        }

        return view('admin.produits.index', compact('produits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $categories=Category::All();
        return view('admin.produits.create',compact('categories'));
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

        $directoryPhoto = 'produits';
        Storage::makeDirectory($directoryPhoto);
        
        $requestData = $request->all();

        //if($request->hasFile('image')) $requestData['image']= $request->file('image')->store($directoryPhoto);
        
        $produit = Produit::create($requestData);

        for ($i = 0 ; $i < 6 ; $i++) 
        {
            if ($request->hasFile('image_'.($i+1))) 
            {
                $photo =new Photo();

                $directory = 'images/pr'.$produit->id;

                Storage::makeDirectory($directory);

                $photo->image = $request->file('image_'.($i+1))->store($directory);
                $photo->produit_id = $produit->id;
                $photo->save();
                
            }
        }

        return redirect('admin/produits')->with('flash_message', 'Produit added!');
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
        $produit = Produit::findOrFail($id);

        return view('admin.produits.show', compact('produit'));
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
        $categories=Category::All();
        $produit = Produit::findOrFail($id);

        return view('admin.produits.edit', compact('produit','categories'));
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
        
        $produit = Produit::findOrFail($id);

        /*$oldPhoto =$produit->image;
        $directoryPhoto = 'produits';
        Storage::makeDirectory($directoryPhoto);

        if($request->hasFile('image')) $requestData['image']= $request->file('image')->store($directoryPhoto);
        if( !empty($requestData['image']) ) Storage::delete($oldPhoto);*/

        $produit->update($requestData);

        for ($i = 0 ; $i < 6 ; $i++) 
        {
            if ($request->hasFile('image_'.($i+1))) 
            {
                $photo =new Photo();

                $directory = 'images/pr'.$produit->id;

                Storage::makeDirectory($directory);

                $photo->image = $request->file('image_'.($i+1))->store($directory);
                $photo->produit_id = $produit->id;
                $photo->save();
                
            }
        }

        return redirect('admin/produits')->with('flash_message', 'Produit updated!');
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
         $produit=Produit::find($id);
        Storage::delete($produit->image);
        Produit::destroy($id);

        return redirect('admin/produits')->with('flash_message', 'Produit deleted!');
    }

    public function getProducts(Request $request)
    {
         

         $produits=Produit::where('nom', 'LIKE', $request->input('term').'%')
         ->select('produits.*','produits.quantite as StockQuantite','produits.prix as Currentprix')
         ->get();

        return $produits;
    }

     public function delete_image($id)
    {
       /* $image = Image::where('produit_id',$produit_id)->get();*/
        $photo = Photo::find($id);

        Storage::delete($photo->image);

        $photo->delete();

        return 1;

    }


    
}
