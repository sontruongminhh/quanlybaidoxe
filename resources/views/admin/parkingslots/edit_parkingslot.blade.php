@extends('admin/index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
                <h2 class="panel-title">Cập nhật thông tin vị trí đỗ xe</h2>
            </header>
            <div class="panel-body">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="position-center">
                    <form role="form" action="{{ route('update_parkingslot', ['parkingslot_id' => $edit_parkingslot->parking_slotid]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Số vị trí</label>
                            <input type="text" name="slort_number" class="form-control" 
                                value="{{ $edit_parkingslot->slort_number }}">
                        </div>

                        <div class="form-group">
                            <label>Trạng thái</label>
                            <select name="status" class="form-control">
                                <option value="Trống" {{ $edit_parkingslot->status == 'Trống' ? 'selected' : '' }}>
                                    Trống
                                </option>
                                <option value="Đã đặt" {{ $edit_parkingslot->status == 'Đã đặt' ? 'selected' : '' }}>
                                    Đã đặt
                                </option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Thông tin xe hiện tại</label>
                            <div class="vehicle-info p-2 bg-light rounded">
                                @if($edit_parkingslot->vehicleid)
                                    <p><strong>Loại xe:</strong> {{ $edit_parkingslot->vehicle_type }}</p>
                                    <p><strong>Biển số:</strong> {{ $edit_parkingslot->license_plate }}</p>
                                @else
                                    <p class="text-muted">Không có xe</p>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Vị trí X</label>
                            <input type="number" step="0.01" name="position_x" class="form-control" 
                                value="{{ $edit_parkingslot->position_x }}">
                        </div>

                        <div class="form-group">
                            <label>Vị trí Y</label>
                            <input type="number" step="0.01" name="position_y" class="form-control" 
                                value="{{ $edit_parkingslot->position_y }}">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Cập nhật</button>
                            <a href="{{ route('all-parkingslot') }}" class="btn btn-default">Quay lại</a>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>

<style>
.panel-heading {
    background: #f4f4f4;
    padding: 15px;
    margin-bottom: 20px;
}
.panel-title {
    color: #333;
    font-size: 20px;
    margin: 0;
}
.form-group {
    margin-bottom: 20px;
}
.vehicle-info {
    border: 1px solid #ddd;
    padding: 10px;
}
.vehicle-info p {
    margin: 5px 0;
}
.alert {
    margin-bottom: 20px;
}
</style>
@endsection   