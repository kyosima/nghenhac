@extends('user.layout')
@section('container')
<div class="container-fluid">
    <style>
        .card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 10px !important;
}
    </style>
    <!-- Page Heading -->
    <div class=" align-items-center justify-content-between mb-4">
        <h1 class="text-center text-primary">Lịch sử rút tiền</h1>
    </div>
    <div class="row align-items-center">
        <div class="col-md-6 offset-md-3 col-xs-12">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="alert alert-info" role="alert">
                        <h6 class="text-primary text-center">Thông tin tài khoản ngân hàng của bạn</h6>    
                        <p><b>Tên ngân hàng: </b>{{$bank->bankname}}</p>
                        <p><b>Chủ tài khoản: </b>{{$bank->username}}</p>
                        <p><b>Số tài khoản: </b>{{$bank->banknumber}}</p>
                        <p class="text-danger">Nếu thông tin không đúng bạn vui lòng cập nhật lại, nếu sai sót chúng tôi sẽ không chịu trách nhiệm</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 text-center">
                    <form action="" method="post" >
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label>Số tiền bạn muốn rút:</label>
                            <input type="number" name="amount" class="form-control" value="" required/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Rút tiền</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>


@endsection
