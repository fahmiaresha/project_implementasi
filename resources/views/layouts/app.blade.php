<!doctype html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ url('assets/media/image/favicon.png') }}"/>

    <!-- Main css -->
    <link rel="stylesheet" href="{{ url('vendors/bundle.css') }}" type="text/css">

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

@yield('head')

<!-- App css -->
    <link rel="stylesheet" href="{{ url('assets/css/app.min.css') }}" type="text/css">
    
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body  class="dark scrollable-layout"   onclick="gerak()"  >
<!-- Preloader -->
<div class="preloader">
    <div class="preloader-icon"></div>
    <span>Loading...</span>
</div>
<!-- ./ Preloader -->

<!-- HEADER group -->
<div class="sidebar-group">


    

</div>
<!-- ./ header group -->

<!-- Layout wrapper -->
<div class="layout-wrapper">

    <!-- Header -->
    <div class="header d-print-none">
        <div class="header-container">
            <div class="header-left">
                <div class="navigation-toggler">
                    <a href="#" data-action="navigation-toggler">
                        <i data-feather="menu"></i>
                    </a>
                </div>

                <div class="header-logo">
                    <a href="{{ url('/') }}">
                        <img class="logo" src="{{ url('assets/media/image/logo.png') }}" alt="logo">
                    </a>
                </div>
            </div>

            <div class="header-body">
                <div class="header-body-left">
                    <ul class="navbar-nav">
                        <li class="nav-item mr-3">
                            <div class="header-search-form">
                                <form>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <button class="btn">
                                                <i data-feather="search"></i>
                                            </button>
                                        </div>
                                        <input type="text" class="form-control" placeholder="Search">
                                        <div class="input-group-append">
                                            <button class="btn header-search-close-btn">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                    
                    </ul>
                </div>

                <div class="header-body-right">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a href="#" class="nav-link mobile-header-search-btn" title="Search">
                                <i data-feather="search"></i>
                            </a>
                        </li>

                        <li class="nav-item dropdown d-none d-md-block">
                            <a href="#" class="nav-link" title="Fullscreen" data-toggle="fullscreen">
                                <i class="maximize" data-feather="maximize"></i>
                                <i class="minimize" data-feather="minimize"></i>
                            </a>
                        </li>

                

                        <li class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" title="User menu" data-toggle="dropdown">
                                <figure class="avatar avatar-sm">
                                    <img src="{{Session::get('foto')}}"
                                         class="rounded-circle"
                                         alt="avatar">
                                </figure>
                                <span class="ml-2 d-sm-inline d-none">{{Session::get('nama')}}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-big">
                                <div class="text-center py-4">
                                    <figure class="avatar avatar-lg mb-3 border-0">
                                        <img src="{{Session::get('foto')}}"
                                             class="rounded-circle" alt="image">
                                    </figure>
                                    <h5 class="text-center">{{Session::get('nama')}}</h5>
                                    <h7 class="text-center">{{Session::get('id')}}</h5>
                                    <div class="div">
                                    <h7 class="text-center">{{Session::get('email')}}</h5>
                                    </div>
                                    
                                </div>
                                <div class="list-group">
                                    <a href="/logout" class="list-group-item" >Sign Out!</a>
                                </div>
                                <div class="p-4">
                                  
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <ul class="navbar-nav ml-auto">
                <li class="nav-item header-toggler">
                    <a href="#" class="nav-link">
                        <i data-feather="arrow-down"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <!-- ./ Header -->

     <!-- SIDEBARR -->
    <!-- Content wrapper -->
    <div class="content-wrapper">
        <!-- begin::navigation -->
        <div class="navigation">
            <div class="navigation-header">
                <span>Navigation</span>
                <a href="#">
                    <i class="ti-close"></i>
                </a>
            </div>
            <div class="navigation-menu-body">
                <ul>
                   
      

                    <li>
                        <a href="#">
                        <span class="nav-link-icon" >
                    <i class="fa fa-users"></i>
                    </span>
                            <span>Customer</span>
                        </a>
                        <ul>
                             <li>
                            <a @if(request()->segment(1) == 'data-customer') class="active" @endif href="{{ route('data-customer') }}">Data Customer</a>
                            </li>

                            <li>
                            <a @if(request()->segment(1) == 'tambah-customer1') class="active" @endif href="{{ route('tambah-customer1') }}">Tambah Customer 1</a>
                            </li>

                            <li>
                            <a @if(request()->segment(1) == 'tambah-customer2') class="active" @endif href="{{ route('tambah-customer2') }}">Tambah Customer 2</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a @if(request()->segment(1) =='cetak-label-TnJ') class="active" @endif href="{{ route('cetak-label-TnJ') }}">
                    <span class="nav-link-icon">
                    <!-- <i class="fa fa-print"></i> -->
                    <i class="ti-printer"></i>
                    </span>
                            <span>Cetak Label TnJ 108</span>
                        </a>
                    </li>

                    <li>
                        <a @if(request()->segment(1) =='barcode-scanner') class="active" @endif href="{{ route('barcode-scanner') }}">
                    <span class="nav-link-icon">
                    <!-- <i class="fa fa-print"></i> -->
                    <i class="fa fa-barcode"></i>
                    </span>
                            <span>Barcode Scanner</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                        <span class="nav-link-icon" >
                        <i class="fas fa-map-marked-alt"></i>
                        <!-- <i data-feather="map-pin" style="margin-left:-3px"></i> -->
                    </span>
                            <span style="margin-left:-4px;">Kunjungan Toko</span>
                        </a>
                        <ul>
                             <li>
                            <a @if(request()->segment(1) == 'list-toko') class="active" @endif href="{{ route('list-toko') }}">List Toko</a>
                            </li>

                            <li>
                            <a @if(request()->segment(1) == 'input-geolocation') class="active" @endif href="{{ route('input-geolocation') }}">Input Titik Awal</a>
                            </li>

                            <li>
                            <a @if(request()->segment(1) == 'titik-kunjungan') class="active" @endif href="{{ route('titik-kunjungan') }}">Titik Kunjungan</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#">
                        <span class="nav-link-icon" >
                        <i class="far fa-clipboard"></i>
                    </span>
                            <span>Scoreboard</span>
                        </a>
                        <ul>
                             <li>
                            <a @if(request()->segment(1) == 'control-papan') class="active" @endif href="{{ route('control-papan') }}">Control Papan</a>
                            </li>
                            <!-- hitungmundur -->
                            
                            <li>
                            <a @if(request()->segment(1) == 'tampilan-papan') class="active" @endif href="{{ route('tampilan-papan') }}">Tampilan</a>
                            </li>

                        </ul>
                    </li>

                    <li>
                        <a @if(request()->segment(1) =='user-manual') class="active" @endif href="{{ route('user-manual') }}" >
                    <span class="nav-link-icon">
                    <i class="fa fa-download"></i>
                    </span>
                            <span>User Manual</span>
                        </a>
                    </li>


                  
                </ul>
            </div>
        </div>
        <!-- end::navigation -->
        <!-- end::SIDEBAR -->

        
        <!-- Content body -->
        <div class="content-body">

            <!-- KONTEN -->
            <div class="content @yield('parentClassName')" >
                @yield('content')
            </div>
            <!-- .KONTEN -->

            <!-- Footer -->
            <footer class="content-footer">
                <div>© {{ date('Y') }} - M.Fahmi Aresha</div>
                <!-- <div>
                    <nav class="nav">
                        <a href="https://themeforest.net/licenses/standard" class="nav-link">Licenses</a>
                        <a href="#" class="nav-link">Change Log</a>
                        <a href="#" class="nav-link">Get Help</a>
                    </nav> -->
                </div>
            </footer>
            <!-- ./ Footer -->

            <!-- Notifikasi-logout -->
            <footer>
            <div class="modal fade" id="logout_popup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body">
                            <div style="width:100%;height:100%;margin: 0px; padding:0px">
                                <div style="width:25%;margin: 0px; padding:0px;float:left;">
                                    <i class="fa fa-warning" style="font-size: 140px;color:#da4f49"></i>
                                </div>
                                <div style="width:70%;margin: 0px; padding:0px;float:right;padding-top: 10px;padding-left: 3%;">
                                    <h4>Your session is about to expire!</h4>
                                    <p style="font-size: 15px;">You will be logged out in <span id="timer" style="display: inline;font-size: 30px;font-style: bold">10</span> seconds.</p>              
                                    <p style="font-size: 15px;">Do you want to stay signed in?</p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div style="margin-left: 30%;margin-bottom: 20px;margin-top: 20px;">
                            <a href="javascript:;" onclick="resetTimer()" class="btn btn-primary" aria-hidden="true">Yes, Keep me signed in</a>
                            <a href="javascript:;" onclick="chooseOut()" class="btn btn-danger" id="alertbox" aria-hidden="true">No, Sign me out</a>
                        </div>
                    </div>
                </div>
            </div>
            </footer>
             <!-- Notifikasi-logout -->

        </div>
        <!-- ./ Content body -->
    </div>
    <!-- ./ Content wrapper -->
</div>
<!-- ./ Layout wrapper -->

<!-- Main scripts -->
<script src="{{ url('vendors/bundle.js') }}"></script>

@yield('script')

<!-- App scripts -->
<script src="{{ url('assets/js/app.min.js') }}"></script>

<script>

        var c = 0; max_count = 10; logout = true;
        startTimer();

        function startTimer(){
            setTimeout(function(){
                logout = true;
                c = 0; 
                max_count = 10;
                $('#timer').html(max_count);
                $('#logout_popup').modal('show');
                startCount();
            }, 30*60*1000); //, 30 menit=30*60*1000, 
        }

        function resetTimer(){
            logout = false;
            $('#logout_popup').modal('hide');
            startTimer();
        }

        function chooseOut(){
            logout = false;
            $('#logout_popup').modal('hide');
            console.log('Your time is expired');
            //pindah halaman-login
            window.location = "/logout";
        }

        function timedCount() {
            c = c + 1;
            if(c<=10){
            // console.log('nilai c');
            // console.log(c);
            // console.log('nilai remaining time');
            remaining_time = max_count - c;
            // console.log(remaining_time);
                if( remaining_time == 0 && logout ){
                    $('#logout_popup').modal('hide');
                    //location.href = $('#logout_url').val();
                    chooseOut();
                }
                else{
                    $('#timer').html(remaining_time);
                    t = setTimeout(function(){timedCount()}, 1000);
                    }
            }
            else{
                $('#logout_popup').modal('hide');
                resetTimer(); 
            }
    }

        function startCount() {
           timedCount();
        }
        
        function gerak(){
            $('#logout_popup').modal('hide');
            console.log('masuk function gerak');
            resetTimer(); 
        }

       
    </script>


</body>
</html>
