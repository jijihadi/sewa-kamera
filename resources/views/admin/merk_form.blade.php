@extends('./layouts.admin')

@section('content')

@php
    $id = "";
    $nama = "";
@endphp
@if(!empty($post))
    @foreach($post as $p )
        @php
            $id = $post->id_merk;
            $nama = $post->nama_merk;
        @endphp
    @endforeach
@endif

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="tag"></i> Form Merk</h6>

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
                @endisset
                @if(Route::current()->getName()=='merk.add')
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('merk.insert') }}" novalidate="novalidate">
                @endif
                @if(Route::current()->getName()=='merk.edit')
                    <form class="cmxform" id="signupForm" method="post"
                        action="{{ route('merk.update', $id) }}" novalidate="novalidate">
                @endif
                {{ csrf_field() }}
                <fieldset>
                    <div class="form-group">
                        <label for="name">Nama Merk</label>
                        <input id="name" class="form-control" name="nama_merk" type="text" value="{{ $nama }}">
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
