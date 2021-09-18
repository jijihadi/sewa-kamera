<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Merk;
use Session;

class MerkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $merk = Merk::all();

        //  dd($user);
        return view('admin.merk', ['merk' => $merk]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.merk_form');
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
            'nama_merk' => ['required', 'string', 'max:255']
        ]);

        //get post data
        $postData = $request->all();
        $postData['created_at'] = date('Y-m-d H:i:s');
        //insert post data
        Merk::create($postData);

        //store status message
        Session::flash('msg', 'Data added successfully!');

        return redirect()->route('merk');
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
        
        //get post data by id
        $post = Merk::find($id);

        //load form view
        return view('admin.merk_form', ['post' => $post]);
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
        //
        $this->validate($request, [
            'nama_merk' => ['required', 'string', 'max:255']
        ]);

        //get post data
        $postData = $request->all();
        $postData['created_at'] = date('Y-m-d H:i:s');
        //insert post data
        Merk::find($id)->update($postData);

        //store status message
        Session::flash('msg', 'Data '. $postData["nama_merk"].' changed successfully!');

        return redirect()->route('merk');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        //update post data
        Merk::find($id)->delete();

        //store status message
        Session::flash('msg', 'Data deleted successfully!');

        return redirect()->route('merk');
    }
}
