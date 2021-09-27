@extends('./layouts.main')

@section('content')
<!-- Product -->
<div class="bg0 m-t-90 p-b-140">
    <div class="container">
        <div class="p-b-63">

            <div class="p-t-32">
                <h4 class="p-b-15">
                    <a class="ltext-108 cl2 hov-cl1 trans-04">
                        Data Penyewaan {{ Auth::user()->name }}
                    </a>
                    <div class="pull-right">
                        
                    <a href="{{route('ukamera')}}">
                        <button class="btn btn-info">
                            Sewa Lagi <i class="zmdi zmdi-shopping-cart"></i>
                            </button>
                        </a>
                    </div>
                </h4>
                <br>
                
                <p class="stext-117 cl6">

                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Pesan</th>
                                <th>Barang</th>
                                <th>Tanggal Sewa</th>
                                <th>Harga</th>
                                <th>Kasir</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (empty($sewa->toarray()))
                                <td colspan="7" class="text-center"><i>Anda belum menyewa apapun, yuk pinjam sekarang!</i></td>
                            @else
                                
                            @endif
                            @foreach($sewa as $m)
                                <tr>
                                    <td>{{ @$loop->iteration }}</td>
                                    <td>{{ tglindo($m->tanggal_pesan)}} Jam {{ date("H:i:s", strtotime($m->tanggal_pesan))}}</td>
                                    <td>{{ namakamera($m->kamera_id)}}</td>
                                    <td>{{ tglindo($m->tanggal_sewa) }}</td>
                                    <td>{{ rupiah($m->harga) }}</td>
                                    <td>{{ ($m->admin_id!="0")?namaadmin($m->admin_id) : "Belum diambil"}}</td>
                                    <td>{!! statusbadge($m->diambil) !!}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </p>
            </div>
        </div>
    </div>
</div>



@endsection