<head>
    <meta charset="utf-8" />
    <title>Admin | Company Profile</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap Css -->
    <link href="{{asset('/css/bootstrap.min.css')}}" id="bootstrap-stylesheet" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('/css/app.min.css')}}" id="app-stylesheet" rel="stylesheet" type="text/css" />

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/js/all.min.js"></script>

    <!-- Material Design Icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/6.6.96/css/materialdesignicons.min.css">
    {{-- Jquery --}}
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    {{-- dropify --}}
    <link href="{{asset('/libs/dropify/dropify.min.css')}}" id="app-stylesheet" rel="stylesheet" type="text/css" />
    
</head>

<body>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
    

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img src="{{asset('/images/users/user-1.jpg')}}" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1">
                            {{Auth::user()->name}} <i class="mdi mdi-chevron-down"></i> 
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item -->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome !</h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="fe-user"></i>
                            <span>My Account</span>
                        </a>
                       
                        <div class="dropdown-divider"></div>

                        <!-- item-->
                        <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fe-log-out mr-1"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                    </div>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="index.html" class="logo logo-dark text-center">
                    <span class="logo-lg">
                        <img src="{{asset('/images/logo.png')}}" alt="" class="mt-3" height="50">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left mb-0">
                <li>
                    <button class="button-menu-mobile disable-btn waves-effect">
                        <i class="fe-menu"></i>
                    </button>
                </li>
    
            </ul>

        </div>
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">

            <div class="slimscroll-menu">

                <!-- User box -->
                <div class="user-box text-center">
                    <img src="{{asset('/images/users/user-1.jpg')}}" alt="user-img" class="rounded-circle img-thumbnail avatar-md">
                    <div class="dropdown">
                        <a href="#" class="user-name dropdown-toggle h5 mt-2 mb-1 d-block" data-toggle="dropdown"  aria-expanded="false">Alexander</a>
                        <div class="dropdown-menu user-pro-dropdown">

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-user mr-1"></i>
                                <span>My Account</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-settings mr-1"></i>
                                <span>Settings</span>
                            </a>

                            <!-- item-->
                            <a href="javascript:void(0);" class="dropdown-item notify-item">
                                <i class="fe-lock mr-1"></i>
                                <span>Lock Screen</span>
                            </a>

                            <!-- item-->
                            <a class="dropdown-item notify-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fe-log-out mr-1"></i>{{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                        </div>
                    </div>
                    <p class="text-muted">Admin ComPro</p>
                </div>

                <!--- Sidemenu -->
                <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">

                        <li class="menu-title">Navigation</li>

                        <li>
                            <a href="{{ route('dashboard') }}">
                                <i class="fa-solid fa-chart-line"></i>
                                <span> Dashboard </span>
                            </a>
                        </li>
                        
                        <li>
                           <a href="#">
                                <i class="mdi mdi-dots-horizontal-circle"></i>
                                <span> Landing Page </span>
                                <i class="fa-solid fa-caret-down"></i>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li>
                                    <a href="{{ route('visiMisi') }}">
                                        <i class="fas fa-crosshairs"></i>
                                        <span> Visi Misi </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('tentang') }}">
                                        <i class="fa-solid fa-address-card"></i>
                                        <span> Tentang Kami </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('faqs') }}">
                                        <i class="fas fa-question-circle"></i>
                                        <span> Faqs </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ route('kontak') }}">
                                        <i class="fas fa-phone-alt"></i>
                                        <span> Contact us </span>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ route('gallery') }}">
                                <i class="fas fa-images"></i>
                                <span> Gallery </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('mitra') }}">
                                <i class="fas fa-handshake"></i>
                                <span> Mitra </span>
                            </a>
                        </li>
                    </ul>

                </div>
                <!-- End Sidebar -->

                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>
        <!-- Left Sidebar End -->

    </div>
    <!-- Vendor js -->
    <script src="{{asset('/js/vendor.min.js')}}"></script>

    <!-- knob plugin -->
    <script src="{{asset('/libs/jquery-knob/jquery.knob.min.js')}}"></script>

    <!--Morris Chart-->
    <script src="{{asset('/libs/morris-js/morris.min.js')}}"></script>
    <script src="{{asset('/libs/raphael/raphael.min.js')}}"></script>

    <!-- Dashboard init js-->
    <script src="{{asset('/js/pages/dashboard.init.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('/js/app.min.js')}}"></script>

    <script src="{{ asset('/libs/dropify/dropify.min.js') }}"></script>

    <script src="{{ asset('/libs/ckeditor2/ckeditor/ckeditor.js') }}"></script>
</body>
</html>