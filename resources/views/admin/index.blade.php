@extends('./layouts.admin')

@section('content')
<div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
    <div>
        <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
    </div>
    <div class="d-flex align-items-center flex-wrap text-nowrap">
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Hai {{ Auth::user()->name }}</strong>, sekarang Tanggal
            {{ tglindo(date('Y-m-d')) }}, Semangat kerjanya
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    </div>
</div>

{{-- <div class="row">
    <div class="col-12 col-xl-12">
        <div class="row flex-grow">
            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Total Semua Sewa</h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">{{ $tall }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>dengan kamera terpopuler adalah
                                            <b>{{ $mostrent }}</b>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Total Sewa Berlangsung</h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">{{ $trent }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>Sewa terakhir
                                            <b>{{ $newrent }}</b>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4 grid-margin">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline">
                            <h6 class="card-title mb-0">Total Costumer</h6>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-12 col-xl-5">
                                <h3 class="mb-2">{{ $tcust }}</h3>
                                <div class="d-flex align-items-baseline">
                                    <p class="text-success">
                                        <span>dengan customer terloyal dipegang oleh
                                            <b>{{ $mostloyal }}</b>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div> <!-- row --> --}}

<div class="row">
    <div class="col-lg-12 col-xl-12 stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-baseline mb-2">
                    <h6 class="card-title mb-0">Daftar Pinjaman Terbaru</h6>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover mb-0">
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
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($last10 as $m)
                                <tr>
                                    <td>{{ @$loop->iteration }}</td>
                                    <td>{{ tglindo($m->tanggal_pesan) }} Jam
                                        {{ date("H:i:s", strtotime($m->tanggal_pesan)) }}
                                    </td>
                                    <td>{{ namakamera($m->kamera_id) }}</td>
                                    <td>{{ tglindo($m->tanggal_sewa) }}</td>
                                    <td>{{ rupiah($m->harga) }}</td>
                                    <td>{{ namacust($m->cust_id) }}</td>
                                    <td>{{ ($m->admin_id!="0")?namaadmin($m->admin_id) : "Belum diambil" }}</td>
                                    <td>{!! statusbadge($m->diambil) !!}</td>
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
