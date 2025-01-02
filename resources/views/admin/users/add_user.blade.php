@extends('admin/index')
@section('admin_content')
<div class="content-wrapper">
    <div class="row gutters">
        <div class="col-lg-8 col-sm-12 mx-auto">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Thêm mới người dùng</div>
                </div>
                
                @if(session('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ URL::to('/save-user') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="user_name">Tên người dùng <span class="text-danger">*</span></label>
                            <input type="text" name="user_name" class="form-control" value="{{ old('user_name') }}">
                            @error('user_name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_phone">Số điện thoại <span class="text-danger">*</span></label>
                            <input type="text" name="user_phone" class="form-control" value="{{ old('user_phone') }}">
                            @error('user_phone')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_email">Email <span class="text-danger">*</span></label>
                            <input type="email" name="user_email" class="form-control" value="{{ old('user_email') }}">
                            @error('user_email')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_password">Mật khẩu <span class="text-danger">*</span></label>
                            <input type="password" name="user_password" class="form-control">
                            @error('user_password')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_address">Địa chỉ <span class="text-danger">*</span></label>
                            <input type="text" name="user_address" class="form-control" value="{{ old('user_address') }}">
                            @error('user_address')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="user_role">Phân quyền <span class="text-danger">*</span></label>
                            <select name="user_role" class="form-control">
                                <option value="">Chọn quyền</option>
                                <option value="admin" {{ old('user_role') == 'admin' ? 'selected' : '' }}>Admin</option>
                                <option value="user" {{ old('user_role') == 'user' ? 'selected' : '' }}>Nhân viên</option>
                                <option value="customer" {{ old('user_role') == 'customer' ? 'selected' : '' }}>Khách hàng</option>
                            </select>
                            @error('user_role')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Thêm người dùng</button>
                            <a href="{{ URL::to('all-user') }}" class="btn btn-secondary">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection