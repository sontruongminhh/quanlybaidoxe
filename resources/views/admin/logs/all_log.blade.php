@extends('admin/index')
@section('admin_content')

<div class="table-container">
  <h5 class="table-title">Danh sách lịch sử gửi xe</h5>
  <div class="table-responsive">
    <?php
      $message = session()->get('message');
      if($message){
          echo '<h5 style="color: red"> '.$message.' </h5>';
          session()->put('message', null);
      }
      ?>
      <div id="basicExample_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row"><div class="col-sm-12 col-md-6">
          </div>
          <div class="col-sm-12 col-md-6"><div id="basicExample_filter" class="dataTables_filter"><label style="margin-left:500px;">Search:<input type="search" class="form-control form-control-sm selectpicker" placeholder="" aria-controls="basicExample"></label></div>
        </div></div><div class="row"><div class="col-sm-12"><table id="basicExample" class="table m-0 dataTable no-footer" role="grid" aria-describedby="basicExample_info">
          <thead>
              <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">STT</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Tên khách hàng</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Biển số</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 170.562px;">Loại xe</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Thời gian vào</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Thời gian ra</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Loại vé</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Ghi chú</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 170.925px;">Sửa xóa</th>
                </tr>
          </thead>
          <tbody>
            @foreach($all_log as $key => $pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $pro->user}}</td>
              <td>{{ $pro->vehicle}}</td>
              <td>{{ $pro->vehicle_type}}</td>
              <td>{{ $pro->vehicle_entry}}</td>
              <td>{{ $pro->vehicle_exit}}</td>
              <td>{{ $pro->action}}</td>
              <td>{{ $pro->details}}</td>
              
              <td>            
                  <button type="button" class="btn btn-primary"><a href="{{URL::to('/edit-log/'.$pro->logid)}}"> Sửa </a></button>
                  <button  type="button" class="btn btn-danger"> <a href="{{URL::to('/delete-log/'.$pro->logid)}}"> Xóa </button>
              </td>
                  </tr>
                  @endforeach         
           </tbody>
      </table>
      </div></div><div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" role="status" aria-live="polite">
            Hiển thị {{ $all_log->firstItem() }} đến {{ $all_log->lastItem() }} 
            trong tổng số {{ $all_log->total() }} bản ghi
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers">
            {{ $all_log->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
    </div>
</div>
@endsection 
