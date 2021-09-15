@extends('./layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="tag"></i> Data Merk</h6>
                <a href="{{ route('merk.add') }}" class="col-6 text-right">
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
                                <th>Nama Merk</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($merk as $m)
                                <tr>
                                    <td>{{ @$loop->iteration }}</td>
                                    <td>{{ $m->nama_merk }}</td>
                                    <td>
                                        <a href="{{ route('merk.edit', $m->id_merk) }}">
                                            <button type="button" class="btn btn-success btn-icon">
                                                <i class="link-icon" data-feather="edit-2"></i>
                                            </button>
                                        </a>
                                        <a onclick="return confirm('Hapus data {{ $m->nama_merk }}')"
                                            href="{{ route('merk.delete', $m->id_merk) }}">
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
