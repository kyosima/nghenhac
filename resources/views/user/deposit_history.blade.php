@extends('user.layout')
@section('container')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Lịch sử nạp tiền</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
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
                            <th>Số tiền</th>
                            <th>Biên lai</th>
                            <th>Thời gian</th>
                            <th>Trạng thái</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($deposits as $val)
                        <tr>
                            <td>{{$val->amount}} VNĐ</td>
                            <td><img width="100" src="{{asset('/public/customer/image/bill/'.$val->bill)}}"></td>
                            <td>{{date('d/m/Y H:m:i',strtotime($val->created_at))}}</td>
                            <td>
                                @if($val->status == 0)
                                    <button class="btn btn-dark">Đang duyệt</button>
                                @elseif($val->status == 1)
                                    <button class="btn btn-success">Đã duyệt</button>
                                @else
                                    <button class="btn btn-danger">Đã huỷ</button>
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
<script>
  
</script>
@endsection
