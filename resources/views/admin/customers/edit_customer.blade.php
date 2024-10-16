@extends('admin/index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="color: red; font-size: 24px;">
                Chỉnh sửa thông tin khách hàng
            </header>
            <div class="panel-body">
                @if(session()->has('message'))
                    <h5 class="text-alert">{{ session('message') }}</h5>
                @endif
                <div class="position-center">
                    <form role="form" action="{{ route('update_customer', ['customer_id' => $edit_user->userid]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="user_name">Tên</label>
                            <input type="text" name="user_name" class="form-control" id="user_name" value="{{ $edit_user->name }}">
                        </div>
                        <div class="form-group">
                            <label for="user_phone">Số điện thoại</label>
                            <input type="text" name="user_phone" class="form-control" id="user_phone" value="{{ $edit_user->phone }}">
                        </div>
                        <div class="form-group">
                            <label for="user_email">Email</label>
                            <input type="text" name="user_email" class="form-control" id="user_email" value="{{ $edit_user->email }}">
                        </div>
                        <div class="form-group">
                            <label for="user_address">Địa chỉ</label>
                            <input type="text" name="user_address" class="form-control" id="user_address" value="{{ $edit_user->address }}">
                        </div>
                        <div class="form-group">
                            <label for="comment_image">Ảnh </label>
                            <input type="file" name="customer_image" class="form-control" id="customer_image">
                            <img src="{{ asset('public/customer/'.$edit_user->image) }}" height="100" width="100" alt="image">
                        </div>
                        <button type="submit" name="all_customer" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
                
            </div>
        </section>
    </div>
</div>
@endsection   