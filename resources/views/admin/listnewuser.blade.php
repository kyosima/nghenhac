@extends('admin.layout')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý người dùng</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách người dùng mới đăng ký</h6>
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
                            <th>ID</th>
                            <th>Tài khoản</th>
                            <th>Họ và tên </th>
                            <th>Email</th>
                            <th>Biên lai</th>
                            <th>Cấp</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($users as $user)
                        <tr class="row-{{$user->id}}">
                            <td>{{$user->id}}</td>
                            <td>{{$user->username}}</td>
                            <td>{{$user->fullname}}</td>
                            <td>{{$user->email}}</td>
                            <td><img src="{{asset('/public/customer/image/bill/'.DB::table('upgrate')->where('ofuser',$user->username)->value('bill'))}}" width="100" />
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
                                    <button class="btn btn-success" onclick="kichhoat(this)" data-id="{{$user->id}}">Kích hoạt</button>||
                                    <button class="btn btn-danger" onclick="khoa(this)" data-id="{{$user->id}}">Khoá</button>

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
    function kichhoat(e){
        var id = $(e).data('id');
        $.ajax({
            type: "get",
            url: '{{URL::to("admin/kichhoat")}}',
            data: {id:id}, // serializes the form's elements.
            error: function(data)
            {
                console.log(data);
            },
            success: function(data)
            {
                $('.row-'+id).remove();
                console.log(data); // show response from the php script.
            }
        });
    }
    function khoa(e){
        var id = $(e).data('id');
        $.ajax({
            type: "get",
            url: '{{URL::to("admin/khoa")}}',
            data: {id:id}, // serializes the form's elements.
            error: function(data)
            {
                console.log(data);
            },
            success: function(data)
            {
                $('.row-'+id).remove();
                console.log(data); // show response from the php script.
            }
        });
    }
</script>
@endsection
