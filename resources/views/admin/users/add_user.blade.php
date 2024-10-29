
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
                    <div class="card-title">Thêm mới người dùng</div>
                </div>
                <?php
                $message = session()->get('message');
                if($message){
                    echo '<h5 class="text-alert"> '.$message.' </h5>';
                    session()->put('message', null);
                }
                ?>
                <div class="card-body">
                    
                    <form role="form" action="{{URL::to('/save-user')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                            <label for="exampleInputEmail1">Tên người dùng </label>
                     <input type="text" name="user_name" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Số điện thoại </label>
                        <input type="text" name="user_phone" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email người dùng </label>
                        <input type="text" name="user_email" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="text" name="user_password" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Địa chỉ</label>
                        <input type="text" name="user_address" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Phân quyền</label>
                        <input type="text" name="user_role" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">anh </label>
                        <input type="text" name="user_image" class="form-control" id="exampleInputEmail1" placeholder="">
                    </div>
                    <button type="submit" name="add_user" class="btn btn-info">Thêm người dùng</button>

                    </form>
                </div>
            </div>
        </div>
      
    </div>
    <!-- Row end -->

</div>
@endsection