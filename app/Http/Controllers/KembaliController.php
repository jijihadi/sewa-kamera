<?php

namespace App\Http\Controllers;
use DB;

use App\Models\Sewa;
use App\Models\Kamera;
use App\Models\Jaminan;
use App\Models\User;
use App\Models\Customer;
use App\Models\Kembali;

use Session;
use Illuminate\Http\Request;

class KembaliController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
         //
         $data = Sewa::find($id)->toarray();
        //  $data2 = Customer::all();
        // echo "<pre>";
        // print_r($data);
         return view('admin.kembali_form', ['sewa' => $data]);
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
            // 'catatan' => ['required', 'string'],
            'denda' => ['required'],
        ]);

        //get post data
        $postData = $request->all();
        $postData = request()->except(['_token']);

        //insert post data
        
        // cari id kamera
        $idk = $postData['kamera_id'];
        $comms = Kamera::find($idk)->toArray();
        // dapetin data stok
        $stok = $comms["stok"];
        $postDatax['stok'] = intval($stok) + 1;
        // tambah stok kamera
        Kamera::find($idk)->update($postDatax);
        // data untuk ganti sewa ke 3
        $postDatay['diambil'] = '3';
        // ubah status sewa
        Sewa::find($postData['sewa_id'])->update($postDatay);

        
        $postData = request()->except(['_token','kamera_id']);
        
        if ( array_key_exists('catatan', $postData)) {  
            $postData['catatan'] = implode(", ",$postData['catatan']);
        }else{
            $postData['catatan'] = "Lengkap";
        }
        $postData['denda'] = bilanganbulat($postData['denda']);
        $postData['waktu_kembali'] = date('Y-m-d H:i:s');
        $postData['created_at'] = date('Y-m-d H:i:s');
        
        // dd($postData);    
        Kembali::insert($postData);
        //store status message
        Session::flash('msg', 'Data '. $comms["nama_kamera"].'/'.$comms["tipe_kamera"].' returned successfully!');

        return redirect()->route('sewa');
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
    }
}
