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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Tài khoản</th>
                            <th>Trạng thái</th>
                            <th>Họ và tên </th>
                            <th>Mã giới thiệu</th>
                            <th>Đã giới thiệu</th>
                            <th>Số điện thoại</th>
                            <th>Số dư tài khoản</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>kyosima</td>
                            <td class="trangthai">1</td>
                            <td>Thế Vũ</td>
                            <td>MGT1</td>
                            <td>100 Người</td>
                            <td>099999999</td>
                            <td>1000000 vnđ</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>hehe</td>
                            <td class="trangthai">2</td>
                            <td>Thế Vũ</td>
                            <td>MGT1</td>
                            <td>100 Người</td>
                            <td>099999999</td>
                            <td>1000000 vnđ</td>
                        </tr>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<script>
    $(document).ready(function () {

        $.each($('.trangthai'), function (index, value) {
        var text = $(value).text();
        if (text == "1") {
            alert('1');
            $(value).text('Đã duyệt')



        } else if (text == "2") {
            $(value).text('Đang đợi duyệt')
            $(value).css("background-color", "#224abe");
            $(value).css("color", "white");
            $(value).removeAttr("href");
        }
        })
});
</script>
@endsection
