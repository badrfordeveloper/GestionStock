<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\User;
use App\Type;
use App\Helpers\Checker;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    protected $table = "users";
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
            $users = User::where('nom', 'LIKE', "%$keyword%")
                ->orWhere('prenom', 'LIKE', "%$keyword%")
                ->orWhere('email', 'LIKE', "%$keyword%")
                ->orWhere('password', 'LIKE', "%$keyword%")
                ->orWhere('tel', 'LIKE', "%$keyword%")
                ->orWhere('adresse', 'LIKE', "%$keyword%")
                ->orWhere('societe', 'LIKE', "%$keyword%")
                ->orWhere('role_id', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $users = User::latest()->paginate($perPage);
        }

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
                if(!Checker::checkAcces($this->table,debug_backtrace()[0]["function"])) {return redirect()->back();}

        $types=Type::All();
        return view('admin.users.create',compact('types'));
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
        
        User::create($requestData);

        return redirect('admin/users')->with('flash_message', 'User added!');
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

        $user = User::findOrFail($id);

        return view('admin.users.show', compact('user'));
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

        $types=Type::All();
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user','types'));
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
        
        $user = User::findOrFail($id);
        $user->update($requestData);

        return redirect('admin/users')->with('flash_message', 'User updated!');
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

        User::destroy($id);

        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }
}
