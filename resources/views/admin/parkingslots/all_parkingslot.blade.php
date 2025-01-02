@extends('admin/index')
@section('admin_content')
<div class="table-container">
    <h5 class="table-title">Quản lý vị trí đỗ xe</h5>
    <div class="table-responsive">
        @if(Session::has('message'))
            <div class="alert alert-success">
                {{ Session::get('message') }}
            </div>
        @endif
        
        @if(Session::has('error'))
            <div class="alert alert-danger">
                {{ Session::get('error') }}
            </div>
        @endif

        <div class="row mb-3">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" id="search" class="form-control" placeholder="Tìm kiếm...">
                </div>
            </div>
        </div>

        <table id="basicExample" class="table m-0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Số vị trí</th>
                    <th>Bãi đỗ xe</th>
                    <th>Trạng thái</th>
                    <th>Thông tin xe</th>
                    <th>Vị trí X</th>
                    <th>Vị trí Y</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($all_parkingslot as $key => $slot)
                <tr>
                    <td>{{ ($all_parkingslot->currentPage() - 1) * $all_parkingslot->perPage() + $key + 1 }}</td>
                    <td>{{ $slot->slort_number }}</td>
                    <td>{{ $slot->parking_lot_name }}</td>
                    <td>
                        <span class="badge {{ $slot->status == 'Trống' ? 'badge-success' : 'badge-danger' }}">
                            {{ $slot->status }}
                        </span>
                    </td>
                    <td>
                        @if($slot->vehicleid)
                            <div class="vehicle-info">
                                <span class="vehicle-type">{{ $slot->vehicle_type }}</span>
                                <br>
                                <small class="text-muted">{{ $slot->license_plate }}</small>
                            </div>
                        @else
                            <span class="text-muted">Không có xe</span>
                        @endif
                    </td>
                    <td>{{ $slot->position_x }}</td>
                    <td>{{ $slot->position_y }}</td>
                    <td>
                        <button type="button" class="btn btn-primary">
                            <a href="{{URL::to('/edit-parkingslot/'.$slot->parking_slotid)}}" class="text-white">
                                Sửa
                            </a>
                        </button>
                        <a href="javascript:void(0);" 
                           onclick="deleteConfirm('{{URL::to('/delete-parkingslot/'.$slot->parking_slotid)}}')"
                           class="btn btn-danger">Xóa</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $all_parkingslot->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>

<!-- Modal Confirm Delete -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Xác nhận xóa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Bạn có chắc chắn muốn xóa vị trí đỗ xe này không?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                <a href="" class="btn btn-danger" id="confirmDeleteButton">Xóa</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
function deleteConfirm(deleteUrl) {
    $('#confirmDeleteButton').attr('href', deleteUrl);
    $('#deleteConfirmModal').modal('show');
}
</script>

<style>
.badge {
    padding: 8px 12px;
    border-radius: 4px;
}
.badge-success {
    background-color: #28a745;
    color: white;
}
.badge-danger {
    background-color: #dc3545;
    color: white;
}
.pagination {
    margin-bottom: 0;
}
.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
}
.table-container {
    padding: 20px;
}
.vehicle-info {
    line-height: 1.2;
}
.vehicle-type {
    font-weight: 500;
    color: #2c3e50;
}
.text-muted {
    color: #6c757d;
    font-size: 0.9em;
}
.alert {
    margin-bottom: 20px;
    padding: 15px;
    border-radius: 4px;
}
.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}
.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}
.btn-sm {
    margin: 0 2px;
}
.modal-content {
    border-radius: 6px;
}
.modal-header {
    background-color: #f8f9fa;
    border-bottom: 1px solid #dee2e6;
}
.modal-footer {
    background-color: #f8f9fa;
    border-top: 1px solid #dee2e6;
}
.btn-danger {
    color: white !important;
    text-decoration: none;
}
.modal-header {
    background-color: #f8f9fa;
}
.modal-footer {
    background-color: #f8f9fa;
}
</style>
@endsection 
