@extends('admin/index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="color: red; font-size: 24px;">
                Chỉnh sửa lịch sử bãi đỗ xe
            </header>
            <div class="panel-body">
                @if(session()->has('message'))
                    <h5 class="text-alert">{{ session('message') }}</h5>
                @endif
                <div class="position-center mt-4">
                    <form role="form" action="{{ route('update_log', ['log_id' => $data['edit_log']->logid]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <!-- Display duplicate reservation error if it exists -->
                        @if ($errors->has('duplicate_reservation'))
                            <div class="alert alert-danger">{{ $errors->first('duplicate_reservation') }}</div>
                        @endif
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên khách hàng</label>
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
                                            <option {{ $data['edit_log']->vehicleid == $item->vehicleid ? "selected" : "" }}
                                                value="{{ $item->vehicleid }}">
                                                {{ $item->license_plate }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Loại xe</label>
                                    <select class="form-select" name="log_vehicleid">
                                        @foreach ($data['vehicles'] as $item)
                                            <option {{ $data['edit_log']->vehicleid == $item->vehicleid ? "selected" : "" }}
                                                value="{{ $item->vehicleid }}">
                                                {{ $item->vehicle_type }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thời gian vào bãi</label>
                                    <select class="form-select" name="log_vehicleid">
                                        @foreach ($data['vehicles'] as $item)
                                            <option {{ $data['edit_log']->vehicleid == $item->vehicleid ? "selected" : "" }}
                                                value="{{ $item->vehicleid }}">
                                                {{ $item->entry_time }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Thời gian rời bãi</label>
                                    <select class="form-select" name="log_vehicleid">
                                        @foreach ($data['vehicles'] as $item)
                                            <option {{ $data['edit_log']->vehicleid == $item->vehicleid ? "selected" : "" }}
                                                value="{{ $item->vehicleid }}">
                                                {{ $item->exit_time }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="log_action">Thời gian đặt chỗ</label>
                            <input type="text" name="log_action" class="form-control" id="log_action" value="{{ $data['edit_log']->action }}">
                        </div>
                        
                        <div class="form-group">
                            <label for="log_details">Trạng thái</label>
                             <input type="text" name="log_details" class="form-control" id="log_details" value="{{ $data['edit_log']->details}}">
                        </div>
                        <button type="submit" name="all_log" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection