<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\User;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = User::all();

        //  dd($user);
        return view('admin.user', ['user' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.user_form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            'is_admin' => 'required',
        ]);

        //get post data
        $postData = $request->all();
        $postData['password'] = Hash::make($postData['password']);
        $postData['created_at'] = date('Y-m-d H:i:s');
        //insert post data
        User::create($postData);

        //store status message
        Session::flash('msg', 'Data added successfully!');

        return redirect()->route('user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $post = User::find($id);

        //load form view
        return view('admin.user_form', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'is_admin' => 'required',
        ]);

        //get post data
        $postData = $request->all();
        
        if($postData['password']!=null):
            $postData['password'] = Hash::make($postData['password']);
        elseif($postData['password'] == null):
            $postData['password']  = $postData['oldpassword'];
        endif;

        $postData['created_at'] = date('Y-m-d H:i:s');
        //insert post data
        User::find($id)->update($postData);

        //store status message
        Session::flash('msg', 'Data '. $postData["name"].' changed successfully!');
        
        return redirect()->route('user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //update post data
        User::find($id)->delete();

        //store status message
        Session::flash('msg', 'Data deleted successfully!');

        return redirect()->route('user');
    }
}
