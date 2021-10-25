<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use PDF;

use App\Models\Sewa;
use App\Models\Kamera;
use App\Models\Jaminan;
use App\Models\User;
use App\Models\Customer;
use Session;

class SewaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Sewa::orderBy('tanggal_pesan', 'desc')->get();

        //  dd($user);
        return view('admin.sewa', ['sewa' => $data]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        //
        $data = Sewa::join('pengembalians', 'sewas.id_sewa', 'pengembalians.sewa_id')->where('diambil', '3')->get();

        //  dd($data->toarray());
        return view('admin.history_sewa', ['sewa' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Kamera::all()->whereNotIn('stok', '0');
        $data2 = Customer::all();

        //  print_r($data);
        return view('admin.sewa_form', ['kamera' => $data, 'customer' => $data2, ]);
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
            'tanggal_sewa' => ['required', 'string', 'max:255'],
            'waktu_sewa' => ['required', 'string', 'max:255'],
            'cust_id' => ['required', 'integer'],
            'kamera_id' => ['required', 'integer'],
            'harga' => ['required'],
            'durasi' => ['required'],
            'jenis_jaminan' => ['required', 'string'],
            'no_jaminan' => ['required', 'string'],
        ]);

        //get post data
        $postData = $request->all();

        $comms = Kamera::find($postData['kamera_id'])->get()->toArray();
        // cari id
        $stok = $comms[0]["stok"];
        $postDatax['stok'] = intval($stok) - 1;
        
        Kamera::find($postData['kamera_id'])->update($postDatax);
        
        // 
        $postData2['jenis_jaminan'] = $postData['jenis_jaminan'];
        $postData2['no_jaminan'] = $postData['no_jaminan'];
        $postData2['created_at'] = date('Y-m-d H:i:s');

        Jaminan::insert($postData2);
        $id = DB::getPdo()->lastInsertId();
        // dd($id);
        // 
        $jam = date("H:i:s", strtotime($postData['waktu_sewa'].":00"));
        $postData = request()->except(['_token','jenis_jaminan', 'no_jaminan', 'waktu_sewa']);
        // 
        $postData['jaminan_id'] = $id;
        $postData['tanggal_sewa'] = date("Y-m-d H:i:s", strtotime($postData['tanggal_sewa']." ".$jam));;
        $postData['tanggal_pesan'] = date('Y-m-d H:i:s');
        $postData['harga'] = bilanganbulat($postData['harga']);
        $postData['created_at'] = date('Y-m-d H:i:s');
        
        //insert post data
        Sewa::insert($postData);

        //store status message
        Session::flash('msg', 'Data '. tglindo($postData["tanggal_sewa"]). " ". namakamera($postData["kamera_id"]).' made successfully!');
        
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
    public function pick($id)
    {   
        
        $now = date('Y-m-d H:i:s');
        $postData = array();
        $postData['diambil'] = "1";
        $postData['admin_id'] = Auth::user()->id ;
        $postData['updated_at'] = $now;
        
        Sewa::find($id)->update($postData);
        //store status message
        Session::flash('msg', 'Kamera Telah diambil pada '.tglindo($now).'!');
        
        return redirect()->route('sewa');
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
    
    public function print()
    {
        $data = Sewa::join('pengembalians', 'sewas.id_sewa', 'pengembalians.sewa_id')->where('diambil', '3')->get();

        $pdf = PDF::loadView('admin.sewa_print',['sewa' => $data]);
        return $pdf->stream('Data Penyewaan per-'.date('Y/m/d').'.pdf', array('Attachment'=>0));
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
        $comm = Sewa::find($id)->get()->toArray();
        // cari id
        $idj = $comm[0]["jaminan_id"];
        // dd($idj);
        Jaminan::find($idj)->delete();
        // hapus kamera
        Sewa::find($id)->delete();
        //store status message
        Session::flash('msg', 'Data deleted successfully!');

        return redirect()->route('kamera');
    }
}
