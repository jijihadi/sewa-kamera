@extends('./layouts.admin')

@section('content')

@php
    $id = "";
    $nama = "";
    $email = "";
    $password = "";
    $hp = "";
    $alamat = "";
    $status = "";
@endphp
@if(!empty($post))
    @foreach($post as $p )
        @php
            $id = $post->id_cust;
            $nama = $post->nama_cust;
            $email = $post->email_cust;
            $hp = $post->hp_cust;
            $alamat = $post->alamat_cust;
            $status = $post->status_cust;
        @endphp
    @endforeach
@endif

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="tag"></i> Form Customer</h6>

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

                @if(Route::current()->getName()=='customer.add')
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('customer.insert') }}" novalidate="novalidate">
                @endif
                @if(Route::current()->getName()=='customer.edit')
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('customer.update', $id) }}" novalidate="novalidate">
                @endif
                {{ csrf_field() }}
                
                <fieldset>
                    <div class="form-group">
                        <label for="name">Nama Customer</label>
                        <input id="name" class="form-control" name="nama_cust" type="text" value="{{ $nama }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Email Cust</label>
                        <input id="name" class="form-control" name="email" type="email" value="{{ $email }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Nomor Handphone</label>
                        <input id="name" class="form-control" name="hp_cust" maxlength="13" type="text" value="{{ $hp }}">
                    </div>
                    <div class="form-group" id="catatan">
                        <label for="name">Alamat</label>
                        <textarea name="alamat_cust" class="form-control" id="exampleFormControlTextarea1"
                            rows="5">{{$alamat}}</textarea>
                    </div>
                    @if(Route::current()->getName()=='customer.add')
                        <div class="form-group">
                            <label for="name">Password <small><i>untuk login customer</i></small></label>
                            <input id="name" class="form-control" name="password" type="password">
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Status</label>
                        <select class="select2 form-control" name="status_cust">
                            <option value="1" {{($status == "1")? "selected":""}}>Aktif</option>
                            <option value="0" {{($status == "0")? "selected":""}}>Tidak Aktif</option>
                        </select>
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
