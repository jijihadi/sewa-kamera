@extends('./layouts.main')

@section('content')
<!-- Product -->
@foreach($user as $p )
    @php
        $id = $p->id;
        $nama = $p->name;
        $email = $p->email;
        $password = $p->password;
        $role = $p->is_admin;
    @endphp
@endforeach
@foreach($cust as $p )
    @php
        $idc = $p->id_cust;
        $hp = $p->hp_cust;
        $alamat = $p->alamat_cust;
    @endphp
@endforeach


<div class="bg0 m-t-90 p-b-140">
    <div class="container">
        <div class="p-b-63">

            <div class="p-t-32">
                <h4 class="p-b-15">
                    <a class="ltext-108 cl2 hov-cl1 trans-04">
                        Data Customer {{ Auth::user()->name }}
                    </a>
                    @if($errors->any())
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true"><i class="fa fa-close"></i></span>
                            </button>
                        </div>
                    @endif

                    @if(session('msg')!='')
                        <div class="col-12 mt-2">
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <p>{{ session('msg') }}</p>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                                </button>
                            </div>
                        </div>
                    @endif
            </h4>
            <br>

            <p class="stext-117 cl6">
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('profile.update', $id) }}" novalidate="novalidate">
                {{ csrf_field() }}
                
                <fieldset>
                    <div class="form-group">
                        <label for="name">Nama User</label>
                        <input id="name" class="form-control" name="name" type="text" value="{{ $nama }}">
                    </div>
                    <div class="form-group">
                        <label for="name">Email</label>
                        <input id="name" class="form-control" name="email" type="email" value="{{ $email }}">
                    </div>
                        <div class="form-group">
                            <label for="name">New Password</label>
                            <input id="name" class="form-control" name="password" type="password">
                            <small><i>*kosongi jika tidak ingin merubah password</i></small>
                            <input class="d-none" type="text" name="oldpassword" value="{{ $password }}">
                            <input class="d-none" type="text" name="idc" value="{{ $idc  }}">
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
                    <div class="form-group">
                        <input class="btn btn-primary col-12" type="submit" value="Submit">
                    </div>
                </fieldset>
                </form>

            </p>
        </div>
    </div>
</div>
</div>



@endsection
