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
        $data = Sewa::orderBy('tanggal_pesan', 'desc')->get()->where('diambil', '!=', '3');

        //  dd($user);
        return view('admin.sewa', ['sewa' => $data]);
    }

    public function test()
    {
        DB::enableQueryLog();
        $comm = DB::table("sewas")
        ->select('*', DB::raw('tanggal_sewa + INTERVAL durasi HOUR as deadline'))
        ->where(DB::raw('MONTH(now())'), DB::raw('MONTH(tanggal_sewa + INTERVAL durasi HOUR)')) // Getting the Authenticated user id
        ->where(DB::raw('DAYOFMONTH(now())'), DB::raw('DAYOFMONTH(tanggal_sewa + INTERVAL durasi HOUR)')) // Getting the Authenticated user id
        ->whereBetween(DB::raw('HOUR(NOW())'), [DB::raw('HOUR(tanggal_sewa + INTERVAL (durasi-2) HOUR)'), DB::raw('HOUR(tanggal_sewa + INTERVAL (durasi+1) MINUTE)')])
        ->get()->toarray();
        // 
        $quries = DB::getQueryLog();
        dd($quries);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function history()
    {
        
        $month =  $_GET['m'];
        //
        DB::enableQueryLog();

            $data = Sewa::join('pengembalians', 'sewas.id_sewa', 'pengembalians.sewa_id')->where('diambil', '3')->where(DB::raw('MONTH(tanggal_sewa)'), $month)->orderBy('tanggal_sewa', 'desc')->get();


        $quries = DB::getQueryLog();
        // dd($month);

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

        $comms = Kamera::find($postData['kamera_id'])->toArray();
        // cari id
        $stok = $comms["stok"];
        $postDatax['stok'] = intval($stok) - 1;
        
        Kamera::find($postData['kamera_id'])->update($postDatax);
        
        // dd($comms);
        // // 
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
        $comm = Sewa::find($id)->toArray();
        // cari id
        $idj = $comm["jaminan_id"];
        // dd($idj);
        Jaminan::find($idj)->delete();
        // hapus kamera
        Sewa::find($id)->delete();
        //store status message
        Session::flash('msg', 'Data deleted successfully!');

        return redirect()->route('sewa');
    }
}
