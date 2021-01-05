@extends('admin.layout')


@section('container')
    <div class="container-fluid">
        <div class="col-md-12 personal-info">
            <h3>Thêm người dùng</h3>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
            @endif
            <form class="form-horizontal" name="changeProfile" method="post" oninput='repassword.setCustomValidity(repassword.value != password.value ? "Xác nhận mật khẩu không đúng" : "")'>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Tên đăng nhập:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="text" value="" name="username" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Số dư:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="number" value="" name="wallet" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Trạng thái:</label>
                            <div class="col-md-12">
                                <select name="status" class="form-control">
                                        <option value="0">Chưa kích hoạt</option>
                                        <option value="1">Đã kích hoạt</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Nhập mật khẩu:</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="" name="password" required/>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="col-lg-12 control-label">*Họ và tên:</label>
                            <div class="col-lg-12">
                            <input class="form-control" type="text" name="fullname" value="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 control-label">*Email:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="email" value="" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Cấp:</label>
                            <div class="col-md-12">
                                <select name="role" class="form-control">
                                    <option value="1">200k</option>
                                    <option value="2">400k</option>
                                    <option value="3">600k</option>
                                    <option value="0">Admin</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Nhập lại mật khẩu:</label>
                            <div class="col-md-12">
                                <input class="form-control" type="text" value="" name="repassword" required/>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-left">
                        <button class="btn btn-primary" type="submit">Thêm thành viên</button>
                    </div>
                </div>



            </form>

        </div>
    </div>
@endsection
