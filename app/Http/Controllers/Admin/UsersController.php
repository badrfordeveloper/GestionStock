<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\UplodedFile;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $users = User::All();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.users.create');
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

        $directoryPhoto = 'photos';
        $directoryCover = 'covers';
        Storage::makeDirectory($directoryPhoto);
        Storage::makeDirectory($directoryCover);

        $requestData = $request->all();

        if($request->hasFile('photo')) $requestData['photo']= $request->file('photo')->store($directoryPhoto);
        if($request->hasFile('cover')) $requestData['cover']= $request->file('cover')->store($directoryCover);
        
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
        $user = User::findOrFail($id);

        return view('admin.users.edit', compact('user'));
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
        $user = User::findOrFail($id);
        $oldPhoto =$user->photo;
        $oldCover = $user->cover;

        $directoryPhoto = 'photos';
        $directoryCover = 'covers';
        Storage::makeDirectory($directoryPhoto);
        Storage::makeDirectory($directoryCover);
        
        $requestData = $request->all();
        if($request->hasFile('photo')) $requestData['photo']= $request->file('photo')->store($directoryPhoto);
        if($request->hasFile('cover')) $requestData['cover']= $request->file('cover')->store($directoryCover);

        if( !empty($requestData['photo']) ) Storage::delete($oldPhoto);
        if( !empty($requestData['cover']) ) Storage::delete($oldCover);
        
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
        User::destroy($id);

        return redirect('admin/users')->with('flash_message', 'User deleted!');
    }
}
