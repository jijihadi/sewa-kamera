<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use App\Models\Sewa;
use App\Models\Kamera;
use App\Models\Jaminan;
use App\Models\User;
use App\Models\Customer;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $last10 = Sewa::orderBy('tanggal_sewa', 'desc')->limit('10')->get();
        //
        $trent = Sewa::all()->where(['diambil'=>'2'])->count();
        $tall = Sewa::all()->count();
        $tcust = Customer::all()->count();
        // 
        $mostrent = Sewa::select(DB::raw('MAX(kamera_id) AS most_kamera'))->groupby('kamera_id')->pluck('most_kamera');
        $mostrent = namakamera($mostrent[0]);
        
        $newrent = Sewa::orderBy('tanggal_sewa', 'desc')->get();
        $newrent = namakamera($newrent[0]['kamera_id']). ' oleh '. namacust($newrent[0]['cust_id']);

        $mostloyal = Sewa::select(DB::raw('MAX(cust_id) AS most_loyal'))->groupby('cust_id')->pluck('most_loyal');
        $mostloyal = namacust($mostloyal[0]);
        // dd($mostloyal);
        $data =  ['tall'=> $tall, 'trent'=>$trent, 'tcust'=>$tcust, 'mostrent'=>$mostrent, 'newrent'=>$newrent, 'mostloyal'=>$mostloyal, 'last10'=>$last10];
        return view('admin/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
