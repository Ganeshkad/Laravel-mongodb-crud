<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UserStore;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::all();
        return view('users.index',compact('data')); //compact function  is used to  send data to the index page
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (UserStore $request)
    {
        $input = $request->validated();  //validated() for postgres
        $input['password'] = bcrypt($input['password']);
        User::create($input);
        return redirect()->back()->withSuccess('User Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            User::destroy($id);
            return redirect()->back()->withSuccess('User Deleted successfully.');
    }
            

    public function edit($id)
            {
                $data = User::find($id);
                return view('users.edit', compact('data'));
            }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update (UserStore $request, $id)
{
        $input = $request->validated();
        $input['password'] = bcrypt($input['password']);
        User::where('_id', $id)->update($input);
        return redirect()->back()->withSuccess('User Updated successfully.');
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function destroy($id)
    // {
    //     User::destroy($id);
    //     return redirect()->back()->withSuccess('User Deleted successfully.');
    // }
}
