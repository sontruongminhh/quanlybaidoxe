@extends('admin/index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="color: red; font-size: 24px;">
                Chỉnh sửa phương tiện
            </header>
            <div class="panel-body">
                @if(session()->has('message'))
                    <h5 class="text-alert">{{ session('message') }}</h5>
                @endif
                <div class="position-center mt-4">
                    <form role="form" action="{{ route('update_vehicle', ['vehicle_id' => $data['edit_vehicle']->vehicleid]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">bãi đỗ </label>
                                    <select class="form-select" name="vehicle_parkingid">
                                        @foreach ($data['parking_lots'] as $item)
                                            <option {{ $data['edit_vehicle']->parkingid == $item->parkingid ? "selected" : "" }}
                                                value="{{ $item->parkingid }}">
                                                {{ $item->name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">chỗ đỗ</label>
                                    <select class="form-select" name="vehicle_parking_slotid">
                                        @foreach ($data['parking_slots'] as $item)
                                            <option {{ $data['edit_vehicle']->parking_slotid == $item->parking_slotid ? "selected" : "" }}
                                                value="{{ $item->parking_slotid }}">
                                                {{ $item->slort_number }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Khách hàng</label>
                                    <select class="form-select" name="vehicle_ownerid">
                                        @foreach ($data['users'] as $item)
                                            <option value="{{ $item->userid }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="vehicle_license_plate">biển số</label>
                            <input type="text" name="vehicle_license_plate" class="form-control" id="vehicle_license_plate" value="{{ $data['edit_vehicle']->license_plate }}">
                        </div>
                        <div class="form-group">
                            <label for="vehicle_vehicle_type">loại xe</label>
                            <input type="text" name="vehicle_vehicle_type" class="form-control" id="vehicle_vehicle_type" value="{{ $data['edit_vehicle']->vehicle_type }}">
                        </div>
                        <div class="form-group">
                            <label for="vehicle_entry_time">thời gian vào</label>
                            <input type="text" name="vehicle_entry_time" class="form-control" id="vehicle_entry_time" value="{{ $data['edit_vehicle']->entry_time}}">
                        </div>
                        <div class="form-group">
                            <label for="vehicle_exit_time">thời gian ra</label>
                             <input type="text" name="vehicle_exit_time" class="form-control" id="vehicle_exit_time" value="{{ $data['edit_vehicle']->exit_time}}">
                        </div>
                        <div class="form-group">
                            <label for="comment_image">Ảnh </label>
                            <input type="file" name="vehicle_image" class="form-control" id="vehicle_image">
                            <img src="{{ asset('public/customer/'.$data['edit_vehicle']->image) }}" height="100" width="100" alt="image">

                        </div>
                        <button type="submit" name="all_vehicle" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection