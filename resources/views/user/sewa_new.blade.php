@extends('./layouts.main')

@section('content')
<!-- Product -->
<div class="bg0 m-t-90 p-b-140">
    <div class="container">
        <div class="p-b-63 bor10 p-lr-70 p-b-70 p-lr-15-lg w-full-md">
            <div class="p-t-32">
                <h4 class="p-b-15">
                    <a class="ltext-108 cl2 hov-cl1 trans-04">
                        Sewa Baru untuk {{ Auth::user()->name }}
                    </a>
                </h4>
                <hr>

                <p class="stext-117 cl6">
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

                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('rent.add') }}" novalidate="novalidate"
                        enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <fieldset>
                            <div class="form-group">
                                <label for="name">Tanggal Sewa </label>
                                    <div class="input-append date form_datetime">
                                        <input size="16" type="text" class="form-control" readonly name="tanggal_sewa">
                                        <span class="add-on"><i class="icon-remove"></i></span>
                                        <span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                            </div>
                            <div class="form-group">
                                <label for="name">Kamera</label>
                                <style>
                                    #select22{
                                        pointer-events: none;
                                    }
                                </style>
                                <select class="select2 form-control col-12" name="kamera_id" id="select22" readonly>
                                    <option value="-">Pilih Produk </option> @foreach ($kamera as $j) <option
                                        value="{{ $j->id_kamera }}" data-harga="{{ $j->harga_kamera }}" {{(Request::segment(3)==$j->id_kamera) ? 'selected' : 'disabled';}}>
                                        {{ $j->nama_kamera."/".$j->tipe_kamera }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" id="harga">
                                <label for="name">Durasi Sewa</label>
                                <div class="col-12 row">
                                    <select class="select2 form-control col-6" id="durasi" name="durasi">
                                        <option value="-">Pilih Durasi </option>
                                        <option value="6">6 Jam</option>
                                        <option value="12">12 Jam</option>
                                        <option value="24">1 Hari</option>
                                    </select>
                                    <div class="col-6">
                                        <input type="text" id="currency" class="form-control" name="harga" readonly
                                            placeholder="Harga Sewa">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group" id="catatan">
                                <label for="name">Catatan</label>
                                <textarea name="catatan" class="form-control col-12" id="exampleFormControlTextarea1"
                                    rows="5"></textarea>
                                {{-- <small class="text-secondary">*pastikan untuk mengisi catatan.</small> --}}
                            </div>
                            <div class="form-group" id="jaminan">
                                <label for="name">Jaminan</label>
                                    <select class="select2 form-control col-12" name="jenis_jaminan" id="select222">
                                        <option value="-">Pilih Jaminan </option>
                                        <option value="ktp">KTP</option>
                                        <option value="sim">SIM</option>
                                    </select>
                                    <small class="text-danger">*Pastikan untuk bawa jaminan anda ketika hendak mengambil barang.</small>
                                    <div class="d-none">
                                        <input id="admin_id" class="form-control " type="text" name="no_jaminan"
                                            value="{{ date('Dhi') }}" readonly>
                                    </div>
                            </div>
                            <div class="form-group d-none">
                                <label for="name">Kasir</label>
                                <input id="admin_id" class="form-control" name="admin_id" type="text"
                                    value="0" readonly>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-info col-12" type="submit" value="Submit">
                            </div>
                        </fieldset>
                    </form>

                </p>
            </div>
        </div>
    </div>
</div>



@endsection