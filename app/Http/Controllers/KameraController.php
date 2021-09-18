<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Kamera;
use App\Models\Merk;
use Session;

class KameraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Kamera::all();

        //  dd($user);
        return view('admin.kamera', ['kamera' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $data = Merk::all();

        //  print_r($data);
        return view('admin.kamera_form', ['merk' => $data, ]);

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
            'nama_kamera' => ['required', 'string', 'max:255'],
            'tipe_kamera' => ['required', 'string', 'max:20'],
            'merk_kamera' => ['required', 'integer'],
            'harga_kamera' => ['required'],
            'stok' => ['required', 'integer'],
        ]);

        //get post data
        $postData = $request->all();
        $postData = request()->except(['_token']);

        $postData['gambar'] = null;

        if ($request->gambar != null) {
            $this->validate($request, [
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:4048'
            ]);
            $image = $request->file('gambar');
            $imageName=str_replace("_", " ",$request->input('nama')).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/file_upload/img/');
            $image->move($destinationPath, $imageName);

            $postData['gambar'] = $imageName;
        }

        $postData['harga_kamera'] = bilanganbulat($postData['harga_kamera']);
        $postData['created_at'] = date('Y-m-d H:i:s');
        //insert post data
        Kamera::insert($postData);

        //store status message
        Session::flash('msg', 'Data '. $postData["nama_kamera"]. " ". $postData["tipe_kamera"].' made successfully!');
        
        return redirect()->route('kamera');
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
        $data = Merk::all();
        $post = Kamera::all();

        //  print_r($data);
        return view('admin.kamera_form', ['merk' => $data, 'post' => $post]);
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
            'nama_kamera' => ['required', 'string', 'max:255'],
            'tipe_kamera' => ['required', 'string', 'max:20'],
            'merk_kamera' => ['required', 'integer'],
            'harga_kamera' => ['required'],
            'stok' => ['required', 'integer'],
        ]);

        //get post data
        $postData = $request->all();
        $postData = request()->except(['_token']);

        if ($request->gambar != null) {
            $this->validate($request, [
                'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:40048'
            ]);
            $image = $request->file('gambar');
            $imageName=str_replace("_", " ",$request->input('tipe_kamera')).'_'.time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/file_upload/img/');
            $image->move($destinationPath, $imageName);

            $postData['gambar'] = $imageName;
        }

        $postData['harga_kamera'] = bilanganbulat($postData['harga_kamera']);
        $postData['created_at'] = date('Y-m-d H:i:s');

        //insert post data
        Kamera::find($id)->update($postData);

        //store status message
        Session::flash('msg', 'Data '. $postData["nama_kamera"]. " ". $postData["tipe_kamera"].' changed successfully!');

        return redirect()->route('kamera');
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
        Kamera::find($id)->delete();

        //store status message
        Session::flash('msg', 'Data deleted successfully!');

        return redirect()->route('kamera');
    }
}
