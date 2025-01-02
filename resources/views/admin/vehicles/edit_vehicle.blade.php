@extends('admin/index')
@section('admin_content')
<div class="container-fluid px-4 py-4">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow">
                <div class="card-header bg-white py-3">
                    <h5 class="card-title mb-0">Chỉnh sửa phương tiện</h5>
                </div>

                @if(session('message'))
                    <div class="alert alert-success alert-dismissible fade show mx-4 mt-3" role="alert">
                        {{ session('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ route('update_vehicle', ['vehicle_id' => $data['edit_vehicle']->vehicleid]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label class="form-label">Bãi đỗ xe <span class="text-danger">*</span></label>
                            <select class="form-select" name="vehicle_parkingid" required>
                                @foreach ($data['parking_lots'] as $item)
                                    <option value="{{ $item->parkingid }}" {{ $data['edit_vehicle']->parkingid == $item->parkingid ? "selected" : "" }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Vị trí đỗ <span class="text-danger">*</span></label>
                            <select class="form-select" name="vehicle_parking_slotid" required>
                                @foreach ($data['parking_slots'] as $item)
                                    <option value="{{ $item->parking_slotid }}" {{ $data['edit_vehicle']->parking_slotid == $item->parking_slotid ? "selected" : "" }}>
                                        {{ $item->slort_number }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Khách hàng <span class="text-danger">*</span></label>
                            <select class="form-select" name="vehicle_ownerid" required>
                                @foreach ($data['users'] as $item)
                                    <option value="{{ $item->userid }}" {{ $data['edit_vehicle']->ownerid == $item->userid ? "selected" : "" }}>
                                        {{ $item->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Biển số xe <span class="text-danger">*</span></label>
                            <input type="text" name="vehicle_license_plate" class="form-control" required 
                                value="{{ $data['edit_vehicle']->license_plate }}" placeholder="Nhập biển số xe">
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Loại xe <span class="text-danger">*</span></label>
                            <select class="form-select" name="vehicle_vehicle_type" required>
                                <option value="Xe máy" {{ $data['edit_vehicle']->vehicle_type == 'Xe máy' ? 'selected' : '' }}>Xe máy</option>
                                <option value="Ô tô" {{ $data['edit_vehicle']->vehicle_type == 'Ô tô' ? 'selected' : '' }}>Ô tô</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Trạng thái xe <span class="text-danger">*</span></label>
                            <select class="form-select" name="vehicle_status" id="vehicle_status" required>
                                <option value="parking" {{ is_null($data['edit_vehicle']->exit_time) ? 'selected' : '' }}>Đang đỗ</option>
                                <option value="left" {{ !is_null($data['edit_vehicle']->exit_time) ? 'selected' : '' }}>Đã rời đi</option>
                            </select>
                        </div>

                        <div class="form-group mb-3">
                            <label class="form-label">Thời gian vào <span class="text-danger">*</span></label>
                            <input type="datetime-local" name="vehicle_entry_time" class="form-control" required 
                                value="{{ date('Y-m-d\TH:i', strtotime($data['edit_vehicle']->entry_time)) }}">
                        </div>

                        <div class="form-group mb-3" id="exit_time_group">
                            <label class="form-label">Thời gian ra <span class="text-danger exit-required d-none">*</span></label>
                            <input type="datetime-local" name="vehicle_exit_time" id="vehicle_exit_time" class="form-control"
                                value="{{ $data['edit_vehicle']->exit_time ? date('Y-m-d\TH:i', strtotime($data['edit_vehicle']->exit_time)) : '' }}">
                        </div>

                        <div class="form-group mb-4">
                            <label class="form-label d-block">Ảnh xe</label>
                            <input type="file" name="vehicle_image" class="form-control mb-2" accept="image/*">
                            @if($data['edit_vehicle']->image)
                                <img src="{{ asset('public/customer/'.$data['edit_vehicle']->image) }}" 
                                    class="img-thumbnail" style="max-height: 150px" alt="Vehicle Image">
                            @endif
                        </div>

                        <div class="text-end">
                            <a href="{{ url('all-vehicle') }}" class="btn btn-secondary me-2">
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
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusSelect = document.getElementById('vehicle_status');
    const exitTimeGroup = document.getElementById('exit_time_group');
    const exitTimeInput = document.getElementById('vehicle_exit_time');
    const exitRequired = exitTimeGroup.querySelector('.exit-required');

    function updateExitTimeVisibility() {
        if (statusSelect.value === 'left') {
            exitTimeGroup.classList.remove('d-none');
            exitTimeInput.required = true;
            exitRequired.classList.remove('d-none');
        } else {
            exitTimeGroup.classList.add('d-none');
            exitTimeInput.required = false;
            exitRequired.classList.add('d-none');
            exitTimeInput.value = '';
        }
    }

    statusSelect.addEventListener('change', updateExitTimeVisibility);
    updateExitTimeVisibility();
});
</script>
@endsection