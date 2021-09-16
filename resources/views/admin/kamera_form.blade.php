@extends('./layouts.admin')

@section('content')

@php
    $id = "";
    $nama = "";
    $tipe = "";
    $merk = "";
    $harga = "";
    $role = "";
@endphp
@if(!empty($post))
    @foreach($post as $p )
        @php
            $id = "";
            $nama = "";
            $tipe = "";
            $merk = "";
            $harga = "";
            $role = "";
        @endphp
    @endforeach
@endif

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="tag"></i> Form User</h6>

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

                @if(Route::current()->getName()=='user.add')
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('user.insert') }}" novalidate="novalidate">
                @endif
                @if(Route::current()->getName()=='user.edit')
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('user.update', $id) }}" novalidate="novalidate">
                @endif
                {{ csrf_field() }}
                
                <fieldset>
                    <div class="form-group">
                        <label for="name">Nama User</label>
                        <input id="name" class="form-control" name="name" type="text" value="{{ $nama }}">
                    </div>
                    {{-- <div class="form-group">
                        <label for="name">Email</label>
                        <input id="name" class="form-control" name="email" type="email" value="{{ $email }}">
                    </div>
                    @if(Route::current()->getName()=='user.add')
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input id="name" class="form-control" name="password" type="password">
                        </div>
                    @elseif(Route::current()->getName()=='user.edit')
                        <div class="form-group">
                            <label for="name">New Password</label>
                            <input id="name" class="form-control" name="password" type="password">
                            <small><i>*kosongi jika tidak ingin merubah password</i></small>
                            <input class="d-none" type="text" name="oldpassword" value="{{ $password }}">
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name">Role</label>
                        <select class="select2 form-control" name="is_admin">
                            <option value="0" {{($role == "0")? "selected":""}}>User</option>
                            <option value="1" {{($role == "1")? "selected":""}}>Admin</option>
                        </select>
                    </div> --}}
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
