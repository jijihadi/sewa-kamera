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
            $id = $p->id_sewa;
            $nama = $p->nama_sewa;
            $tipe = $p->tipe_sewa;
            $merks = $p->merk_sewa;
            $harga = $p->harga_sewa;
            $stok = $p->stok;
            $gambar = $p->gambar;
        @endphp
    @endforeach
@endif

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="calendar"></i> Form Penyewaan</h6>

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

                @if(Route::current()->getName()=='sewa.add')
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('sewa.insert') }}" novalidate="novalidate"
                        enctype="multipart/form-data">
                @endif
                @if(Route::current()->getName()=='sewa.edit')
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('sewa.update', $id) }}" novalidate="novalidate"
                        enctype="multipart/form-data">
                @endif
                {{ csrf_field() }}

                <fieldset>
                    <div class="form-group">
                        <label for="name">Tanggal Sewa </label>
                        <div class="col-12 row">
                            <div class="input-group date datepicker col-8 mr-4" id="datePickerExample">
                                <input type="text" name="tanggal_sewa" class="form-control"><span
                                    class="input-group-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round" class="feather feather-calendar">
                                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                                        <line x1="16" y1="2" x2="16" y2="6"></line>
                                        <line x1="8" y1="2" x2="8" y2="6"></line>
                                        <line x1="3" y1="10" x2="21" y2="10"></line>
                                    </svg></span>
                            </div>
                            <div class="input-group date timepicker col-3" id="datetimepickerExample"
                                data-target-input="nearest">
                                <input type="text" class="form-control timepicker" name="waktu_sewa"
                                    data-target="#datetimepickerExample">
                                <div class="input-group-append" data-target="#datetimepickerExample"
                                    data-toggle="datetimepicker">
                                    <div class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                            height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-clock">
                                            <circle cx="12" cy="12" r="10"></circle>
                                            <polyline points="12 6 12 12 16 14"></polyline>
                                        </svg></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Customer</label>
                        <div class="col-12 row">
                            <select class="select2 form-control col-10" name="cust_id" id="select2">
                                <option value="-">Pilih Customer </option> @foreach ($customer as $c) <option
                                    value="{{ $c->id_cust }}"> {{ $c->nama_cust }}</option> @endforeach
                            </select>
                            <a href="{{ route('customer.add') }}" class="btn btn-success ml-4">Add
                                Customer </a>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Kamera</label>
                        <select class="select2 form-control col-11" name="kamera_id" id="select22">
                            <option value="-">Pilih Produk </option> @foreach ($kamera as $j) <option
                                value="{{ $j->id_kamera }}" data-harga="{{ $j->harga_kamera }}">
                                {{ $j->nama_kamera."/".$j->tipe_kamera }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group" id="harga">
                        <label for="name">Harga Sewa</label>
                        <div class="col-12 row">
                            <select class="select2 form-control col-6" id="durasi" name="durasi">
                                <option value="-">Pilih Durasi </option>
                                <option value="6">6 Jam</option>
                                <option value="12">12 Jam</option>
                                <option value="24">1 Hari</option>
                            </select>
                            <div class="col-5 ml-4">
                                <input type="text" id="currency" class="form-control" name="harga" value="{{ $harga }}"
                                    readonly placeholder="Harga Sewa">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" id="catatan">
                        <label for="name">Catatan</label>
                        <textarea name="catatan" class="form-control col-11" id="exampleFormControlTextarea1"
                            rows="5"></textarea>
                        <small class="text-secondary">*pastikan untuk mengisi catatan.</small>
                    </div>
                    <div class="form-group" id="jaminan">
                        <label for="name">Jaminan</label>
                        <div class="col-12 row">
                            <select class="select2 form-control col-6" name="jenis_jaminan" id="select222">
                                <option value="-">Pilih Jaminan </option>
                                <option value="ktp">KTP</option>
                                <option value="sim">SIM</option>

                            </select>
                            <div class="col-5 ml-4">
                                <input id="admin_id" class="form-control" type="text" name="no_jaminan"
                                    value="{{ date('Dhi') }}" readonly>
                                <small class="text-danger">*tulis kode ini di sticker dan tempelkan di jaminan
                                    customer.</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="name">Kasir</label>
                        <input id="admin_id" class="form-control col-11" type="text"
                            value="{{ Auth::user()->name }}" readonly>
                        <input id="admin_id" class="form-control" name="admin_id" type="hidden"
                            value="{{ Auth::user()->id }}" readonly>
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

@endsection