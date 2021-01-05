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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ">Danh sách video</h1>
      
    </div>

    <div class="row">
        <div class="col-md-4 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary text-center">Gói 200k</h3>
                </div>
                <div class="card-body">
                    <img width="100%" src="{{asset('/public/admin/img/videoplayer.png')}}"/>
                    <ul>
                        <li><b>Giá: </b>200.000 VNĐ</li>
                        <li><b>Số lượng video: </b>4 video</li>
                        <li><b>Tiện nhận được 1 video: </b>10.000 VNĐ</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary" onclick="upgrate(this)" data-toggle="modal" data-target="#upgrateModal" data-package="200">Nâng cấp</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary text-center">Gói 400k</h3>
                </div>
                <div class="card-body">
                    <img width="100%" src="{{asset('/public/admin/img/videoplayer.png')}}"/>
                    <ul>
                        <li><b>Giá: </b>400.000 VNĐ</li>
                        <li><b>Số lượng video: </b>7 video</li>
                        <li><b>Tiện nhận được 1 video: </b>10.000 VNĐ</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary" onclick="upgrate(this)" data-toggle="modal" data-target="#upgrateModal" data-package="400">Nâng cấp</button>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-xs-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3 flex-row align-items-center justify-content-between">
                    <h3 class="m-0 font-weight-bold text-primary text-center">Gói 600k</h3>
                </div>
                <div class="card-body">
                    <img width="100%" src="{{asset('/public/admin/img/videoplayer.png')}}"/>
                    <ul>
                        <li><b>Giá: </b>600.000 VNĐ</li>
                        <li><b>Số lượng video: </b>12 video</li>
                        <li><b>Tiện nhận được 1 video: </b>10.000 VNĐ</li>
                    </ul>
                </div>
                <div class="card-footer text-center">
                    <button class="btn btn-primary" onclick="upgrate(this)" data-toggle="modal" data-target="#upgrateModal" data-package="600">Nâng cấp</button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="upgrateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Bạn có muốn nâng cấp lên gói <span class="name-package" style="color: red"></span></h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                <a class="btn btn-primary" id="confirm-upgrate" href="">Nâng cấp</a>
            </div>
        </div>
    </div>
</div>
<script>
    function upgrate(e){
        var package = $(e).data('package');
        $('.name-package').text(package+"K");
        $('#confirm-upgrate').attr('href', '{{URL::to("upgrate/")}}'+'/'+package);
    }
</script>
@endsection
