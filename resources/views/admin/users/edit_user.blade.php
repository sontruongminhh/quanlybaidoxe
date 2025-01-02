@extends('admin/index')
@section('admin_content')
<div class="content-wrapper">
    <div class="row">
        <div class="col-lg-8 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Chỉnh sửa thông tin người dùng</h3>
                </div>

                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form action="{{ URL::to('/update-user/'.$edit_user->userid) }}" method="post">
                        @csrf
                        
                        <div class="form-group">
                            <label>Tên người dùng</label>
                            <input type="text" name="user_name" class="form-control" value="{{ $edit_user->name }}">
                        </div>

                        <div class="form-group">
                            <label>Số điện thoại</label>
                            <input type="text" name="user_phone" class="form-control" value="{{ $edit_user->phone }}">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="user_email" class="form-control" value="{{ $edit_user->email }}">
                        </div>

                        <div class="form-group">
                            <label>Địa chỉ</label>
                            <input type="text" name="user_address" class="form-control" value="{{ $edit_user->address }}">
                        </div>

                        <div class="form-group">
                            <label>Phân quyền</label>
                            <select name="user_role" class="form-control">
                                <option value="1" {{ $edit_user->role == '1' ? 'selected' : '' }}>Admin</option>
                                <option value="0" {{ $edit_user->role == '0' ? 'selected' : '' }}>Nhân viên</option>
                                <option value="3" {{ $edit_user->role == '3' ? 'selected' : '' }}>Khách hàng</option>
                            </select>
                        </div>

                        <div class="form-group mt-4">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ URL::to('all-user') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection   