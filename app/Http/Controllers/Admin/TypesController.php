<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Type;
use App\Acce;
use App\Helpers\Checker;
use Illuminate\Http\Request;

class TypesController extends Controller
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
                if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $types = Type::where('libelle', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $types = Type::latest()->paginate($perPage);
        }

        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
                if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        $acces = Acce::all();
        $accestable=Acce::groupBy('table')->get();
        return view('admin.types.create',compact('acces','accestable'));
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
                if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}
        
        $requestData = $request->all();
        
        Type::create($requestData);

        $type =new Type();

        $type->libelle = $request->input('libelle');

        $type->save();

        $acces = $request->input('acces');

        foreach ($acces as $acc) 
        {

            $type->acces()->attach($acc);
        }



        return redirect('admin/types')->with('flash_message', 'Type added!');
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
                if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        $type = Type::findOrFail($id);

        return view('admin.types.show', compact('type'));
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
            if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        $type = Type::findOrFail($id);
        $accestable=Acce::groupBy('table')->get();
        $acces=Acce::all();
        $accesByRole =array();

        foreach ($type->acces as $val) 
        {
            array_push($accesByRole, $val->id);
        }

        return view('admin.types.edit', compact('type','acces','accestable','accesByRole'));
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
                if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        
        $requestData = $request->all();
        
        $type = Type::findOrFail($id);
        $type->libelle = $request->input('libelle');
        $type->save();

        $acces = $request->input('acces');
        
        $type->acces()->sync($acces);
    
        return redirect('admin/types')->with('flash_message', 'Type updated!');
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
                if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        Type::destroy($id);

        return redirect('admin/types')->with('flash_message', 'Type deleted!');
    }
}
