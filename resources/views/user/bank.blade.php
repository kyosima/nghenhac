@extends('user.layout')
@section('container')
    <div class="container-fluid">
        <div class="col-md-12 personal-info">
           
            <h3 class="text-primary text-center">Thông tin tài khoản ngân hàng</h3>
   
            <form class="form-horizontal" name="changebank" method="post">
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-6 offset-md-3 col-sm-12 text-center">
                        
                        <div class="form-group">
                            <label class="col-md-12 control-label">Tên ngân hàng</label>
                            <div class="col-md-12">
                            <input class="form-control" type="text" value="{{$bank->bankname}}" name="bank_bankname" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Chủ tài khoản:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="text" value="{{$bank->username}}" name="bank_username" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Số tài khoản:</label>
                            <div class="col-md-12">
                            <input class="form-control" type="number" value="{{$bank->banknumber}}" name="bank_banknumber" required>
                            </div>
                        </div>
                       


                    </div>

                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-primary" type="submit">Cập nhật</button>
                    </div>
                </div>



            </form>
            

              
             

        </div>
    </div>
@endsection
