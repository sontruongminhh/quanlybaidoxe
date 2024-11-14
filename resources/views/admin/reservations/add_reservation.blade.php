
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
                    <div class="card-title">Thêm mới lịch đặt chỗ</div>
                </div>
                <?php
                $message = session()->get('message');
                if($message){
                    echo '<h5 class="text-alert text-center text-success"> '.$message.' </h5>';
                    session()->put('message', null);
                }
                ?>
                <div class="card-body">
                    @if($errors->has('duplicate_reservation'))
                    <div class="alert alert-danger">
                        {{ $errors->first('duplicate_reservation') }}
                    </div>
                @endif
                
                    <form role="form" action="{{URL::to('/save-reservation')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bãi đỗ xe </label>
                                    <select class="form-select" name="reservation_parkingid">
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
                                    <select class="form-select" name="reservation_parking_slotid">
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
                                    <select class="form-select" name="reservation_customerid">
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
                            <label for="exampleInputEmail1">Thời gian đặt chỗ</label>
                            <input type="time" name="reservation_reservation_time" class="form-control" id="exampleInputEmail1" placeholder="">
                            @error('reservation_reservation_time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian bắt đầu đặt</label>
                            <input type="time" name="reservation_start_time" class="form-control" id="exampleInputEmail1" placeholder="">
                            @error('reservation_start_time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thời gian kết thúc đặt</label>
                            <input type="time" name="reservation_end_time" class="form-control" id="exampleInputEmail1" placeholder="">
                            @error('reservation_end_time')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Trạng thái</label>
                            <input type="text" name="reservation_status" class="form-control" id="exampleInputEmail1" placeholder="">
                            @error('reservation_status')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        
                      
                        <button type="submit" name="add_reservation" class="btn btn-info">Thêm lịch mới</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Row end -->
</div>
@endsection