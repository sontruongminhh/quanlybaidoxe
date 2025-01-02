<table class="table m-0">
    <thead>
        <tr>
            <th>STT</th>
            <th>Tên khách hàng</th>
            <th>Biển số xe</th>
            <th>Loại xe</th>
            <th>Thời gian vào</th>
            <th>Trạng thái</th>
            <th>Thời gian ra</th>
            <th>Bãi đỗ</th>
            <th>Vị trí đỗ</th>
            <th>Ảnh xe</th>
            <th>Sửa xóa</th>
        </tr>
    </thead>
    <tbody> 
        @foreach($all_vehicle as $key => $pro)
        <tr>
            <td>{{ $key + 1 }}</td>
            <td>{{ $pro->user }}</td>
            <td>{{ $pro->license_plate }}</td>
            <td>{{ $pro->vehicle_type }}</td>
            <td>{{ $pro->entry_time }}</td>
            <td>
                <span class="badge fs-6 {{ $pro->status == 'Đang đỗ' ? 'bg-success' : 'bg-secondary' }}">
                    {{ $pro->status }}
                </span>
            </td>
            <td>{{ $pro->exit_time ?? 'N/A' }}</td>
            <td>{{ $pro->parking_lot }}</td>
            <td>{{ $pro->parking_slot }}</td>
            <td><img src="public/customer/{{$pro->image}}" height="100" width="100"></td>
            <td>            
                <button type="button" class="btn btn-primary">
                    <a href="{{URL::to('/edit-vehicle/'.$pro->vehicleid)}}" class="text-white"> 
                        <i class="fas fa-edit"></i> Sửa
                    </a>
                </button>
                <button type="button" class="btn btn-danger">
                    <a href="{{URL::to('/delete-vehicle/'.$pro->vehicleid)}}" class="text-white">
                        <i class="fas fa-trash"></i> Xóa
                    </a>
                </button>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center mt-4">
    {{ $all_vehicle->appends(request()->query())->links('pagination::bootstrap-4') }}
</div>

<style>
.pagination {
    margin: 0;
    justify-content: center;
}
.page-link {
    padding: 8px 15px;
}
</style>
