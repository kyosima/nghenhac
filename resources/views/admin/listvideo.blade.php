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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800 ">Danh sách video</h1>
        @if(count($videos) >0)
        <a class="btn btn-danger" href="{{URL::to('/admin/delete-all-video')}}" onclick="return confirm('Bạn có muốn xóa toàn bộ video ?');"> <i class="fa fa-times" aria-hidden="true"></i> Xoá toàn bộ video</a>
        @endif
       
    </div>
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
        @foreach($videos as $video)
            <div class="col-lg-3">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                        <h6 class="m-0 font-weight-bold text-primary">Video</h6>
                        <a href="{{URL::to('/admin/delete-video/'.$video->id)}}" onclick="return confirm('Bạn có muốn xóa video này?');"> <i class="fa fa-times" aria-hidden="true"></i></a>
                    </div>
                    <div class="card-body">
                        <iframe width="100%" height="" src="https://www.youtube.com/embed/{{$video->link}}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-12 text-center">
            {{ $videos->links() }}
        </div>
    </div>

</div>
@endsection
