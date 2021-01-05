<!DOCTYPE html>
<html lang="en">

<head>
<?php
    $user = Auth::guard('user')->user();    
?>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Nghe nhạc online</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('public/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('public/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



    <!-- Custom styles for this page -->
    <link href="{{asset('public/admin/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{URL::to('/')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Nghe nhạc online</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{URL::to('/dashboard')}}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Trang quản lý</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Thanh điều khiển
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#manageraccount"
                aria-expanded="true" aria-controls="manageraccount">
                    <i class="fas fa-user"></i>
                    <span>Tài khoản</span>
                </a>
                <div id="manageraccount" class="collapse" aria-labelledby="headingUtilities"
                data-parent="#manageraccount">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{URL::to('/account')}}">Thông tin tài khoản</a>
                    <a class="collapse-item" href="{{URL::to('/bank')}}">Tài khoản ngân hàng</a>
                    <a class="collapse-item" href="{{URL::to('/change-password')}}">Đổi mật khẩu</a>
                </div>
            </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{URL::to('/list-video')}}" 
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fa fa-youtube-play"></i>
                    <span>Xem video</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{URL::to('/upgrate')}}" 
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-tools"></i>
                    <span>Nâng cấp</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-landmark"></i>
                    <span>Quản lý Nạp/Rút tiền</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{URL::to('/withdrawn')}}">Đặt lệnh rút</a>
                        <a class="collapse-item" href="{{URL::to('/withdrawn-history')}}">Lịch sử rút</a>
                        <a class="collapse-item" href="{{URL::to('/deposit-history')}}">Lịch sử nạp</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->


            <!-- Nav Item - Pages Collapse Menu -->


            <!-- Nav Item - Charts -->


            <!-- Nav Item - Tables -->


            <!-- Divider -->


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        @if(Auth::guard('admin')->check())
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle text-danger" href="{{URL::to('/admin/dashboard')}}" id="userDropdown" role="button">
                                Quản trị Admin
                            </a>
                        </li>
                        @endif
                        <!-- Nav Item - Alerts -->
                        


                        <div class="topbar-divider d-none d-sm-block" style="    width: 100%;
                        border-right: 1px solid #e3e6f0;
                        height: auto;
                        margin: auto 1rem;
                        padding-right: 25px;">
                            <i class="fa fa-money fa-fw"></i>
                                    <strong>Số dư :</strong> <span style="color: red;">{{$user->wallet}}<sup>vnđ</sup></span>
                        </div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{$user->username}}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{asset('public/admin/img/undraw_profile.svg')}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{URL::to('/account')}}">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                   Thông tin tài khoản
                                </a>

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Đăng xuất
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->

                @if(Session::has('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{Session::get('success')}}
                </div>
                @elseif(Session::has('error'))
                    <div class="alert alert-danger text-center" role="alert">
                        {{Session::get('error')}}
                    </div>
                @endif
                  @yield('container')


                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Mevivu 2020</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn đăng xuất?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                    <a class="btn btn-primary" href="{{URL::to('logout')}}">Đăng xuất</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('public/admin/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('public/admin/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{asset('public/admin/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('public/admin/js/sb-admin-2.min.js')}}"></script>

    <!-- Page level plugins -->
    <script src="{{asset('public/admin/vendor/chart.js/Chart.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('public/admin/js/demo/chart-area-demo.js')}}"></script>
    <script src="{{asset('public/admin/js/demo/chart-pie-demo.js')}}"></script>
     <!-- Page level plugins -->
     <script src="{{asset('public/admin/vendor/datatables/jquery.dataTables.min.js')}}"></script>
     <script src="{{asset('public/admin/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

     <!-- Page level custom scripts -->
     <script src="{{asset('public/admin/js/demo/datatables-demo.js')}}"></script>

</body>

</html>
