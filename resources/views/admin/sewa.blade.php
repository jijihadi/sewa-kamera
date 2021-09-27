@extends('./layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="calendar"></i> Data Penyewaan</h6>
                <a href="{{ route('sewa.add') }}" class="col-6 text-right">
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
                                <th>Tanggal Pesan</th>
                                <th>Barang</th>
                                <th>Tanggal Sewa</th>
                                <th>Harga</th>
                                <th>Customer</th>
                                <th>Kasir</th>
                                <th>Status</th>
                                <th>#</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sewa as $m)
                                <tr>
                                    <td>{{ @$loop->iteration }}</td>
                                    <td>{{ tglindo($m->tanggal_pesan)}} Jam {{ date("H:i:s", strtotime($m->tanggal_pesan))}}</td>
                                    <td>{{ namakamera($m->kamera_id)}}</td>
                                    <td>{{ tglindo($m->tanggal_sewa) }}</td>
                                    <td>{{ rupiah($m->harga) }}</td>
                                    <td>{{ namacust($m->cust_id)}}</td>
                                    <td>{{ ($m->admin_id!="0")?namaadmin($m->admin_id) : "Belum diambil" }}</td>
                                    <td>{!! statusbadge($m->diambil) !!}</td>
                                    <td>
                                        @if ($m->diambil==0)
                                        <a onclick="return confirm('Kamera {{ namakamera($m->kamera_id) }} sudah diambil oleh {{namacust($m->cust_id)}} ??')"
                                            href="{{ route('sewa.pick', $m->id_sewa) }}">
                                            <button type="button" class="btn btn-outline-success btn-icon">
                                                <i class="link-icon" data-feather="thumbs-up"></i>
                                            </button>
                                        </a>
                                        @endif
                                        @if ($m->diambil==1)
                                        
                                        <a href="{{ route('kembali.add', $m->id_sewa) }}">
                                            <button type="button" class="btn btn-outline-primary btn-icon-text">
                                                <i class="btn-icon-prepend" data-feather="check-square"></i>
                                                Pengembalian
                                            </button>
                                        </a>                                            
                                        @endif
                                        <a onclick="return confirm('Hapus data sewa {{ namakamera($m->kamera_id) }}')"
                                            href="{{ route('sewa.delete', $m->id_sewa) }}">
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
