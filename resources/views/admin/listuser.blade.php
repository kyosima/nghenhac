@extends('admin.layout')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý người dùng</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng</h6>
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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tài khoản</th>
                            <th>Họ và tên </th>
                            <th>Email</th>
                            <th>Số dư</th>
                            <th>Cấp</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->fullname}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->wallet}}</td>
                            <td>
                                @if($user->role == 1)
                                    <button class="btn btn-info">200k</button>
                                @elseif($user->role == 2)
                                    <button class="btn btn-info">400k</button>
                                @else
                                    <button class="btn btn-info">600k</button>
                                @endif

                            </td>
                            <td>
                                @if($user->status == 0)
                                    <button class="btn btn-warning">Chưa kích hoạt</button>
                                @elseif($user->status == 1)
                                    <button class="btn btn-success">Đã kích hoạt</button>
                                @else
                                <button class="btn btn-danger">Đã khoá</button>
                                @endif
                            </td>
                            <td><a class="btn btn-primary" href="{{URL::to('/admin/view-user/'.$user->id)}}">Sửa tài khoản</a></td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
  
</script>
@endsection
