@extends('./layouts.admin')

@section('content')

<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-6"><i class="link-icon" data-feather="check-square"></i> History Penyewaan</h6>
                <div class="col-6 text-right">
                    <a href="{{ route('sewa.print') }}" class="btn btn-sm btn-success"><i
                            class="feather icon-printer"></i> &nbsp; Cetak</a>
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
                <div class="col-12">
                    <div class="row">
                        <label for="bulan">Pilih Bulan</label>
                        <select name="bulan" id="bulan" class="col-3 ml-3 form-control">
                            <option selected="selected">Pilih Bulan</option>
                            <?php
                                $bln=array(1=>"Januari","Februari","Maret","April","Mei","Juni","July","Agustus","September","Oktober","November","Desember");
                                for($bulan=1; $bulan<=12; $bulan++):
                                    if($bulan<=9):
                                    ?>
                                    <option value='0{{$bulan}}'  <?= ($_GET['m']==$bulan)? 'selected':''?>>{{$bln[$bulan]}}</option>
                                    <?php else: ?>
                                    <option value='{{$bulan}}' <?= ($_GET['m']==$bulan)? 'selected':''?>>{{$bln[$bulan]}}</option>
                                    <?php endif; endfor;?>
                        </select>
                    </div>
                </div>
                <hr>
                <div class="table-responsive">
                    <table class="table" id="myTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Sewa</th>
                                <th>Durasi</th>
                                <th>Barang</th>
                                <th>Harga</th>
                                <th>Customer</th>
                                <th>Kasir</th>
                                <th>Tanggal Kembali</th>
                                <th>Denda</th>
                                <th>Catatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sewa as $m)
                                <tr>
                                    <td>{{ @$loop->iteration }}</td>
                                    <td>{{ tglindo($m->tanggal_sewa) }}</td>
                                    <td>{{ $m->durasi}} Jam</td>
                                    <td>{{ namakamera($m->kamera_id) }}</td>
                                    <td>{{ rupiah($m->harga) }}</td>
                                    <td>{{ namacust($m->cust_id) }}</td>
                                    <td>{{ namaadmin($m->admin_id) }}</td>
                                    <td>{{ tglindo($m->waktu_kembali) }}</td>
                                    <td>{{ viewdenda($m->sewa_id) }}</td>
                                    <td>{{ catatandenda($m->sewa_id) }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div> <!-- row -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

 <script>
     $('#bulan').on('change', function() {
        window.location.href = "{{ '/admin/history?m='}}"+this.value;
    });
 </script>
@endsection
