@extends('admin.layout')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Quản lý admin</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách Admin</h6>
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
                            <th>Tài khoản</th>
                            <th>Số tiền </th>
                            <th>Ngân hàng</th>
                            <th>Thao tác</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach($withdrawns as $val)
                        <tr class="row-{{$val->id}}">
                            <td>{{$val->ofuser}}</td>
                            <td>{{$val->amount}} vnđ</td>
                            <td>
                                <?php $bank = DB::table('bank')->where('ofuser', $val->ofuser)->first(); ?>
                                <p><b>Ngân hàng: </b>{{$bank->bankname}}</p>
                                <p><b>Chủ TK: </b>{{$bank->username}}</p>
                                <p><b>STK: </b>{{$bank->banknumber}}</p>

                            </td>
                            <td>
                                @if($val->status == 1)
                                    <button class="btn btn-success">Đã duyệt</button>
                                @else
                                    <button class="btn btn-success">Đã huỷ</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>

@endsection
