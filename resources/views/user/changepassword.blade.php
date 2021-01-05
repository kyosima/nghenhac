@extends('user.layout')
@section('container')
    <div class="container-fluid">
        <div class="col-md-12 personal-info">
           
            <h3 class="text-primary text-center">Cập nhật mật khẩu</h3>
   
            <form class="form-horizontal" name="changebank" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 offset-md-3 col-sm-12 text-center">
                        <form action="{{URL::to('change-password')}}" method="POST" oninput='repassword.setCustomValidity(repassword.value != password.value ? "Xác nhận mật khẩu không đúng" : "")'>
                            {{ csrf_field() }}
    
                                <div class="form-group">
                                    <label>Nhập mật khẩu cũ</label>
                                    <input type="password" class="form-control" name="oldpassword"/>
                                </div>
                                <div class="form-group">
                                    <label>Nhập mật khẩu mới</label>
                                    <input type="password" class="form-control" name="password"/>
                                </div>
                                <div class="form-group">
                                    <label>Nhập lại mật khẩu mới</label>
                                    <input type="password" class="form-control" name="repassword"/>
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
                                </div>
                          </form>
                      
                    </div>

                </div>
            </form>
        </div>
    </div>
@endsection
