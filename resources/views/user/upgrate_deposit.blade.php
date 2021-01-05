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
        <h1 class="h3 mb-0 text-gray-800 text-center">Nâng cấp tài khoản</h1>
      
    </div>
  
    <div class="row align-items-center">
        <div class="col-md-6 offset-md-3 col-xs-12">
            <div class="row">
                <div class="col-md-12 col-xs-12">
                    <div class="alert alert-info" role="alert">
                        <h5 class=" text-danger">Bạn cần chuyển khoản thêm {{$package_upgrate->package-$role->package}}.000 VNĐ để nâng cấp lên gói {{$package_upgrate->package}}K</h5>
                        <h6 class="text-primary text-center">Thông tin tài khoản ngân hàng</h6>    
                        <p><b>Tên ngân hàng: </b>Vietcombank</p>
                        <p><b>Chủ tài khoản: </b>Nguyễn Văn A</p>
                        <p><b>Số tài khoản: </b>000000000000000000000</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-xs-12 text-center">
                    <form action="" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <input type="hidden" name="amount" value="{{$package_upgrate->package-$role->package}}000"/>
                        <input type="hidden" name="role" value="{{$package_upgrate->ofrole}}"/>
                        <div class="form-group">
                            <label>Hình ảnh chuyển khoản</label>
                            <input type="file" name="bill" class="form-control" value="" accept="image/*" required/>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Nâng cấp</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
