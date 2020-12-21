<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Role;
use App\Acce;
use App\Helpers\Checker;
use Illuminate\Http\Request;

class RolesController extends Controller
{
    protected $table = "roles";
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
                //if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        
        $roles = Role::all();
        

        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
                //if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        $acces = Acce::all();
        $accestable=Acce::groupBy('table')->get();
        return view('admin.roles.create',compact('acces','accestable'));
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
                //if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}
        
        /*$requestData = $request->all();
        
        Role::create($requestData);*/

        $role =new Role();

        $role->libelle = $request->input('libelle');

        $role->save();

        $acces = $request->input('acces');

        foreach ($acces as $acc) 
        {

            $role->acces()->attach($acc);
        }



        return redirect('admin/roles')->with('flash_message', 'role added!');
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
                //if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        $role = Role::findOrFail($id);

        return view('admin.roles.show', compact('role'));
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
            //if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        $role = Role::findOrFail($id);
        $accestable=Acce::groupBy('table')->get();
        $acces=Acce::all();
        $accesByRole =array();

        foreach ($role->acces as $val) 
        {
            array_push($accesByRole, $val->id);
        }

        return view('admin.roles.edit', compact('role','acces','accestable','accesByRole'));
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
                //if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        
        //$requestData = $request->all();
        
        $role = Role::findOrFail($id);
        $role->libelle = $request->input('libelle');
        $role->save();

        $acces = $request->input('acces');
        
        $role->acces()->sync($acces);
    
        return redirect('admin/roles')->with('flash_message', 'Role updated!');
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
                //if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        Role::destroy($id);

        return redirect('admin/roles')->with('flash_message', 'Role deleted!');
    }
}
