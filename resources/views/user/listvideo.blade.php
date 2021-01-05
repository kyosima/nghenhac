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
    <div class="alert alert-info text-center">
        <p>Lượt xem video còn lại của bạn <span style="color: red">{{$statistical->count_video}}</span> video</p>
    </div>
    <div class="row">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>Tên Video</th>
                    <th>Tiền nhận được</th>
                    <th>Thao tác</th>
                </tr>
            </thead>

            <tbody>
              @foreach($videos as $video)
                <tr>
                  <td>{{$video->name}}</td>
                  <td>10.000 vnđ</td>
                  <td><a class="btn btn-primary" href="{{URL::to('video/'.$video->id)}}">Xem Video</td>
                </tr>
              @endforeach
            </tbody>
        </table>
    </div>
  </div>
  

</div>

 
  
@endsection
