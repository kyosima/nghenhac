@extends('admin.layout')


@section('container')
    <div class="container-fluid">
        <div class="col-md-12 personal-info">
           
            <h3>Thông tin</h3>
            @if(Session::has('success'))
            <div class="alert alert-success" role="alert">
                {{Session::get('success')}}
            </div>
        @elseif(Session::has('error'))
            <div class="alert alert-danger" role="alert">
                {{Session::get('error')}}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 text-left">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#changepass">
                    Đổi mật khẩu
                  </button>
            </div>
        </div>
            <form class="form-horizontal" name="changeProfile" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <div class="col-md-12">
                        <input class="form-control" type="hidden" value="{{$user->id}}" name="id" readonly>
                    </div>
                </div>
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
                            <input class="form-control" type="number" value="{{$user->wallet}}" name="wallet" >
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">*Trạng thái:</label>
                            <div class="col-md-12">
                                <select name="status" class="form-control">
                                    @if($user->status == 0 )
                                        <option value="0">Chưa kích hoạt</option>
                                        <option value="1">Đã kích hoạt</option>
                                        <option value="2">Đã khoá</option>
                                    @elseif($user->status==1)
                                        <option value="1">Đã kích hoạt</option>
                                        <option value="0">Chưa kích hoạt</option>
                                        <option value="2">Đã khoá</option>
                                    @else
                                        <option value="2">Đã khoá</option>
                                        <option value="0">Chưa kích hoạt</option>
                                        <option value="1">Đã kích hoạt</option>
                                    @endif
                                </select>
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
                                <select name="role" class="form-control">
                                    @if($user->role == 1 )
                                        <option value="1">200k</option>
                                        <option value="2">400k</option>
                                        <option value="3">600k</option>
                                        <option value="0">Admin</option>
                                    @elseif($user->role == 2 )
                                        <option value="2">400k</option>
                                        <option value="1">200k</option>
                                        <option value="3">600k</option>
                                        <option value="0">Admin</option>
                                    @elseif($user->role == 3 )
                                        <option value="3">600k</option>
                                        <option value="1">200k</option>
                                        <option value="2">400k</option>
                                        <option value="0">Admin</option>
                                    @elseif($user->role == 0 )
                                        <option value="0">Admin</option>
                                        <option value="1">200k</option>
                                        <option value="2">400k</option>
                                        <option value="3">600k</option>
                                    @endif
                                </select>
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
            

              
              <!-- Modal -->
              <div class="modal fade" id="changepass" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle">Đổi mật khẩu</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form action="{{URL::to('/admin/viewuser/changepass/')}}" method="POST">
                        {{ csrf_field() }}

                            <input type="hidden" name="id" value="{{$user->id}}"/>
                            <div class="form-group">
                                <label>Nhập mật khẩu mới</label>
                                <input type="text" class="form-control" name="newpassword"/>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-primary">Cập nhật mật khẩu</button>
                            </div>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                    </div>
                  </div>
                </div>
              </div>

        </div>
    </div>
@endsection
