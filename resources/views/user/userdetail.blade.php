@extends('user.layout')
@section('container')
    <div class="container-fluid">
        <div class="col-md-12 personal-info">
           
            <h3 class="text-center text-primary">Thông tin</h3>
   
            <form class="form-horizontal" name="changeProfile" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Tên đăng nhập:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="text" value="{{$user->username}}" name="username" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Số dư:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="number" value="{{$user->wallet}}" name="wallet" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Trạng thái:</label>
                            <div class="col-md-12">
                                @if($user->status==1)
                                    <button class="btn btn-success">Đã kích hoạt</button>
                                @else
                                    <button class="btn btn-danger">Chưa kích hoạt</button>
                                @endif                
                            </div>
                        </div>


                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="form-group">
                            <label class="col-lg-12 control-label">*Họ và tên:</label>
                            <div class="col-lg-12">
                            <input class="form-control" type="text" name="fullname" value="{{$user->fullname}}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-12 control-label">*Email:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="email" value="{{$user->email}}" name="email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Cấp:</label>
                            <div class="col-md-12">
                                    @if($user->role == 1 )
                                        <button class="btn btn-info" >200k</option>

                                    @elseif($user->role == 2 )
                                        <button class="btn btn-info" >400k</option>
                                    @else
                                        <button class="btn btn-info" >600k</option>
                                    @endif
                            </div>
                        </div>

                    </div>



                </div>
                <div class="row">
                    <div class="col-md-12 text-left">
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                    </div>
                </div>



            </form>
        </div>
    </div>
@endsection
