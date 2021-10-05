@extends('./layouts.main')

@section('content')

<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60 m-t-90 ">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-7 p-b-30">
                <div class="p-l-25 p-r-30 p-lr-0-lg">
                    <div class="wrap-slick3 flex-sb flex-w">
                        <div class="wrap-slick3-dots"></div>
                        <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>
                        <div class="slick3 gallery-lb">
                            <div class="item-slick3"
                                data-thumb="{{ url('file_upload/img')."/".$kamera->gambar }}">
                                <div class="wrap-pic-w pos-relative">
                                    <img src="{{ url('file_upload/img')."/".$kamera->gambar }}"
                                        alt="IMG-PRODUCT" style="max-width:40em;">

                                    <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                        href="{{ url('file_upload/img')."/".$kamera->gambar }}">
                                        <i class="fa fa-expand"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-5 p-b-30">
                <div class="p-r-50 p-t-5 p-lr-0-lg">
                    <h4 class="mtext-105 cl2 js-name-detail p-b-14">
                        {{ $kamera->nama_kamera." ".$kamera->tipe_kamera }}
                    </h4>

                    <span class="mtext-106 cl2">
                        {{ rupiah($kamera->harga_kamera) }} <small>/24 Jam</small>
                    </span>

                    <p class="stext-102 cl3 p-t-23">
                        Sisa stok: {{ $kamera->stok }}
                    </p>

                    <!--  -->
                    <div class="p-t-33">
                        @if($kamera->stok>0)
                            <a href="{{route('rent.new', $kamera->id_kamera)}}">
                                <button class="flex-c-m stext-101 cl0 size-101 bg1 col-12">
                                    Sewa Sekarang
                                </button>
                            </a>
                        @else
                            <button class="flex-c-m stext-101 cl0 size-101 bg2 col-12" disabled>
                                Stok Kosong
                            </button>
                        @endif
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="bg6 flex-c-m flex-w size-302 m-t-73 p-tb-15">
        <span class="stext-107 cl6 p-lr-25">
            Kode: {{ $kamera->tipe_kamera }}
        </span>

        <span class="stext-107 cl6 p-lr-25">
            Categories: {{namamerk($kamera->merk_kamera)}}
        </span>
    </div>
	<hr>

	<!-- Related Products -->
	{{-- <section class="sec-relate-product bg0 p-t-45 p-b-105">
		<div class="container">
			<div class="p-b-45">
				<h3 class="ltext-106 cl5 txt-center">
					Related Products
				</h3>
			</div>

			<!-- Slide2 -->
			<div class="wrap-slick2">
				<div class="slick2">
					@foreach ($random as $r)
					<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
						<!-- Block2 -->
						<div class="block2">
							<div class="block2-pic hov-img0">
								<img src="{{ url('file_upload/img')."/".$r->gambar}}" alt="" style="max-height:100%; max-width:100%"  alt="IMG-PRODUCT">
							</div>
	
							<div class="block2-txt flex-w flex-t p-t-14">
								<div class="block2-txt-child1 flex-col-l ">
									<a href="product-detail.html" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
										{{$r->nama_kamera." ".$r->tipe_kamera}}
									</a>
	
									<span class="stext-105 cl3">
										{{rupiah($r->harga_kamera)}} <small>/24 Jam</small>
									</span>
								</div>
	
								<div class="block2-txt-child2 flex-r p-t-3">
									<a href="{{route('kamera.show', $r->id_kamera)}}"><button class="btn btn-outline-info btn-icon mr-1"><i class="zmdi zmdi-eye"></i></button></a>
									<a href="{{route('rent.new', $r->id_kamera)}}"><button class="btn btn-outline-info">Sewa <i class="zmdi zmdi-shopping-cart"></i></button></a>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</div>
	</section> --}}
</section>
@endsection