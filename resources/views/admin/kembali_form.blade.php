@extends('./layouts.admin')

@section('content')
{{-- {{dd($sewa['tanggal_sewa']) }} --}}

<div class="row">
    <div class="col-md-4 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-12"><i class="link-icon" data-feather="clipboard"></i> Data Sewa</h6>

            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><b>Barang</b> : {{ namakamera($sewa['kamera_id']) }}
                </li>
                <li class="list-group-item"><b>Penyewa</b> : {{ namacust($sewa['cust_id']) }}
                </li>
                <li class="list-group-item"><b>Tanggal Sewa</b> :
                    {{ tglindo($sewa['tanggal_sewa']) }}</li>
                <li class="list-group-item"><b>Waktu Ambil</b> :
                    {{ tglindo($sewa['updated_at']) }} Jam
                    {{ date("H:i:s", strtotime($sewa['updated_at'])) }}
                </li>
                <li class="list-group-item"><b>Durasi</b> : {{ $sewa['durasi'] }} Jam</li>
                <li class="list-group-item">
                    @php
                        $deadline = date('Y-m-d H:i:s', strtotime($sewa['updated_at'])+60*60*$sewa['durasi'])
                    @endphp
                    <h6><b>Deadline Sewa</b> :
                        {{ tglindo($deadline) }}
                        Jam
                        {{ date("H:i:s", strtotime($sewa['updated_at'])) }}
                    </h6>
                </li>
                <li class="list-group-item"><b>Jaminan</b> :
                    {!! namajaminan($sewa['jaminan_id']) !!}</li>
                <li class="list-group-item"><b>Catatan</b> :
                    {{ $sewa['catatan'] }}</li>
                <li class="list-group-item"><b>Kasir</b> :
                    {{ namaadmin($sewa['admin_id']) }}</li>
            </ul>

        </div>
    </div>
    <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
            <div class="card-header row">
                <h6 class="col-12"><i class="link-icon" data-feather="rotate-cw"></i> Form Pengembalian</h6>
            </div>
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
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('msg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true"><i class="feather icon-x-circle"></i></span>
                    </button>
                </div>
            @endif
            <form class="cmxform" id="signupForm" method="post"
                action="{{ route('kembali.insert', $sewa['id_sewa']) }}"
                novalidate="novalidate" enctype="multipart/form-data">
                {{ csrf_field() }}

                <ul class="list-group list-group-flush">
                    @php
                        $dendahari = "0";
                    @endphp
                    @if($deadline < date("Y-m-d H:i:s"))
                        @php
                            $to = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', date("Y-m-d H:i:s"));
                            $from = \Carbon\Carbon::createFromFormat('Y-m-d H:s:i', $deadline);

                            $res = $to->diffInHours($from);
                            $roundres = round($res/24);
                            //
                            $denda = $sewa['harga'] * .10;

                            $dendahari = $roundres * $denda;

                            // echo $denda;
                        @endphp
                        <li class="list-group-item">
                            <div class="alert alert-warning" role="alert">
                                <p>{{ namacust($sewa['cust_id']) }} Terlambat mengembalikan
                                    sewa selama {{ $res }} jam, dan dibulatkan menjadi {{ $roundres }} hari. Dan
                                    akan dikenakan denda keterlambatan sejumlah 10% harga sewa perhari!</p>
                            </div>
                        </li>
                    @endif
                    <li class="list-group-item">
                        <label for="name"><b>Catatan</b></label>
                        <input type="hidden" name="sewa_id" value="{{$sewa['id_sewa']}}">
                        <textarea name="catatan" class="form-control" id="exampleFormControlTextarea1"
                            rows="5"></textarea>
                    </li>

                    <li class="list-group-item"><label for="name"><b>Denda Terlambat</b></label>
                        <input type="text" id="denda1" class="form-control" value="{{ $dendahari }}" readonly></li>
                    <li class="list-group-item"><label for="name"><b>Denda Lain-lain</b></label>
                        <input type="text" id="denda2" class="form-control" value="0">
                        <small class="text-secondary">*isi jika terjadi ketidak lengkapan dalam Pengembalian.</small>
                    </li>
                    <li class="list-group-item"><label for="name"><b>Total Denda</b></label>
                        <input type="text" id="dendat" class="form-control" name="denda" readonly></li>
                    <li class="list-group-item"><input class="btn btn-primary col-12" type="submit" value="Submit"></li>

                </ul>
            </form>
        </div>
    </div>
</div> <!-- row -->
<script src="{{ url('/') }}/admin-assets/vendors/core/core.js"></script>
<script>
    // 
    var denda2 = parseInt($("#denda2").val());
            $("#dendat").val(parseInt({{ $dendahari}}) + denda2);

            $("#denda2").on("change", function () {
                var denda2 = $("#denda2").val();
                denda2 = denda2.split('.').join("");
                $("#dendat").val(parseInt({{ $dendahari}}) + parseInt(denda2));
            });
</script>
@endsection
