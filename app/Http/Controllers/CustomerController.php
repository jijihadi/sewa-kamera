<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\Models\Customer;
use App\Models\User;
use Session;
use DB;
class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Customer::all();

        //  dd($user);
        return view('admin.customer', ['customer' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.customer_form');
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
            'nama_cust' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'hp_cust' => ['required', 'numeric', 'digits_between:11,13' ],
            'alamat_cust' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
            'status_cust' => ['required'],
        ]);

        //get post data untuk user
        $postDatau = $request->all();

        $postDatau['is_admin'] = "0";
        $postDatau['created_at'] = date('Y-m-d H:i:s');
        $postDatau['name'] = $postDatau['nama_cust'];
        $postDatau['email'] = $postDatau['email'];
        $postDatau['password'] = Hash::make($postDatau['password']);
        //insert post data
        User::create($postDatau);

        // post data untuk customer
        $postData['created_at'] = date('Y-m-d H:i:s');
        $postData['email_cust'] = $postDatau['email'];
        $postData['nama_cust'] = $postDatau['nama_cust'];
        $postData['hp_cust'] = $postDatau['hp_cust'];
        $postData['status_cust'] = 1;
        $postData['alamat_cust'] = $postDatau['alamat_cust'];

        Customer::create($postData);

        //store status message
        Session::flash('msg', 'Data added successfully!');

        return redirect()->route('customer');
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
        $post = Customer::find($id);

        //load form view
        return view('admin.customer_form', ['post' => $post]);
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
            'nama_cust' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'hp_cust' => ['required', 'numeric', 'digits_between:11,13' ],
            'alamat_cust' => ['required', 'string'],
        ]);

        //get post data untuk user
        $postDatau = $request->all();

        // post data untuk customer
        $postData['created_at'] = date('Y-m-d H:i:s');
        $postData['email_cust'] = $postDatau['email'];
        $postData['nama_cust'] = $postDatau['nama_cust'];
        $postData['hp_cust'] = $postDatau['hp_cust'];
        $postData['alamat_cust'] = $postDatau['alamat_cust'];
        $postData['status_cust'] = $postDatau['status_cust'];

        Customer::find($id)->update($postData);
        //store status message
        Session::flash('msg', 'Data '. $postData["nama_cust"].' changed successfully!');

        return redirect()->route('customer');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dapetin id jaminan
        $comm = Customer::find($id)->toArray();
        // cari id
        $idj = $comm[0]["email_cust"];
        // dd($idj);
        User::where('email',$idj)->delete();
        // hapus kamera
        Customer::find($id)->delete();
        //store status message
        Session::flash('msg', 'Data deleted successfully!');

        return redirect()->route('customer');
    }
}
