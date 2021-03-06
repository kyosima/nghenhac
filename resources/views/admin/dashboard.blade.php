@extends('admin.layout')
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
    <div class="align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-primary text-center">Trang quản trị</h1>
      
    </div>

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary text-center">Duyệt người dùng mới</h3>
                </div>
                <div class="card-body">
                    <img width="100%" src="{{asset('/public/admin/img/account.png')}}"/>
                  
                </div>
                <div class="card-footer text-center">
                    <a class="btn btn-primary" href="{{URL::to('admin/list-new-user')}}">Truy cập</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 flex-row align-items-center justify-content-between">
                <h3 class="m-0 font-weight-bold text-primary text-center">Danh sách video</h3>
                </div>
                <div class="card-body">
                    <img width="100%" src="{{asset('/public/admin/img/play.png')}}"/>
                  
                </div>
                <div class="card-footer text-center">
                    <a class="btn btn-primary" href="{{URL::to('admin/list-video')}}">Truy cập</a>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary text-center">Duyệt lệnh nạp</h3>
                </div>
                <div class="card-body">
                    <img width="100%" src="{{asset('/public/admin/img/building.png')}}"/>
                  
                </div>
                <div class="card-footer text-center">
                    <a class="btn btn-primary" href="{{URL::to('admin/deposit-manager')}}">Truy cập</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
