
@extends('admin/index')
@section('admin_content')
<div class="content-wrapper">

    <!-- Row start -->
    <div class="row gutters">
        <div class="col-lg-3 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="doctor-profile">
                        <div class="doctor-thumb">
                            <img src="assets/img/user25.png" alt="UI Kits">
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Thêm mới phương tiện </div>
                </div>
                <?php
                $message = session()->get('message');
                if($message){
                    echo '<h5 class="text-alert text-center text-success"> '.$message.' </h5>';
                    session()->put('message', null);
                }
                ?>
                <div class="card-body">

                    <form role="form" action="{{URL::to('/save-vehicle')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bãi đỗ xe </label>
                                    <select class="form-select" name="vehicle_parkingid">
                                        @foreach ($data['parking_lots'] as $item)
                                            <option value="{{ $item->parkingid }}">
                                                {{ $item->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Vị trí đỗ</label>
                                    <select class="form-select" name="vehicle_parking_slotid">
                                        @foreach ($data['parking_slots'] as $item)
                                            <option value="{{ $item->parking_slotid }}">
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
                        {{-- <div class="form-group">
                            <label for="exampleInputEmail1">Người </label>
                            <input type="text" name="vehicle_ownerid" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div> --}}
                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Biển số </label>
                                <input type="text" name="vehicle_license_plate" class="form-control" id="exampleInputEmail1" placeholder="">
                            </div>
                            <label for="exampleInputEmail1">Loại xe</label>
                            <input type="text" name="vehicle_vehicle_type" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian vào</label>
                            <input type="time" name="vehicle_entry_time" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian ra</label>
                            <input type="time" name="vehicle_exit_time" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ảnh xe</label>
                            <input type="file" name="vehicle_image" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                      
                        <button type="submit" name="add_vehicle" class="btn btn-info">Thêm xe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>
@endsection