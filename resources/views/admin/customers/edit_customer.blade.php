@extends('admin/index')
@section('admin_content')
<div class="container-fluid px-4 py-4">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0">Chỉnh sửa thông tin khách hàng</h5>
                </div>

                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show mx-4 mt-3" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('update_customer', ['customer_id' => $edit_user->userid]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Tên khách hàng <span class="text-danger">*</span></label>
                                    <input type="text" name="user_name" class="form-control" required
                                        value="{{ $edit_user->name }}" placeholder="Nhập tên khách hàng">
                                    @error('user_name')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Số điện thoại <span class="text-danger">*</span></label>
                                    <input type="tel" name="user_phone" class="form-control" required
                                        value="{{ $edit_user->phone }}" placeholder="Nhập số điện thoại">
                                    @error('user_phone')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" name="user_email" class="form-control" required
                                        value="{{ $edit_user->email }}" placeholder="Nhập email">
                                    @error('user_email')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Địa chỉ <span class="text-danger">*</span></label>
                                    <input type="text" name="user_address" class="form-control" required
                                        value="{{ $edit_user->address }}" placeholder="Nhập địa chỉ">
                                    @error('user_address')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label class="form-label">Ảnh đại diện</label>
                                    <input type="file" name="customer_image" class="form-control mb-2" accept="image/*">
                                    @if($edit_user->image)
                                        <div class="current-image">
                                            <label class="form-label text-muted small mb-1">Ảnh hiện tại:</label>
                                            <img src="{{ asset('public/customer/'.$edit_user->image) }}" 
                                                class="img-thumbnail" style="max-height: 150px" alt="Current Image">
                                        </div>
                                    @endif
                                    @error('customer_image')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="text-end mt-3">
                            <a href="{{ url('/all-customer') }}" class="btn btn-secondary me-2">
                                <i class="fas fa-arrow-left me-1"></i> Quay lại
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Cập nhật
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.form-label {
    font-weight: 500;
    margin-bottom: 0.5rem;
}
.card {
    border: none;
    border-radius: 10px;
}
.card-header {
    border-bottom: 1px solid #eee;
}
.form-control, .form-select {
    padding: 0.6rem 1rem;
    border-radius: 6px;
    border: 1px solid #ddd;
}
.form-control:focus, .form-select:focus {
    border-color: #4CAF50;
    box-shadow: 0 0 0 0.2rem rgba(76, 175, 80, 0.25);
}
.btn {
    padding: 0.6rem 1.5rem;
    border-radius: 6px;
    font-weight: 500;
}
.btn-primary {
    background-color: #4CAF50;
    border-color: #4CAF50;
}
.btn-primary:hover {
    background-color: #45a049;
    border-color: #45a049;
}
.current-image {
    background: #f8f9fa;
    padding: 0.5rem;
    border-radius: 6px;
    text-align: center;
}
.img-thumbnail {
    border: 1px solid #dee2e6;
    padding: 0.25rem;
    background-color: #fff;
    border-radius: 0.25rem;
    max-width: 100%;
    height: auto;
}
</style>
@endsection   