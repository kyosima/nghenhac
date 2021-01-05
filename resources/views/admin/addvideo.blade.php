@extends('admin.layout')


@section('container')
    <div class="container-fluid">
        <div class="col-md-12 text-center">
           

            <h3>Thêm video</h3>
            @if(Session::has('success'))
                <div class="alert alert-success" role="alert">
                    {{Session::get('success')}}
                </div>
            @elseif(Session::has('error'))
                <div class="alert alert-danger" role="alert">
                    {{Session::get('error')}}
                </div>
            @endif
            <form class="form-horizontal" name="changeProfile" method="post" oninput='password2.setCustomValidity(password2.value != password.value ? "Xác nhận mật khẩu không đúng" : "")'>
                {{ csrf_field() }}
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-group">
                            <label class="col-md-12 control-label">Tên Video</label>
                            <input class="form-control" type="text" value="" name="name" required>
                        </div>
                        <div class="form-group">
                            <label class="col-md-12 control-label">Link Video</label>
                            <input class="form-control" type="url" value="" name="link" required>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Thêm video</button>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
