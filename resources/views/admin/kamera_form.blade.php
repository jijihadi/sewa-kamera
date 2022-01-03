@extends('./layouts.admin')

@section('content')
{{-- {{dd($merk) }} --}}
@php
    $id = "";
    $nama = "";
    $tipe = "";
    $merks = "";
    $harga = "";
    $stok = "";
    $gambar = "";
@endphp
@if(!empty($post))
    @foreach($post as $p )
        @php
            $id = $post->id_kamera;
            $nama = $post->nama_kamera;
            $tipe = $post->tipe_kamera;
            $merks = $post->merk_kamera;
            $harga = $post->harga_kamera;
            $stokall = stokrent($post->id_kamera) + $post->stok;
            $stok = $post->stok;
            $gambar = $post->gambar;
        @endphp
    @endforeach
@endif

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="tag"></i> Form Kamera</h6>

            </div>
            <div class="card-body">
                @if($errors->any())
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                        </button>
                    </div>
                @endif

                @if(session('msg')!='')
                    <div class="col-12 mt-2">
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('msg') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                            </button>
                        </div>
                    </div>
                @endif

                @if(Route::current()->getName()=='kamera.add')
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('kamera.insert') }}" novalidate="novalidate"
                        enctype="multipart/form-data">
                @endif
                @if(Route::current()->getName()=='kamera.edit')
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('kamera.update', $id) }}" novalidate="novalidate"
                        enctype="multipart/form-data">
                @endif
                {{ csrf_field() }}

                <fieldset>
                    <div class="form-group">
                        <img src="{{ url('file_upload/img')."/".$gambar }}"
                            alt="" style="max-height:200px; max-width:100%">
                        {{-- {{$gambar }} --}}
                    </div>
                    <div class="form-group">
                        <label for="name">Nama Kamera</label>
                        <input id="name" class="form-control" name="nama_kamera" type="text" value="{{ $nama }}" {!!
                            (Route::current()->getName()=='kamera.edit')? "readonly":"" !!}>
                    </div>
                    <div class="form-group">
                        <label for="name">Merk Kamera</label>
                        <select class="select2 form-control" name="merk_kamera" {!!
                            (Route::current()->getName()=='kamera.edit')? "style='pointer-events:none' readonly ":"" !!}
                            >
                            <option value="-">Pilih Merk Kamera
                            </option>
                            @foreach($merk as $m)
                                <option value="{{ $m->id_merk }}" {{ selectsama($m->id_merk, $merks) }}>
                                    {{ $m->nama_merk }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name">Tipe Kamera</label>
                        <input id="name" class="form-control" name="tipe_kamera" type="text" value="{{ $tipe }}"
                            placeholder="ex: 200D, XT-1, a7 Mark III">
                    </div>
                    <div class="form-group">
                        <label for="name">Harga Kamera</label>
                        <input type="text" id="currency" class="form-control" name="harga_kamera" value="{{ $harga }}"
                            placeholder="Harga Kamera">
                    </div>
                    @if(Route::current()->getName()=='kamera.add')

                        <div class="form-group">
                            <label for="name">Stok Kamera</label>
                            <input type="text" class="form-control" name="stok" value="{{ $stok }}"
                                placeholder="Jumlah stok awal kamera">
                        </div>
                    @endif
                    @if(Route::current()->getName()=='kamera.edit')
                        <div class="form-group">
                            <label for="name">Stok Semua</label>
                            <input type="text" id="stok1" class="form-control" name="stok" value="{{ $stokall }}" readonly>
                            <label for="name">Stok Sisa</label>
                            <input type="text" id="stok2" class="form-control" value="{{ $stok }}" readonly>
                            <br>
                            <div class="row">
                                <div class="col-6">
                                    <label for="name">Tambah Stok </label>
                                    <input type="text" id="stokplus" class="form-control" value="0">
                                </div>
                                <div class="col-6">
                                    <label for="name">Kurangi Stok </label>
                                    <input type="text" id="stokmin" class="form-control" value="0">
                                </div>
                            </div>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Gambar Kamera</label>
                        <div class="custom-file">
                            <input id="profile_image" type="file" class="form-control" name="gambar">
                            @if(Route::current()->getName()=='kamera.edit')
                                <small class="text-danger">*Jika tidak ingin merubah foto kosongkan field ini,
                                    <br> jika ingin merubah, pastikan file dengan jenis JPG/PNG dengan resolusi maks
                                    4000x4000 px.</small>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <input class="btn btn-primary col-12" type="submit" value="Submit">
                    </div>
                </fieldset>
                </form>
            </div>
        </div>
    </div>
</div> <!-- row -->
@if(Route::current()->getName()=='kamera.edit')

    <script src="{{ url('/') }}/admin-assets/vendors/core/core.js"></script>
    <script>
        // 
        var stoktotal = parseInt($("#stok1").val());
        var stoksisa = parseInt($("#stok2").val());
        var stokplus = parseInt($("#stokplus").val());
        var stokmin = parseInt($("#stokmin").val());
        // $("#stok1").val(stoktotal + stokplus - stokmin);

        $("#stokplus").on("change", function () {
            var stokplus = parseInt($("#stokplus").val());
            $("#stok1").val(stoktotal + stokplus);
            $("#stok2").val(stoksisa + stokplus);
            stoktotal = parseInt($("#stok1").val());
            stoksisa = parseInt($("#stok2").val());
        });
        $("#stokmin").on("change", function () {
            var stokmin = parseInt($("#stokmin").val());
            $("#stok1").val(stoktotal - stokmin);
            $("#stok2").val(stoksisa - stokmin);
            stoktotal = parseInt($("#stok1").val());  
            stoksisa = parseInt($("#stok2").val());
        });

    </script>
@endif
@endsection
