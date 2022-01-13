@extends('./layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="camera"></i> Data Produk</h6>
                <a href="{{ route('kamera.add') }}" class="col-6 text-right">
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
                                <th>Nama Produk</th>
                                <th>Merk/Tipe</th>
                                <th>Stok</th>
                                <th>Ready</th>
                                <th>Harga</th>
                                <th>Gambar</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($kamera as $m)
                                <tr>
                                    <td>{{ @$loop->iteration }}</td>
                                    <td>{{ $m->nama_kamera }}</td>
                                    <td>{{ namamerk($m->merk_kamera) ."/". $m->tipe_kamera }}</td>
                                    <td>{{ stokrent($m->id_kamera) + $m->stok }}</td>
                                    <td>{{ $m->stok }}</td>
                                    <td>{{ rupiah($m->harga_kamera) }}</td>
                                    <td><img src="{{ url('file_upload/img')."/".$m->gambar}}" style="max-height:200px; max-width:100%">
                                    </td>
                                    <td>
                                        <a href="{{ route('kamera.edit', $m->id_kamera) }}">
                                            <button type="button" class="btn btn-outline-success btn-icon">
                                                <i class="link-icon" data-feather="edit-2"></i>
                                            </button>
                                        </a>
                                        <a onclick="return confirm('Hapus data {{ $m->nama_kamera }}')"
                                            href="{{ route('kamera.delete', $m->id_kamera) }}">
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
