@extends('./layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="check-square"></i> History Penyewaan</h6>
                <div class="col-6 text-right">
                <a href="{{route('sewa.print')}}" class="btn btn-sm btn-success"><i class="feather icon-printer"></i> &nbsp;   Cetak</a>
            </div>
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
                                <th>Tanggal Sewa</th>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th>Customer</th>
                                <th>Kasir</th>
                                <th>Tanggal Kembali</th>
                                <th>Denda</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sewa as $m)
                                <tr>
                                    <td>{{ @$loop->iteration }}</td>
                                    <td>{{ tglindo($m->tanggal_sewa) }}</td>
                                    <td>{{ namakamera($m->kamera_id)}}</td>
                                    <td>{{ rupiah($m->harga) }}</td>
                                    <td>{{ namacust($m->cust_id)}}</td>
                                    <td>{{ namaadmin($m->admin_id)}}</td>
                                    <td>{{ tglindo($m->waktu_kembali) }}</td>
                                    <td>{{ viewdenda($m->sewa_id) }}</td>
                                    
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
