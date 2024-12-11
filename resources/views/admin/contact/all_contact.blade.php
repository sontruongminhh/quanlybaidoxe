@extends('admin/index')
@section('admin_content')

<div class="table-container">
  <h5 class="table-title">Quản lý phản hồi</h5>
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
              <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 100px;">STT</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Tên khách hàng</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Tiêu đề</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 250.85px;">Nội dung</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 170.562px;">Thời gian gửi yêu cầu</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 172.85px;">Trạng thái</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 250.1625px;">Nội dung phản hồi</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 170.925px;">Thời gian phản hồi</th>
                <th class="sorting" tabindex="0" aria-controls="basicExample" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending" style="width: 170.925px;">Sửa xóa</th>
                </tr>
          </thead>
          <tbody>
            @foreach($all_contact as $key => $pro)
            <tr>
              <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
              <td>{{ $pro->User}}</td>
              <td>{{ $pro->subject}}</td>
              <td>{{ $pro->message}}</td>
              <td>{{ $pro->contact_time}}</td>
              <td style="font-weight: bold; color: #ff0000; background-color: #fce4e4; padding: 10px; border: 2px solid #ff0000; text-align: center;">
                {{ $pro->status }}
            </td>
            
              <td>{{ $pro->response}}</td>
              <td>{{ $pro->response_time}}</td>
                         
              <td>            
                  <button type="button" class="btn btn-primary"><a href="{{URL::to('/edit-contact/'.$pro->contactid)}}"> Trả lời phản hồi </a></button>
                  <button  type="button" class="btn btn-danger"> <a href="{{URL::to('/delete-contact/'.$pro->contactid)}}"> Xóa </button>
              </td>
                  </tr>
                  @endforeach         
           </tbody>
      </table>
      </div></div><div class="row"><div class="col-sm-12 col-md-5">
        <div class="dataTables_info" id="basicExample_info" role="status" aria-live="polite"></div></div>
        <div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="basicExample_paginate"><ul class="pagination pagination-sm"><li class="paginate_button page-item previous disabled" id="basicExample_previous">
          <a href="#" aria-controls="basicExample" data-dt-idx="0" tabindex="0" class="page-link"> Trang</a></li><li class="paginate_button page-item active">
            <a href="#" aria-controls="basicExample" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item ">
              <a href="#" aria-controls="basicExample" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item ">
                <a href="#" aria-controls="basicExample" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item ">
                  <a href="#" aria-controls="basicExample" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item ">
                    <a href="#" aria-controls="basicExample" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item disabled" id="basicExample_ellipsis">
                      <a href="#" aria-controls="basicExample" data-dt-idx="6" tabindex="0" class="page-link">…</a></li><li class="paginate_button page-item "><a href="#" aria-controls="basicExample" data-dt-idx="7" tabindex="0" class="page-link">19</a></li>
                      <li class="paginate_button page-item next" id="basicExample_next">
                        <a href="#" aria-controls="basicExample" data-dt-idx="8" tabindex="0" class="page-link">Tiếp theo</a></li></ul></div></div></div></div>
    </div>
</div>
@endsection 
