@extends('admin/index')
@section('admin_content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading" style="color: red; font-size: 24px;">
                Chỉnh sửa lịch đặt xe
            </header>
            <div class="panel-body">
                @if(session()->has('message'))
                    <h5 class="text-alert">{{ session('message') }}</h5>
                @endif
                <div class="position-center mt-4">
                    <form role="form" action="{{ route('update_reservation', ['reservation_id' => $data['edit_reservation']->reservationid]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Bãi đỗ </label>
                                    <select class="form-select" name="reservation_parkingid">
                                        @foreach ($data['parking_lots'] as $item)
                                            <option {{ $data['edit_reservation']->parkingid == $item->parkingid ? "selected" : "" }}
                                                value="{{ $item->parkingid }}">
                                                {{ $item->name }} 
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Chỗ đỗ</label>
                                    <select class="form-select" name="reservation_parking_slotid">
                                        @foreach ($data['parking_slots'] as $item)
                                            <option {{ $data['edit_reservation']->parking_slotid == $item->parking_slotid ? "selected" : "" }}
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
                            <label for="reservation_reservation_time">Thời gian đặt chỗ</label>
                            <input type="text" name="reservation_reservation_time" class="form-control" id="reservation_reservation_time" value="{{ $data['edit_reservation']->reservation_time }}">
                        </div>
                        <div class="form-group">
                            <label for="reservation_start_time">Thời gian bắt đầu</label>
                            <input type="text" name="reservation_start_time" class="form-control" id="reservation_start_time" value="{{ $data['edit_reservation']->start_time }}">
                        </div>
                        <div class="form-group">
                            <label for="reservation_end_time">Thời gian kết thúc</label>
                            <input type="text" name="reservation_end_time" class="form-control" id="reservation_end_time" value="{{ $data['edit_reservation']->end_time}}">
                        </div>
                        <div class="form-group">
                            <label for="reservation_status">Trạng thái</label>
                             <input type="text" name="reservation_status" class="form-control" id="reservation_status" value="{{ $data['edit_reservation']->status}}">
                        </div>
                        <button type="submit" name="all_reservation" class="btn btn-info">Cập nhật</button>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection