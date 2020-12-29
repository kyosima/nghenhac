<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="{{asset('public/admin/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{asset('public/admin/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>
<style>
    .goicuoc{
        width: 100%;
    height: calc(1.5em + .75rem + 11px);
    padding: .375rem .75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #6e707e;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #d1d3e2;
    border-radius: 1.35rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    }
</style>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <form id="form-register" action="" method="POST" enctype="multipart/form-data" oninput='repassword.setCustomValidity(password.value != repassword.value ? "Mật khẩu không khớp!" : "")'>
                                {{ csrf_field() }}
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Tạo tài khoản mới!</h1>
                                </div>
                                @if(Session::has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{Session::get('success')}}
                                    </div>
                                @elseif(Session::has('error'))
                                    <div class="alert alert-danger" role="alert">
                                        {{Session::get('error')}}
                                    </div>
                                @endif
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="username"
                                        placeholder="Tài khoản" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user" name="fullname"
                                        placeholder="Họ và tên" required>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user" name="email"
                                        placeholder="Email" required>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                            name="password" placeholder="Mật khẩu" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="password" class="form-control form-control-user"
                                            name="repassword" placeholder="Nhập lại mật khẩu" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="" for="">Chọn gói sản phẩm</label>
                                    <select class="goicuoc custom-select" name="role">
                                        <option value="1" selected>Gói 1 : 200k</option>
                                        <option value="2">Gói 2 : 400k</option>
                                        <option value="3">Gói 3 : 600k</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="goicuoc custom-file-input" name="bill" id="customFile" required>
                                        <label class="custom-file-label" for="customFile" >Hình ảnh xác nhận hóa đơn</label>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Đăng ký mới
                                </button>
                            </form>
                            <hr>

                            <div class="text-center">
                                <a class="small" href="{{URL::to('login')}}">Bạn đã có tài khoản? Đăng nhập!</a>
                            </div>
                        </div>
                    </div>
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

</body>

</html>
