<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Cultural Playground Management</title>

    <!-- Scripts -->


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <!-- datatables -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css" />
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js" defer></script>
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js"></script> -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Kanit&display=swap" rel="stylesheet">
    
    
    <!-- <script type="text/javascript">
        $(document).ready(function() {
            $('#example').DataTable({

            });
        });
    </script> -->
   
</head>

<body>
    <div class="container-scroller">
        @auth
        <!-- start navbar -->
        <nav class="navbar default-layout-navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
                <a class="navbar-brand brand-logo" href="{{ URL('dashboard') }}">
                    <img src="{{ URL::asset('assets/images/logo.png')}}" alt="logo" />
                </a>
                <a class="navbar-brand brand-logo-mini" href="{{ URL('dashboard') }}">
                    <img src="{{ URL::asset('assets/images/logo-mini.svg')}}" alt="logo" />
                </a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-stretch">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="mdi mdi-menu"></span>
                </button>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" id="profileDropdown" href="#" data-toggle="dropdown" aria-expanded="false">
                            <div class="nav-profile-img">
                                <img src="{{ $data['thumbnail'] }}" alt="image" />
                                <span class="availability-status online"></span>
                            </div>
                            <div class="nav-profile-text">
                                <p class="mb-1 text-black">{{ $data['museum_name'] }}</p>
                            </div>
                        </a>
                        <div class="dropdown-menu navbar-dropdown" aria-labelledby="profileDropdown">
                         
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                <i class="mdi mdi-logout mr-2 text-primary"></i> ออกจากระบบ
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                    <span class="mdi mdi-menu"></span>
                </button>
            </div>
        </nav>
        <!-- end navbar -->
        <div class="container-fluid page-body-wrapper">
            <!-- start menubar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item nav-profile">
                        <a href="#" class="nav-link">
                            <div class="nav-profile-image text-center" style="width: 100%; height: auto;">
                                <img src="{{ $data['thumbnail'] }}" alt="profile" style="width: 150px; height: 150px;" />
                                <span class="login-status online"></span>
                                <br />
                                <div class=" d-flex flex-column">
                                    <span class="font-weight-bold mt-3">
                                        <h5>{{ $data['museum_name'] }}</h5>
                                    </span>
                                    <span class="text-secondary text-small">{{ $data['email'] }}</span>
                                </div>
                            </div>

                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/dashboard')}}">
                            <span class="menu-title">หน้าหลัก</span>
                            <i class="mdi mdi-home menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
                            <span class="menu-title">บริหารจัดการข้อมูล</span>
                            <i class="menu-arrow"></i>
                            <i class="mdi mdi-crosshairs-gps menu-icon"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item "> <a class="nav-link" href="{{url('create_dataset')}}">เพิ่มชุดข้อมุล</a></li>
                                <li class="nav-item"> <a class="nav-link " href="{{url('delete_dataset')}}">ลบชุดข้อมูล</a></li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" href="{{url('/create_game')}}">
                            <span class="menu-title">สร้างเกม</span>
                            <i class="mdi mdi-google-controller menu-icon"></i>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- end menubar -->
            <div class="main-panel">
                <!-- start content -->
                @yield('content')
                <!-- end content -->
                <!-- start footer -->
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Navanurak © 2020 <a href="https://www.navanurak.in.th/" target="_blank">www.navanurak.in.th</a></span>
                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
                    </div>
                </footer>
                <!-- end footer -->

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">ข้อมูล</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <table id="dataset" class="table table-striped table-bordered " style="width:100%">
                                    <thead >
                                        <tr>
                                            <th> ลำดับ </th>
                                            <th> รูปภาพ </th>
                                            <th> ชื่อ </th>
                                        </tr>
                                      
                                    </thead>
                                   
                                </table>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @endauth
        @yield('login')
        @yield('register')
    </div>


    <script src="{{ asset('js/main.js') }}"></script>
    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('assets/vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('assets/js/misc.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>
    <!-- <script src="{{ asset('js/app.js') }}"></script>     -->
</body>

</html>