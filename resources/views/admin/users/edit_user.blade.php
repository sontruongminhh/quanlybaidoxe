@extends('admin/index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="color: red; font-size: 24px;">
                Chỉnh sửa thông tin người dùng
            </header>
            <div class="panel-body">
                @if(session()->has('message'))
                    <h5 class="text-alert">{{ session('message') }}</h5>
                @endif
                <div class="position-center">
                    <form role="form" action="{{ route('update_user', ['user_id' => $edit_user->userid]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="doctor_name">Email</label>
                            <input type="text" name="user_email" class="form-control" id="user_email" value="{{ $edit_user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="doctor_address">phân quyền</label>
                            <input type="text" name="user_role" class="form-control" id="user_role" value="{{ $edit_user->role }}">
                        </div>
                       
                        <button type="submit" name="all_blog" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection   