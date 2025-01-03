@extends('admin/index')
@section('admin_content')

<div class="table-container">
  <h5 class="table-title">Quản lý khách hàng</h5>
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
          <div class="col-sm-12 col-md-6"><div id="basicExample_filter" class="dataTables_filter"><label style="margin-left:500px;">Tìm kiếm <input type="search" class="form-control form-control-sm selectpicker" placeholder="" aria-controls="basicExample"></label></div>
        </div></div><div class="row"><div class="col-sm-12"><table id="basicExample" class="table m-0 dataTable no-footer" role="grid" aria-describedby="basicExample_info">
          <thead>
              <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">STT</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Tên</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Số điện thoại</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 170.562px;">Email</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Địa chỉ</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 200.1625px;">Ảnh khách hàng</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 170.925px;">Sửa xóa</th>
                </tr>
          </thead>
          <tbody>
            @foreach($all_customer as $key => $pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $pro->name }}</td>
              <td>{{ $pro->phone}}</td>
              <td>{{ $pro->email }}</td>
              <td>{{ $pro->address}}</td>
            <td><img src="public/customer/{{$pro->image}}" height="100" width="100"></td>

              
              <td>            
                  <button type="button" class="btn btn-primary"><a href="{{URL::to('/edit-customer/'.$pro->userid)}}"> Sửa </a></button>
                  <button  type="button" class="btn btn-danger"> <a href="{{URL::to('/delete-customer/'.$pro->userid)}}"> Xóa </button>
              </td>
                  </tr>
                  @endforeach         
           </tbody>
      </table>
      </div></div><div class="row">
    <div class="col-sm-12 col-md-5">
        <div class="dataTables_info" role="status" aria-live="polite">
            Hiển thị {{ $all_customer->firstItem() }} đến {{ $all_customer->lastItem() }} 
            trong tổng số {{ $all_customer->total() }} khách hàng
        </div>
    </div>
    <div class="col-sm-12 col-md-7">
        <div class="dataTables_paginate paging_simple_numbers">
            {{ $all_customer->links('pagination::bootstrap-4') }}
        </div>
    </div>
</div>
    </div>
</div>
@endsection 
