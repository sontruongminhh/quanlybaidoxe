@extends('admin/index')
@section('admin_content')
<div class="table-container">
    <h5 class="table-title">Quản lý bảng giá</h5>
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

        <table id="basicExample" class="table m-0">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Biển số xe</th>
                    <th>Loại xe</th>
                    <th>Dịch vụ</th>
                    <th>Thời gian đỗ</th>
                    <th>Giá dịch vụ</th>
                    <th>Tổng tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach($all_pricing as $key => $price)
                <tr>
                    <td>{{ ($all_pricing->currentPage() - 1) * $all_pricing->perPage() + $key + 1 }}</td>
                    <td>{{ $price->license_plate }}</td>
                    <td>{{ $price->vehicle_type }}</td>
                    <td>{{ $price->action  }}</td>
                    <td>
                        @if($price->entry_time)
                            @if($price->exit_time)
                                @php
                                    $entry = \Carbon\Carbon::parse($price->entry_time);
                                    $exit = \Carbon\Carbon::parse($price->exit_time);
                                    $hours = $entry->diffInHours($exit);
                                    $minutes = $entry->diffInMinutes($exit) % 60;
                                @endphp
                                {{ $hours }} giờ {{ $minutes }} phút
                            @else
                                Đang đỗ
                            @endif
                        @else
                            Chưa vào bãi
                        @endif
                    </td>
                    <td>
                        @if($price->action == 'Vé tháng')
                            {{ $price->vehicle_type == 'Xe máy' ? number_format(1000000) : number_format(1500000) }} VNĐ/tháng
                        @else
                            {{ $price->vehicle_type == 'Xe máy' ? number_format(7000) : number_format(15000) }} VNĐ/giờ
                        @endif
                    </td>
                    <td>
                        @if($price->entry_time)
                            @if($price->action == 'Vé tháng')
                                {{ $price->vehicle_type == 'Xe máy' ? number_format(1000000) : number_format(1500000) }} VNĐ
                            @else
                                @if($price->exit_time)
                                    @php
                                        $entry = \Carbon\Carbon::parse($price->entry_time);
                                        $exit = \Carbon\Carbon::parse($price->exit_time);
                                        $hours = $entry->diffInHours($exit);
                                        $minutes = $entry->diffInMinutes($exit) % 60;
                                        $totalHours = $hours + ($minutes / 60);
                                        
                                        $hourlyRate = $price->vehicle_type == 'Xe máy' ? 7000 : 15000;
                                        $totalAmount = ceil($totalHours) * $hourlyRate;
                                    @endphp
                                    {{ number_format($totalAmount) }} VNĐ
                                @else
                                    Đang tính
                                @endif
                            @endif
                        @else
                            0 VNĐ
                        @endif
                    </td>
                    <td>            
                      <button type="button" class="btn btn-primary"><a href="{{URL::to('/edit-pricing/'.$price->vehicleid)}}"> Sửa </a></button>
                    
                  </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="d-flex justify-content-center mt-3">
            {{ $all_pricing->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
@endsection 