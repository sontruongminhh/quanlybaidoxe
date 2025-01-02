@extends('admin/index')
@section('admin_content')
<div class="content-wrapper">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Thêm mới phương tiện</h4>
                </div>
                
                @if(session('message'))
                    <div class="alert alert-success text-center">
                        {{ session('message') }}
                    </div>
                @endif

                <div class="card-body">
                    <form action="{{ URL::to('/save-vehicle') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Bãi đỗ xe <span class="text-danger">*</span></label>
                                    <select class="form-select" name="vehicle_parkingid" required>
                                        <option value="">-- Chọn bãi đỗ --</option>
                                        @foreach ($data['parking_lots'] as $item)
                                            <option value="{{ $item->parkingid }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Vị trí đỗ <span class="text-danger">*</span></label>
                                    <select class="form-select" name="vehicle_parking_slotid" required>
                                        <option value="">-- Chọn vị trí --</option>
                                        @foreach ($data['parking_slots'] as $item)
                                            <option value="{{ $item->parking_slotid }}">{{ $item->slort_number }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Khách hàng <span class="text-danger">*</span></label>
                                    <select class="form-select" name="vehicle_ownerid" required>
                                        <option value="">-- Chọn khách hàng --</option>
                                        @foreach ($data['users'] as $item)
                                            <option value="{{ $item->userid }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label class="form-label">Biển số xe <span class="text-danger">*</span></label>
                                    <input type="text" name="vehicle_license_plate" class="form-control" required>
                                    @error('vehicle_license_plate')
                                        <div class="text-danger mt-1">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Loại xe <span class="text-danger">*</span></label>
                                    <select class="form-select" name="vehicle_vehicle_type" required>
                                        <option value="">-- Chọn loại xe --</option>
                                        <option value="Xe máy">Xe máy</option>
                                        <option value="Ô tô">Ô tô</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Trạng thái xe <span class="text-danger">*</span></label>
                                    <select class="form-select" name="vehicle_status" id="vehicle_status" required>
                                        <option value="parking">Đang đỗ</option>
                                        <option value="left">Đã rời đi</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Thời gian vào <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="vehicle_entry_time" class="form-control" required>
                                </div>

                                <div class="form-group mb-3 d-none" id="exit_time_group">
                                    <label class="form-label">Thời gian ra <span class="text-danger">*</span></label>
                                    <input type="datetime-local" name="vehicle_exit_time" id="vehicle_exit_time" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label class="form-label">Ảnh xe</label>
                                    <input type="file" name="vehicle_image" class="form-control" accept="image/*">
                                </div>
                            </div>
                        </div>

                        <div class="text-center mt-3">
                            <button type="submit" class="btn btn-primary px-4">
                                <i class="fas fa-save me-2"></i>Thêm phương tiện
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const statusSelect = document.getElementById('vehicle_status');
    const exitTimeGroup = document.getElementById('exit_time_group');
    const exitTimeInput = document.getElementById('vehicle_exit_time');

    statusSelect.addEventListener('change', function() {
        if (this.value === 'left') {
            exitTimeGroup.classList.remove('d-none');
            exitTimeInput.required = true;
        } else {
            exitTimeGroup.classList.add('d-none');
            exitTimeInput.required = false;
            exitTimeInput.value = ''; // Xóa giá trị thời gian ra
        }
    });
});
</script>
@endsection