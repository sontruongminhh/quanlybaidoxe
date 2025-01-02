@extends('admin/index')
@section('admin_content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Cập nhật bảng giá</h5>
        </div>
        <div class="card-body">
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    {{ Session::get('error') }}
                </div>
            @endif

            <form action="{{URL::to('/update-pricing/'.$edit_pricing->vehicleid)}}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="vehicleid" value="{{ $edit_pricing->vehicleid }}">
                
                <div class="form-group">
                    <label>Biển số xe</label>
                    <input type="text" class="form-control" value="{{ $edit_pricing->license_plate }}" readonly>
                </div>

                <div class="form-group">
                    <label>Loại xe</label>
                    <input type="text" class="form-control" name="vehicle_type" value="{{ $edit_pricing->vehicle_type }}" readonly>
                </div>

                <div class="form-group">
                    <label>Loại dịch vụ</label>
                    <select name="action" class="form-control">
                        <option value="Vé thường" {{ ($edit_pricing->action ?? '') != 'Vé thường' ? 'selected' : '' }}>
                            Vé thường (theo giờ)
                        </option>
                        <option value="Vé tháng" {{ ($edit_pricing->action ?? '') == 'Vé tháng' ? 'selected' : '' }}>
                            Vé tháng
                        </option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Giá dịch vụ</label>
                    <div id="price-display" class="form-control" readonly>
                        @if(($edit_pricing->action ?? '') == 'Vé tháng')
                            {{ $edit_pricing->vehicle_type == 'Xe máy' ? '1,000,000 VNĐ/tháng' : '1,500,000 VNĐ/tháng' }}
                        @else
                            {{ $edit_pricing->vehicle_type == 'Xe máy' ? '7,000 VNĐ/giờ' : '15,000 VNĐ/giờ' }}
                        @endif
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Cập nhật</button>
                <a href="{{URL::to('/all-pricing')}}" class="btn btn-secondary">Quay lại</a>
            </form>
        </div>
    </div>
</div>

<script>
document.querySelector('select[name="action"]').addEventListener('change', function() {
    const vehicleType = document.querySelector('input[name="vehicle_type"]').value;
    const priceDisplay = document.getElementById('price-display');
    
    if (this.value === 'Vé tháng') {
        priceDisplay.textContent = vehicleType === 'Xe máy' ? '1,000,000 VNĐ/tháng' : '1,500,000 VNĐ/tháng';
    } else {
        priceDisplay.textContent = vehicleType === 'Xe máy' ? '7,000 VNĐ/giờ' : '15,000 VNĐ/giờ';
    }
});
</script>   
@endsection
