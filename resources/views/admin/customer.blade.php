@extends('./layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="customers"></i> Data Customer</h6>
                <a href="{{ route('customer.add') }}" class="col-6 text-right">
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
                                <th>Nama Customer</th>
                                <th>Email</th>
                                <th>Hp</th>
                                <th>Alamat</th>
                                <th>Status</th>
                                <th>Join</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($customer as $m)
                                <tr>
                                    <td>{{ @$loop->iteration }}</td>
                                    <td>{{ $m->nama_cust }}</td>
                                    <td>{{ $m->email_cust }}</td>
                                    <td>{{ $m->hp_cust }}</td>
                                    <td>{{ $m->alamat_cust }}</td>
                                    <td>{{ ($m->status_cust == 1)? "Aktif" : "Belum" }}</td>
                                    <td>{{ tglindo($m->created_at) }}</td>
                                    <td>
                                        <a href="{{ route('customer.edit', $m->id_cust) }}">
                                            <button type="button" class="btn btn-outline-success btn-icon">
                                                <i class="link-icon" data-feather="edit-2"></i>
                                            </button>
                                        </a>
                                        <a onclick="return confirm('Hapus data {{ $m->name }}')"
                                            href="{{ route('customer.delete', $m->id_cust) }}">
                                            <button type="button" class="btn btn-outline-danger btn-icon">
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
