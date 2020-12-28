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
        <h1 class="h3 mb-0 text-gray-800">Danh sách video</h1>
    </div>



    <div class="row">

        <div class="col-lg-6">

            <!-- Default Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="/sua-video"><h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6></a>
                    <a href="#" onclick="return confirm('Bạn có muốn xóa video này?');"> <i class="fa fa-times" aria-hidden="true"></i></a>


                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <iframe width="100%" height="280" src="https://www.youtube.com/embed/psZ1g9fMfeo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <!-- Basic Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="/sua-video"><h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6></a>

                    <a href="#" onclick="return confirm('Bạn có muốn xóa video này?');"> <i class="fa fa-times" aria-hidden="true"></i></a>




                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <iframe width="100%" height="280" src="https://www.youtube.com/embed/psZ1g9fMfeo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

        </div>

        <div class="col-lg-6">

            <!-- Dropdown Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="/sua-video"><h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6></a>

                    <a href="#" onclick="return confirm('Bạn có muốn xóa video này?');"> <i class="fa fa-times" aria-hidden="true"></i></a>


                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <iframe width="100%" height="280" src="https://www.youtube.com/embed/psZ1g9fMfeo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>

            <!-- Collapsable Card Example -->
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <a href="/sua-video"><h6 class="m-0 font-weight-bold text-primary">Dropdown Card Example</h6></a>

                    <a href="#" onclick="return confirm('Bạn có muốn xóa video này?');"> <i class="fa fa-times" aria-hidden="true"></i></a>


                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <iframe width="100%" height="280" src="https://www.youtube.com/embed/psZ1g9fMfeo" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
