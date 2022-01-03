<!DOCTYPE html>
<html lang="en">

<head>
    <title>Studio Jalanan</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ url('/') }}/user-assets/images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/user-assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/user-assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/user-assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/user-assets/fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/user-assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/user-assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/user-assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/user-assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/user-assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/user-assets/vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/user-assets/vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ url('/') }}/user-assets/vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/user-assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="{{ url('/') }}/user-assets/css/main.css">
    <!--===============================================================================================-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!--===============================================================================================-->
</head>

<body class="animsition">

    <!-- Header -->
    <header>
        <!-- Header desktop -->
        <div class="container-menu-desktop">
            <!-- Topbar -->
            <div class="top-bar">
                <div class="content-topbar flex-sb-m h-full container">
                    <div class="left-top-bar">
                        Selamat datang di Studio Jalanan 
                        {{-- <small>Jalan lupa bayar ya Saya trauma dighosting</small> --}}
                    </div>

                    <div class="right-top-bar flex-w h-full">
                        @guest
                            @if(Route::has('login'))
                                <a href="{{ route('login') }}" class="flex-c-m trans-04 p-lr-25">
                                    {{ __('Login') }}
                                </a>
                            @endif

                            @if(Route::has('register'))
                                <a href="{{ route('register') }}" class="flex-c-m trans-04 p-lr-25">
                                    {{ __('Register') }}
                                </a>
                            @endif
                        @else
                            <a href="#" class="flex-c-m trans-04 p-lr-25">
                                {{ Auth::user()->name }}
                            </a>
                            <a href="{{route('profile')}}" class="flex-c-m trans-04 p-lr-25">
                                Profile
                            </a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();"
                                class="flex-c-m trans-04 p-lr-25">
                                {{ __('Logout') }}
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                class="d-none">
                                @csrf
                            </form>
                        @endguest

                    </div>
                </div>
            </div>

            <div class="wrap-menu-desktop">
                <nav class="limiter-menu-desktop container">

                    <!-- Logo desktop -->
                    <a href="{{ url('/') }}/user-assets/#" class="logo">
                        <img src="{{ url('/') }}/user-assets/images/icons/logo-01.png"
                            alt="IMG-LOGO">
                    </a>

                    <!-- Menu desktop -->
                    <div class="menu-desktop">
                        <ul class="main-menu">
                            <li @if(Request::segment(1)=='' ) class="active-menu" @endif>
                                <a href="{{ url('/') }}">Home</a>
                            </li>

                            <li @if(Request::segment(1)=='kamera' ) class="active-menu" @endif>
                                <a href="{{ route('ukamera') }}">Kamera</a>
                            </li>
                            @guest
                            @else
                                <li @if(Request::segment(1)=='rent' ) class="active-menu" @endif>
                                    <a href="{{ route('rent') }}">Penyewaan</a>
                                </li>

                                <li @if(Request::segment(1)=='history' ) class="active-menu" @endif>
                                    <a href="{{ route('rent.history') }}">Riwayat</a>
                                </li>
                            @endguest
                        </ul>
                    </div>

                    <!-- Icon header -->
                    <div class="wrap-icon-header flex-w flex-r-m">
                        {{-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
                            <i class="zmdi zmdi-search"></i>
                        </div>

                        <div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
                            data-notify="0">
                            <i class="zmdi zmdi-shopping-basket"></i>
                        </div> --}}

                    </div>
                </nav>
            </div>
        </div>

        <!-- Header Mobile -->
        <div class="wrap-header-mobile">
            <!-- Logo moblie -->
            <div class="logo-mobile">
                <a href="{{ url('/') }}/user-assets/index.html"><img
                        src="{{ url('/') }}/user-assets/images/icons/logo-01.png"
                        alt="IMG-LOGO"></a>
            </div>

            <!-- Icon header -->
            <div class="wrap-icon-header flex-w flex-r-m m-r-15">
                {{-- <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
                    <i class="zmdi zmdi-search"></i>
                </div>

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
                    data-notify="0">
                    <i class="zmdi zmdi-shopping-basket"></i>
                </div> --}}

                <div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10">
                    <i class="zmdi zmdi-account-box-o"></i>
                </div>
            </div>

            <!-- Button show menu -->
            <div class="btn-show-menu-mobile hamburger hamburger--squeeze">
                <span class="hamburger-box">
                    <span class="hamburger-inner"></span>
                </span>
            </div>
        </div>


        <!-- Menu Mobile -->
        <div class="menu-mobile">

            <ul class="main-menu-m">
                <li @if(Request::segment(1)=='' ) class="active-menu" @endif>
                <a href="{{ url('/') }}">Home</a>
                </li>

                <li @if(Request::segment(1)=='kamera' ) class="active-menu" @endif>
                    <a href="{{ route('ukamera') }}">Kamera</a>
                </li>
                @guest
                @else
                    <li @if(Request::segment(1)=='rent' ) class="active-menu" @endif>
                        <a href="{{ route('rent') }}">Penyewaan</a>
                    </li>

                    <li @if(Request::segment(1)=='history' ) class="active-menu" @endif>
                        <a href="{{ route('rent.history') }}">Riwayat</a>
                    </li>
                @endguest

                @guest
                    @if(Route::has('login'))
                        <li>
                            <a href="{{ route('login') }}">
                                {{ __('Login') }}
                            </a>
                        </li>
                    @endif

                    @if(Route::has('register'))
                        <li>
                            <a href="{{ route('register') }}">
                                {{ __('Register') }}
                            </a>
                        </li>
                    @endif
                @else
                    <li>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                        class="d-none">
                        @csrf
                    </form>
                @endguest
            </ul>
        </div>

        <!-- Modal Search -->
        <div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
            <div class="container-search-header">
                <button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
                    <img src="{{ url('/') }}/user-assets/images/icons/icon-close2.png" alt="CLOSE">
                </button>

                <form class="wrap-search-header flex-w p-l-15">
                    <button class="flex-c-m trans-04">
                        <i class="zmdi zmdi-search"></i>
                    </button>
                    <input class="plh3" type="text" name="search" placeholder="Search...">
                </form>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Cart -->
    <div class="wrap-header-cart js-panel-cart">
        <div class="s-full js-hide-cart"></div>

        <div class="header-cart flex-col-l p-l-65 p-r-25">
            <div class="header-cart-title flex-w flex-sb-m p-b-8">
                <span class="mtext-103 cl2">
                    Your Cart
                </span>

                <div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
                    <i class="zmdi zmdi-close"></i>
                </div>
            </div>

            <div class="header-cart-content flex-w js-pscroll">
                <ul class="header-cart-wrapitem w-full">
                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{ url('/') }}/user-assets/images/item-cart-01.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="{{ url('/') }}/user-assets/#"
                                class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                White Shirt Pleat
                            </a>

                            <span class="header-cart-item-info">
                                1 x $19.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{ url('/') }}/user-assets/images/item-cart-02.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="{{ url('/') }}/user-assets/#"
                                class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Converse All Star
                            </a>

                            <span class="header-cart-item-info">
                                1 x $39.00
                            </span>
                        </div>
                    </li>

                    <li class="header-cart-item flex-w flex-t m-b-12">
                        <div class="header-cart-item-img">
                            <img src="{{ url('/') }}/user-assets/images/item-cart-03.jpg" alt="IMG">
                        </div>

                        <div class="header-cart-item-txt p-t-8">
                            <a href="{{ url('/') }}/user-assets/#"
                                class="header-cart-item-name m-b-18 hov-cl1 trans-04">
                                Nixon Porter Leather
                            </a>

                            <span class="header-cart-item-info">
                                1 x $17.00
                            </span>
                        </div>
                    </li>
                </ul>

                <div class="w-full">
                    <div class="header-cart-total w-full p-tb-40">
                        Total: $75.00
                    </div>

                    <div class="header-cart-buttons flex-w w-full">
                        <a href="{{ url('/') }}/user-assets/shoping-cart.html"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
                            View Cart
                        </a>

                        <a href="{{ url('/') }}/user-assets/shoping-cart.html"
                            class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-b-10">
                            Check Out
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Footer -->
    <footer class="bg3 p-t-75 p-b-32">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Apa itu Studio jalanan.
                    </h4>

                    <p>
                        Studio jalanan adalah tempat sewa kamera terkece tergaul dan termantap.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    </p>
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    
                </div>

                <div class="col-sm-6 col-lg-3 p-b-50">
                    <h4 class="stext-301 cl0 p-b-30">
                        Social media
                    </h4>

                    <ul>
                        <li class="text-white"><i class="zmdi zmdi-facebook"></i> Studio Jalanan</li>
                        <li class="text-white"><i class="zmdi zmdi-instagram"></i> @studiojalanan</li>
                        <li class="text-white"><i class="zmdi zmdi-pin"></i> Perempatan Lampu Merah Bank BNI Banyuwangi Kota</li>
                    </ul>
                </div>
            </div>

            <div class="p-t-40">

                <p class="stext-107 cl6 txt-center">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;<script>
                        document.write(new Date().getFullYear());
                    </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                        aria-hidden="true"></i> by <a>Aros Indonesia</a>.
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->

                </p>
            </div>
        </div>
    </footer>


    <!-- Back to top -->
    <div class="btn-back-to-top" id="myBtn">
        <span class="symbol-btn-back-to-top">
            <i class="zmdi zmdi-chevron-up"></i>
        </span>
    </div>

    <!-- Modal1 -->
    <div class="wrap-modal1 js-modal1 p-t-60 p-b-20">
        <div class="overlay-modal1 js-hide-modal1"></div>

        <div class="container">
            <div class="bg0 p-t-60 p-b-30 p-lr-15-lg how-pos3-parent">
                <button class="how-pos3 hov3 trans-04 js-hide-modal1">
                    <img src="{{ url('/') }}/user-assets/images/icons/icon-close.png" alt="CLOSE">
                </button>

                <div class="row">
                    <div class="col-md-6 col-lg-7 p-b-30">
                        <div class="p-l-25 p-r-30 p-lr-0-lg">
                            <div class="wrap-slick3 flex-sb flex-w">
                                <div class="wrap-slick3-dots"></div>
                                <div class="wrap-slick3-arrows flex-sb-m flex-w"></div>

                                <div class="slick3 gallery-lb">
                                    <div class="item-slick3" data-thumb="images/product-detail-01.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ url('/') }}/user-assets/images/product-detail-01.jpg"
                                                alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="{{ url('/') }}/user-assets/images/product-detail-01.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" data-thumb="images/product-detail-02.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ url('/') }}/user-assets/images/product-detail-02.jpg"
                                                alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="{{ url('/') }}/user-assets/images/product-detail-02.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="item-slick3" data-thumb="images/product-detail-03.jpg">
                                        <div class="wrap-pic-w pos-relative">
                                            <img src="{{ url('/') }}/user-assets/images/product-detail-03.jpg"
                                                alt="IMG-PRODUCT">

                                            <a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
                                                href="{{ url('/') }}/user-assets/images/product-detail-03.jpg">
                                                <i class="fa fa-expand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6 col-lg-5 p-b-30">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/vendor/bootstrap/js/popper.js"></script>
    <script src="{{ url('/') }}/user-assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/vendor/select2/select2.min.js"></script>
    <script>
        $(".js-select2").each(function () {
            $(this).select2({
                minimumResultsForSearch: 20,
                dropdownParent: $(this).next('.dropDownSelect2')
            });
        })
    </script>
    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="{{ url('/') }}/user-assets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/vendor/slick/slick.min.js"></script>
    <script src="{{ url('/') }}/user-assets/js/slick-custom.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/vendor/parallax100/parallax100.js"></script>
    <script>
        $('.parallax100').parallax100();
    </script>
    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/vendor/MagnificPopup/jquery.magnific-popup.min.js">
    </script>
    <script>
        $('.gallery-lb').each(function () { // the containers for all your galleries
            $(this).magnificPopup({
                delegate: 'a', // the selector for gallery item
                type: 'image',
                gallery: {
                    enabled: true
                },
                mainClass: 'mfp-fade'
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/vendor/isotope/isotope.pkgd.min.js"></script>
    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/vendor/sweetalert/sweetalert.min.js"></script>
    <script>
        $('.js-addwish-b2').on('click', function (e) {
            e.preventDefault();
        });

        $('.js-addwish-b2').each(function () {
            var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
            $(this).on('click', function () {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-b2');
                $(this).off('click');
            });
        });

        $('.js-addwish-detail').each(function () {
            var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

            $(this).on('click', function () {
                swal(nameProduct, "is added to wishlist !", "success");

                $(this).addClass('js-addedwish-detail');
                $(this).off('click');
            });
        });

        /*---------------------------------------------*/

        $('.js-addcart-detail').each(function () {
            var nameProduct = $(this).parent().parent().parent().parent().find('.js-name-detail').html();
            $(this).on('click', function () {
                swal(nameProduct, "is added to cart !", "success");
            });
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js">
    </script>
    <script>
        $('.js-pscroll').each(function () {
            $(this).css('position', 'relative');
            $(this).css('overflow', 'hidden');
            var ps = new PerfectScrollbar(this, {
                wheelSpeed: 1,
                scrollingThreshold: 1000,
                wheelPropagation: false,
            });

            $(window).on('resize', function () {
                ps.update();
            })
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ url('/') }}/user-assets/js/main.js"></script>

    {{-- select2 --}}
        
    {{-- select2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/css/bootstrap-datetimepicker.min.css" integrity="sha512-m9g5oqvMhf2FsilNZqftBnOR1GW+dJpb1a8RN+R3Aw1dVI2AeDfpSOa9Sm48xMacONC1vJlM2iIadPy4uLEC4Q==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>
    
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/smalot-bootstrap-datetimepicker/2.4.4/js/bootstrap-datetimepicker.min.js" integrity="sha512-4lTnmq2kNbykTiOPulgEvxRgqegB5/YMhMqaBWvxji/9wRgR9W/TSGF51/mIG1hQ6janxTojpr41y5/gaW9LRA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script type="text/javascript">
        $(".form_datetime").datetimepicker({
            format: "yyyy-mm-dd HH:ii:ss",
            autoclose: true,
            todayBtn: true,
            startDate: "2021-01-01 00:00",
            minuteStep: 10
        });
    </script>    

    <script>
        $(document).ready(function () {
            // select2
            $('#select2').select2({
                theme: "bootstrap"
            });
            $('#select22').select2({
                theme: "bootstrap"
            });
            $('#select222').select2({
                theme: "bootstrap"
            });
            $('#jenis-sewa').select2({
                theme: "bootstrap"
            });
            

            // custom stuff
            var val = ""
            // $("#select22").on("change", function () {
                // hitung harga
                val = $(this).find('option:selected').data("harga");
            // });
            $("#durasi").on("change", function () {
                var dur = parseInt($(this).find('option:selected').val());
                var final ="";
                switch (dur) {
                    case 6:
                        final = parseInt(val) * 0.25;
                        $("#currency").val(final);
                        console.log(val);       
                        console.log(final);       
                        break;
                    case 12:
                        final = parseInt(val) * 0.5;
                        $("#currency").val(final);
                        break;
                    case 24:
                        final = parseInt(val);
                        $("#currency").val(final);
                        break;
                }
            });
        });
    </script>

</body>

</html>