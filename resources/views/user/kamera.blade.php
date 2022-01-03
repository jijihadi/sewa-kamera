@extends('./layouts.main')

@section('content')
<!-- Product -->
<div class="bg0 m-t-90 p-b-140">
    <div class="container">
        <div class="flex-w flex-sb-m p-b-52">
            <div class="flex-w flex-l-m filter-tope-group m-tb-10">
                <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
                    All Products
                </button>

                @foreach($kamera as $m)

                    <button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
                        data-filter=".{{ strtolower(namamerk($m->merk_kamera)) }}">
                        {{ namamerk($m->merk_kamera) }}
                    </button>
                @endforeach
            </div>
        </div>

        <div class="row isotope-grid">
            @foreach($kamera as $k)
                <div class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item {{ strtolower(namamerk($k->merk_kamera)) }}">
                    <!-- Block2 -->
                    <div class="block2">
                        <div class="block2-pic hov-img0">
							<img src="{{ url('file_upload/img')."/".$k->gambar}}" alt="" style="max-height:300px; max-width:100%"  alt="IMG-PRODUCT">
                        </div>

                        <div class="block2-txt flex-w flex-t p-t-14">
                            <div class="block2-txt-child1 flex-col-l ">
                                <a href="#" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                    {{$k->nama_kamera." ".$k->tipe_kamera}}
                                </a>

                                <span class="stext-105 cl3">
                                    {{rupiah($k->harga_kamera)}} <small>/24 Jam</small>
                                </span>
                            </div>

                            <div class="block2-txt-child2 flex-r p-t-3">
                                <a href="{{route('kamera.show', $k->id_kamera)}}"><button class="btn btn-outline-info btn-icon mr-1"><i class="zmdi zmdi-eye"></i></button></a>
                                <a href="{{route('rent.new', $k->id_kamera)}}"><button class="btn btn-outline-info">Sewa <i class="zmdi zmdi-shopping-cart"></i></button></a>
                            </div>
                        </div>
                    </div>
                </div>
				<hr>
            @endforeach
        </div>
    </div>
</div>



@endsection