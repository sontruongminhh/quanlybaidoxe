
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
                    <div class="card-title">Thêm mới lịch sử gửi xe</div>
                </div>
                <?php
                $message = session()->get('message');
                if($message){
                    echo '<h5 class="text-alert"> '.$message.' </h5>';
                    session()->put('message', null);
                }
                ?>
                <div class="card-body">
                    
                    <form role="form" action="{{URL::to('/save-log')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    
                        <!-- Display duplicate reservation error if it exists -->
                        @if ($errors->has('duplicate_reservation'))
                            <div class="alert alert-danger">{{ $errors->first('duplicate_reservation') }}</div>
                        @endif
                    
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Khách hàng</label>
                                <select class="form-select" name="log_userid">
                                    @foreach ($data['users'] as $item)
                                        <option value="{{ $item->userid }}">
                                            {{ $item->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Biển số</label>
                                <select class="form-select" name="log_vehicleid">
                                    @foreach ($data['vehicles'] as $item)
                                        <option value="{{ $item->vehicleid }}">
                                            {{ $item->license_plate }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Loại vé</label>
                            <input type="text" name="log_action" class="form-control" id="exampleInputEmail1" placeholder="">
                            @error('log_action')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ghi chú</label>
                            <input type="text" name="log_details" class="form-control" id="exampleInputEmail1" placeholder="">
                            @error('log_details')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    
                          
                         <button type="submit" name="add_log" class="btn btn-info">Thêm mới lịch sử</button>
                    </form>
                    

                </div>
            </div>
        </div>
      
    </div>
    <!-- Row end -->

</div>
@endsection