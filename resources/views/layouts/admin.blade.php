<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Studio Jalanan </title>
    <!-- core:css -->
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/vendors/core/core.css">
    <!-- endinject -->
    <!-- plugin css for this page -->
    <link rel="stylesheet"
        href="{{ url('/') }}/admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css">
    <!-- end plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/fonts/feather-font/css/iconfont.css">
    <link rel="stylesheet"
        href="{{ url('/') }}/admin-assets/vendors/flag-icon-css/css/flag-icon.min.css">
    <!-- endinject -->
    <!-- Layout styles -->
    <link rel="stylesheet" href="{{ url('/') }}/admin-assets/css/demo_1/style.css">
    <!-- End layout styles -->
    <link rel="shortcut icon" href="{{ url('/') }}/admin-assets/images/favicon.png" />

    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/dt-1.11.2/b-2.0.0/datatables.min.css"/>

    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    {{-- timepicker --}}
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
</head>

<body>
    <div class="main-wrapper">

        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar">
            <div class="sidebar-header">
                <a href="#" class="sidebar-brand">
                    Studio<span>Jalanan</span>
                </a>
                <div class="sidebar-toggler not-active">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            @include('layouts.sidebar')
        </nav>
        <!-- partial -->

        <div class="page-wrapper">

            <!-- partial:partials/_navbar.html -->
            <nav class="navbar">
                <a href="#" class="sidebar-toggler">
                    <i data-feather="menu"></i>
                </a>
                <div class="navbar-content">
                    <form class="search-form">
                        {{-- <div class="input-group">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i data-feather="search"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
                        </div> --}}
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">{{ ucwords(Request::segment(1)) }}</a></li>
                                <li class="breadcrumb-item @if(Request::segment(3) == '')active @endif"><a>{{ ucwords(Request::segment(2)) }}</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ ucwords(Request::segment(3)) }}</li>
                            </ol>
                        </nav>
                    </form>
                    <ul class="navbar-nav">
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span
                                    class="font-weight-medium ml-1 mr-1">English</span>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="languageDropdown">
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us"
                                        title="us" id="us"></i> <span class="ml-1"> English </span></a>
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr"
                                        title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de"
                                        title="de" id="de"></i> <span class="ml-1"> German </span></a>
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt"
                                        title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a>
                                <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es"
                                        title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
                            </div>
                        </li> --}}
                        {{-- <li class="nav-item dropdown nav-apps">
                            <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="grid"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="appsDropdown">
                                <div class="dropdown-header d-flex align-items-center justify-content-between">
                                    <p class="mb-0 font-weight-medium">Web Apps</p>
                                    <a href="javascript:;" class="text-muted">Edit</a>
                                </div>
                                <div class="dropdown-body">
                                    <div class="d-flex align-items-center apps">
                                        <a href="pages/apps/chat.html"><i data-feather="message-square"
                                                class="icon-lg"></i>
                                            <p>Chat</p>
                                        </a>
                                        <a href="pages/apps/calendar.html"><i data-feather="calendar"
                                                class="icon-lg"></i>
                                            <p>Calendar</p>
                                        </a>
                                        <a href="pages/email/inbox.html"><i data-feather="mail" class="icon-lg"></i>
                                            <p>Email</p>
                                        </a>
                                        <a href="pages/general/profile.html"><i data-feather="instagram"
                                                class="icon-lg"></i>
                                            <p>Profile</p>
                                        </a>
                                    </div>
                                </div>
                                <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                    <a href="javascript:;">View all</a>
                                </div>
                            </div>
                        </li> --}}
                        {{-- <li class="nav-item dropdown nav-messages">
                            <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="mail"></i>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="messageDropdown">
                                <div class="dropdown-header d-flex align-items-center justify-content-between">
                                    <p class="mb-0 font-weight-medium">9 New Messages</p>
                                    <a href="javascript:;" class="text-muted">Clear all</a>
                                </div>
                                <div class="dropdown-body">
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="figure">
                                            <img src="https://via.placeholder.com/30x30" alt="userr">
                                        </div>
                                        <div class="content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p>Leonardo Payne</p>
                                                <p class="sub-text text-muted">2 min ago</p>
                                            </div>
                                            <p class="sub-text text-muted">Project status</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="figure">
                                            <img src="https://via.placeholder.com/30x30" alt="userr">
                                        </div>
                                        <div class="content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p>Carl Henson</p>
                                                <p class="sub-text text-muted">30 min ago</p>
                                            </div>
                                            <p class="sub-text text-muted">Client meeting</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="figure">
                                            <img src="https://via.placeholder.com/30x30" alt="userr">
                                        </div>
                                        <div class="content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p>Jensen Combs</p>
                                                <p class="sub-text text-muted">1 hrs ago</p>
                                            </div>
                                            <p class="sub-text text-muted">Project updates</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="figure">
                                            <img src="https://via.placeholder.com/30x30" alt="userr">
                                        </div>
                                        <div class="content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p>Amiah Burton</p>
                                                <p class="sub-text text-muted">2 hrs ago</p>
                                            </div>
                                            <p class="sub-text text-muted">Project deadline</p>
                                        </div>
                                    </a>
                                    <a href="javascript:;" class="dropdown-item">
                                        <div class="figure">
                                            <img src="https://via.placeholder.com/30x30" alt="userr">
                                        </div>
                                        <div class="content">
                                            <div class="d-flex justify-content-between align-items-center">
                                                <p>Yaretzi Mayo</p>
                                                <p class="sub-text text-muted">5 hr ago</p>
                                            </div>
                                            <p class="sub-text text-muted">New record</p>
                                        </div>
                                    </a>
                                </div>
                                <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                    <a href="javascript:;">View all</a>
                                </div>
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown nav-notifications">
                            <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i data-feather="bell"></i>
                                @if (getnumbnotif()!="0")
                                <div class="indicator">
                                    <div class="circle"></div>
                                </div>
                                @endif
                            </a>
                            <div class="dropdown-menu" aria-labelledby="notificationDropdown">
                                <div class="dropdown-header d-flex align-items-center justify-content-between">
                                    <p class="mb-0 font-weight-medium">Terdapat {{getnumbnotif()}} Notifikasi Baru</p>
                                    {{-- <a href="javascript:;" class="text-muted">Clear all</a> --}}
                                </div>
                                <div class="dropdown-body">
                                    @php
                                        $not = json_decode(getnotif());
                                        $link = "https://wa.link/6n9383";
                                    @endphp
                                    @foreach ($not as $n)
                                    @php
                                        $numb = "62".substr(nocust($n->cust_id), 1);
                                        $link = "https://wa.me/".$numb."?text=Hay%20kak%20". namacust($n->cust_id)."%2C%20mau%20menginformasikan%2C%20sewa%20kamera%20kakak%20berakhir%20pada%20".tglindo($n->deadline) ." Jam ". date("H:i:s", strtotime($n->deadline))."%2C%20mohon%20dikembalikan%20sebelum%20jam%20tersebut%20atau%20sebelum%20toko%20tutup%20ya%2C%20terima%20kasih%0ASalam%20kami%0AStudio%20Jalanan";
                                    @endphp
                                    <a href="{{$link}}" target="_blank" class="dropdown-item">
                                        <div class="icon">
                                            <i data-feather="alert-circle"></i>
                                        </div>
                                        <div class="content">
                                            <p>{{ namacust($n->cust_id)}} harus mengembalikan hari ini</p>
                                            <p class="sub-text text-muted">{{ tglindo($n->deadline) }} Jam {{ date("H:i:s", strtotime($n->deadline))}}</p>
                                        </div>
                                    </a>
                                    @endforeach
                                    
                                </div>
                                {{-- <div class="dropdown-footer d-flex align-items-center justify-content-center">
                                    <a href="javascript:;">View all</a>
                                </div> --}}
                            </div>
                        </li>
                        <li class="nav-item dropdown nav-profile">
                            <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="https://via.placeholder.com/30x30" alt="profile">
                            </a>
                            <div class="dropdown-menu" aria-labelledby="profileDropdown">
                                <div class="dropdown-header d-flex flex-column align-items-center">
                                    <div class="figure mb-3">
                                        <img src="https://via.placeholder.com/80x80" alt="">
                                    </div>
                                    <div class="info text-center">
                                        <p class="name font-weight-bold mb-0">  </p>
                                        <p class="email text-muted mb-3">{{ Auth::user()->email }}</p>
                                    </div>
                                </div>
                                <div class="dropdown-body">
                                    <ul class="profile-nav p-0 pt-3">
                                        {{-- <li class="nav-item">
                                            <a href="pages/general/profile.html" class="nav-link">
                                                <i data-feather="user"></i>
                                                <span>Profile</span>
                                            </a>
                                        </li> --}}
                                        <li class="nav-item">
                                            <a href="{{route('user.edit', Auth::user()->id)}}" class="nav-link">
                                                <i data-feather="edit"></i>
                                                <span>Edit Profile</span>
                                            </a>
                                        </li>
                                        <li class="nav-item">
                                            <a  class="nav-link" href="{{ route('logout') }}"
                                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                                <i data-feather="log-out"></i>
                                                <span>Log Out</span>
                                            </a>


                                            <form id="logout-form" action="{{ route('logout') }}"
                                                method="POST" class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- partial -->

            <div class="page-content">
                @yield('content')
            </div>

            <!-- partial:partials/_footer.html -->
            <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
                {{-- <p class="text-warning text-center"> Full paid to remove this karna saya trauma dighosting</p> --}}
                <p class="text-muted text-center text-md-left">Copyright © {{date('Y')}} <a href="https://www.nobleui.com"
                        target="_blank">Aros</a>. All rights reserved</p>
                <p class="text-muted text-center text-md-left mb-0 d-none d-md-block">Handcrafted With <i
                        class="mb-1 text-primary ml-1 icon-small" data-feather="heart"></i></p>
            </footer>
            <!-- partial -->

        </div>
    </div>
    <!-- core:js -->
    <script src="{{ url('/') }}/admin-assets/vendors/core/core.js"></script>
    <!-- endinject -->
    <!-- plugin js for this page -->
    <script src="{{ url('/') }}/admin-assets/vendors/chartjs/Chart.min.js"></script>
    <script src="{{ url('/') }}/admin-assets/vendors/jquery.flot/jquery.flot.js"></script>
    <script src="{{ url('/') }}/admin-assets/vendors/jquery.flot/jquery.flot.resize.js"></script>
    <script
        src="{{ url('/') }}/admin-assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js">
    </script>
    <script src="{{ url('/') }}/admin-assets/vendors/apexcharts/apexcharts.min.js"></script>
    <script src="{{ url('/') }}/admin-assets/vendors/progressbar.js/progressbar.min.js"></script>
    <!-- end plugin js for this page -->
    <!-- inject:js -->
    <script src="{{ url('/') }}/admin-assets/vendors/feather-icons/feather.min.js"></script>
    <script src="{{ url('/') }}/admin-assets/js/template.js"></script>
    <!-- endinject -->
    <!-- custom js for this page -->
    <script src="{{ url('/') }}/admin-assets/js/dashboard.js"></script>
    <script src="{{ url('/') }}/admin-assets/js/datepicker.js"></script>
    <!-- end custom js for this page -->

    <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/dt-1.11.2/b-2.0.0/datatables.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        
    {{-- select2 --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2-bootstrap-theme/0.1.0-beta.10/select2-bootstrap.min.css" integrity="sha512-kq3FES+RuuGoBW3a9R2ELYKRywUEQv0wvPTItv3DSGqjpbNtGWVdvT8qwdKkqvPzT93jp8tSF4+oN4IeTEIlQA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- timepicker --}}
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    

    <script>
        $(document).ready(function () {
            // datatable
            $('#myTable').DataTable();
            // currency
            $('#currency').mask('00.000.000', {
                reverse: true
            });
            $('#denda1').mask('00.000.000', {
                reverse: true
            });
            $('#denda2').mask('00.000.000', {
                reverse: true
            });
            $('#dendat').mask('00.000.000', {
                reverse: true
            });
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

            $('.timepicker').timepicker({
                timeFormat: 'HH:mm',
                interval: 60,
                minTime: '00',
                maxTime: '23:00',
                defaultTime: '24',
                startTime: '00:00',
                dynamic: false,
                dropdown: true,
                scrollbar: true
            });

            // custom stuff
            var val = ""
            $("#select22").on("change", function () {
                // hitung harga
                val = $(this).find('option:selected').data("harga");
            });
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
