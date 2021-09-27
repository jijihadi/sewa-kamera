<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use Session;

use App\Models\Sewa;
use App\Models\Kamera;
use App\Models\Jaminan;
use App\Models\User;
use App\Models\Customer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user/home');
    }
    // 
    public function kamera()
    {
        $data = Kamera::all();
        return view('user/kamera', ['kamera'=> $data]);
    }
    // 
    public function show_kamera($id)
    {
        $data = Kamera::find($id);
        $random = Kamera::inRandomOrder()->limit(4)->get();;
        return view('user/kamera_show', ['kamera'=> $data, 'random'=>$random]);
    }
    // 
    public function rent()
    {
        //dapetin id cust
        $comm = Customer::where(['email_cust'=>Auth::user()->email])->get()->toArray();
        // get id
        $idc = $comm[0]["id_cust"];
        
        $data = Sewa::where(['cust_id'=>$idc])->where('diambil', '!=', '3')->get();

        return view('user/sewa', ['sewa'=> $data]);
    }
    // 
    public function rent_new($id)
    {
        $data = Kamera::all()->whereNotIn('stok', '0');

        return view('user/sewa_new', ['kamera' => $data]);
    }
    // 
    public function rent_store(Request $request)
    {
        //
        $this->validate($request, [
            'tanggal_sewa' => ['required', 'string', 'max:255'],
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
        $postData = request()->except(['_token','jenis_jaminan', 'no_jaminan']);
        // 
        //dapetin id cust
        $comm = Customer::where(['email_cust'=>Auth::user()->email])->get()->toArray();
        // get id
        $idc = $comm[0]["id_cust"];

        $postData['jaminan_id'] = $id;
        $postData['cust_id'] = $idc;
        $postData['admin_id'] = "0";
        $postData['tanggal_sewa'] = $postData['tanggal_sewa'];
        $postData['tanggal_pesan'] = date('Y-m-d H:i:s');
        $postData['harga'] = bilanganbulat($postData['harga']);
        $postData['created_at'] = date('Y-m-d H:i:s');
        
        // dd($postData);
        //insert post data
        Sewa::insert($postData);

        //store status message
        Session::flash('msg', 'Data '. tglindo($postData["tanggal_sewa"]). " ". namakamera($postData["kamera_id"]).' made successfully!');
        
        return redirect()->route('rent');
    }
    // 
    public function history()
    {
        //dapetin id cust
        $comm = Customer::where(['email_cust'=>Auth::user()->email])->get()->toArray();
        // get id
        $idc = $comm[0]["id_cust"];
        
        $data = Sewa::where(['cust_id'=>$idc])->where('diambil', '3')->get();

        return view('user/history', ['sewa'=> $data]);
    }
}
