@extends('admin.layout')


@section('container')
    <div class="container-fluid">
        <div class="col-md-12 personal-info">
            @php
                $mes = Session::get('mes');
                if($mes){
                    echo "<div class='alert alert-info alert-dismissable'>
                <a class='panel-close close' data-dismiss='alert'>×</a>
                <i class='fa fa-coffee'></i>
                $mes
            </div>";
            Session::put('mes',null);
                }
            @endphp

            <h3>Thông tin</h3>

            <form class="form-horizontal" name="changeProfile" method="post" oninput='password2.setCustomValidity(password2.value != password.value ? "Xác nhận mật khẩu không đúng" : "")'>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Tên đăng nhập:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="text" value="kyosima" name="email" readonly>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 control-label">Mã giới thiệu:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="email" value="qwsadadas" name="email" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Đã giới thiệu:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="text" value="1000 người" name="phone" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <button type="submit" name="submit" class="btn btn-primary" value="SaveProfile">Cập nhật
                            </button>
                            <span></span>
                        <button type="reset" onclick="window.location.href='{{URL::to('/dashboard')}}'" class="btn btn-default"
                                value="Cancel">Hủy
                            </button>
                        </div>
                        </div>
                    <div class="col-md-6 col-sm-12">


                        <div class="form-group">
                            <label class="col-lg-12 control-label">*Họ và tên:</label>
                            <div class="col-lg-12">
                            <input class="form-control" type="text" name="fullname" value="Thế Vũ">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 control-label">*Số điện thoại:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="number" value="099999999" name="phone">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Email:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="email" value="abc@gmail.com" name="email">
                            </div>
                        </div>

                    </div>



                </div>



            </form>

        </div>
    </div>
@endsection
