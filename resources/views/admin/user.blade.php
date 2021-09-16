@extends('./layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="users"></i> Data User</h6>
                <a href="{{ route('user.add') }}" class="col-6 text-right">
                    <button type="button" class="btn btn-primary btn-sm btn-icon-text mb-1 mb-md-0">
                        Tambah <i class="link-icon" data-feather="plus"></i>
                    </button>
                </a>

            </div>
            <div class="card-body">
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
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama User</th>
                                <th>Email</th>
                                <th>Join</th>
                                <th>Role</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($user as $m)
                                <tr>
                                    <td>{{ @$loop->iteration }}</td>
                                    <td>{{ $m->name }}</td>
                                    <td>{{ $m->email }}</td>
                                    <td>{{ tglindo($m->created_at) }}</td>
                                    <td>{{ ($m->is_admin == 1)? "Admin" : "User" }}</td>
                                    <td>
                                        <a href="{{ route('user.edit', $m->id) }}">
                                            <button type="button" class="btn btn-success btn-icon">
                                                <i class="link-icon" data-feather="edit-2"></i>
                                            </button>
                                        </a>
                                        <a onclick="return confirm('Hapus data {{ $m->name }}')"
                                            href="{{ route('user.delete', $m->id) }}">
                                            <button type="button" class="btn btn-danger btn-icon">
                                                <i class="link-icon" data-feather="trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->

@endsection
