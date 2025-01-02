<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Bãi đỗ xe TruongSon</title>
        
        <!-- Responsive meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- Bootstrap -->
        <link href="acc/css/bootstrap.min.css" rel="stylesheet">
        <link href="acc/css/font-awesome.min.css" rel="stylesheet">
    
        <!-- Stroke Gap Icons -->
        <link rel="stylesheet" href="acc/vendors/Stroke-Gap-Icons-Webfont/style.css">
        
        <!-- Animation -->
        <link rel="stylesheet" href="acc/css/animate.min.css">
    
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="acc/vendors/owlcarousel/owl.carousel.css">
        
        <!-- Image Lightbox -->
        <link rel="stylesheet" href="acc/vendors/imagelightbox/imagelightbox.min.css">
    
        <!-- jQuery UI -->
        <link rel="stylesheet" href="acc/vendors/jquery-ui-1.11.4/jquery-ui.min.css">
    
        <!-- Main CSS -->
        <link rel="stylesheet" href="acc/css/style.css">
        <link rel="stylesheet" href="acc/css/responsive.css">
    
        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="16x16" href="acc/favicon/favicon-16x16.png">
    
        <!-- If IE -->
        <link rel="stylesheet" type="text/css" href="acc/css/all-ie-only.css">

        <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">

    
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <style>
          /* CSS cho card */
          .card {
              transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
              border: none;
          }
  
          .card:hover {
              box-shadow: 0 10px 15px rgba(0, 0, 0, 0.2);
              transform: translateY(-5px);
          }
  
          .card img {
              transition: transform 0.3s ease;
              width: 90%; /* Giảm chiều rộng ảnh */
              height: 180px; /* Giữ chiều cao ảnh */
              object-fit: cover; /* Đảm bảo ảnh không bị méo */
              margin: 0 auto; /* Căn giữa ảnh */
          }
  
          .card:hover img {
              transform: scale(1.05);
          }
  
          .overlay {
              opacity: 0;
              transition: opacity 0.3s ease-in-out;
          }
  
          .card:hover .overlay {
              opacity: 1;
          }
  
          .card-body {
              padding: 1.5rem;
          }
  
          .card-title {
              font-size: 1.1rem;
              color: #333;
              font-weight: bold;
              text-overflow: ellipsis;
              overflow: hidden;
              white-space: nowrap;
          }
  
          .card-text {
              color: #555;
          }
  
          .btn-primary {
              background-color: #007bff;
              border-color: #007bff;
          }
  
          .btn-light {
              background-color: #f8f9fa;
              border-color: #f8f9fa;
          }
  
          .text-muted {
              font-size: 0.875rem;
              color: #6c757d;
          }
      </style>
    </head>
    
  <body>
<!-- .hidden-bar-->
<section id="sidebarCollapse" class="side-menu">
    <button type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-expanded="false" aria-controls="sidebarCollapse" class="close-button">
        <i class="fa fa-times"></i>
    </button>
    
    <div class="side-menu-widget about-widget">
        <a href="index.html" class="logo">
            <img src="acc/images/icon/lr-home.png" alt="Awesome Image">
        </a>
        <h3 class="title playball-font">Chào mừng đến với bãi đỗ xe Trường Thành</h3>
        <p>Rất vui vì được phục vụ quý khách hàng</p>
    </div>
    <!-- /.side-menu-widget-->
    
    <div class="side-menu-widget gallery-widget">
        <div class="title-box">
            <h4>From Our Gallery</h4>
            <span class="decor-line inline"></span>
        </div>
        <!-- /.title-box-->
        
        <ul class="list-inline">
            <li><a href="#"><img src="acc/images/gallery-thumb/1.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="acc/images/gallery-thumb/2.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="acc/images/gallery-thumb/3.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="acc/images/gallery-thumb/4.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="acc/images/gallery-thumb/5.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="acc/images/gallery-thumb/6.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="acc/images/gallery-thumb/7.jpg" alt="Awesome Image"></a></li>
            <li><a href="#"><img src="acc/images/gallery-thumb/8.jpg" alt="Awesome Image"></a></li>
        </ul>
        <!-- /.list-inline-->
        
        <ul class="list-inline">
          <li><a href="#"><i class="fa fa-phone"></i>034691646</a></li>
          <!--comment for inline hack
          -->
          <li><a href="#"><i class="fa fa-map-marker"></i> Nguyễn Đức Đạt , phường Bến Thủy, thành phố Vinh</a></li>
          <!--comment for inline hack
          -->
          <li><a href="#"><i class="fa fa-envelope"></i>Truongminhson@gmail.com</a></li>
        </ul>
        <!-- /.contact-info-->
    </div>
    <!-- /.side-menu-widget-->
    
    <div class="side-menu-widget subscribe-widget">
        <div class="title-box">
            <h4>Subscribe for our Special Offers</h4>
            <span class="decor-line inline"></span>
        </div>
        <!-- /.title-box-->
        
        <form action="#" class="clearfix">
            <input type="email" placeholder="Enter email address" required>
            <button type="submit" class="res-btn">Subscribe</button>
        </form>
    </div>
    <!-- /.subscribe-widget-->
</section>
<!-- /.side-menu-->

<section class="top-bar dhomev">
    <div class="container">
        <div class="pull-left left-infos contact-infos">
            <ul class="list-inline">
                <li><a href="#"><i class="fa fa-phone"></i> 03469999</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> nguyenducdat, thanhphovinh</a></li>
                <li><a href="#"><i class="fa fa-envelope"></i> sontruong@gmail.com</a></li>
            </ul>
        </div>
        <!-- /.pull-left left-infos-->
        @if ($userEmail == null)
          <div class="pull-right right-infos link-list">
              <ul class="list-inline">
                  <li><a href="{{url('login')}}">Login</a></li>
                  <li><a href="{{url('register')}}">Registration</a></li>
              </ul>
          </div>
        @else 
        
          @if ($userRole == 'admin')
          <p class="pull-right">Welcome, Admin!</p>
          @else
          <p class="pull-right">Welcome, {{ $userEmail }}!</p>
          @endif  
        @endif
        <!-- /.pull-right right-infos link-list-->
    </div>
    <!-- /.container-->
</section>

    <!-- /.top-bar-->
    <nav id="main-navigation-wrapper" class="navbar navbar-default _fixed-header _light-header stricky">
      <div class="container">
        <div class="navbar-header">
          <button type="button" data-toggle="collapse" data-target="#main-navigation" aria-expanded="false" class="navbar-toggle collapsed"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button><a href="index.html" class="navbar-brand"><img alt="Awesome Image" src="acc/images/header\logo2.png"></a>
        </div>
        <div id="main-navigation" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Trang chủ <span class="glyphicon glyphicon-chevron-down"></span></a>
              <ul class="dropdown-submenu dropdown-menu">
                <li><a href="{{url('home')}}">Home </a></li>
              </ul>
            </li>
            <li><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"> Bài viết <span class="glyphicon glyphicon-chevron-down"></span></a>
              <ul class="dropdown-submenu dropdown-menu">
               <li><a href="{{url('blog')}}">Bài viết</a></li>
               <li><a href="{{url('blogdetail')}}">Chi tiết</a></li>
              </ul>
            </li>
            <li><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Thông tin <span class="glyphicon glyphicon-chevron-down"></span></a>
              <ul class="dropdown-submenu dropdown-menu">
                
              </ul>
            </li>
           
            <li><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Bãi đỗ <span class="glyphicon glyphicon-chevron-down"></span></a>
              <ul class="dropdown-submenu dropdown-menu">    
                <li><a href="{{ route('booking.history') }}">Lịch đặt của tôi</a></li>      
              </ul>
            </li>
            <li><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Liên hệ <span class="glyphicon glyphicon-chevron-down"></span></a>
              <ul class="dropdown-submenu dropdown-menu">
                <li><a href="{{url('contact')}}">Gửi phản hồi</a></li>
                <li><a href="{{url('booking')}}">Đặt lịch</a></li>
              </ul>
            </li>
            
          </ul>
          <ul class="nav navbar-nav right-side-nav">
            <li class="dropdown"><a href="#"><span class="phone-only">Search</span><i class="icon icon-Search"></i></a>
              <ul class="dropdown-submenu has-search-form align-right">
                <li>
                  <form action="#" class="navbar-form">
                    <input type="text" placeholder="Enter Your Keyword">
                    <button type="submit"><i class="icon icon-Search"></i></button>
                  </form>
                  <!-- /.navbar-form-->
                </li>
              </ul>
            </li>
            <li><a role="button" data-toggle="collapse" href="#sidebarCollapse" aria-expanded="false" aria-controls="sidebarCollapse"><span class="phone-only">Side Menu</span><i class="fa fa-bars"></i></a></li>
          </ul>
          <!-- /.nav navbar-right-->
          <form action="#" class="nav-search-form row">
            <div class="input-group">
              <input type="search" placeholder="Type here for search" class="form-control"><span class="input-group-addon">
                <button type="submit"><i class="icon icon-Search"></i></button></span>
            </div>
          </form>
        </div>
      </div>
    </nav>
    <!-- Header  Slider style-->
    <div id="minimal-bootstrap-carousel" data-ride="carousel" class="carousel default-home-slider slide carousel-fade shop-slider">
      <!-- Wrapper for slides-->
      <div role="listbox" class="carousel-inner">
        <div style="background-image: url('acc/images/10.jpeg'); background-position: center right; background-size: cover; background-repeat: no-repeat;" class="item active slide-1">

            <div class="carousel-caption nhs-caption nhs-caption6">
                <div class="thm-container">
                    <div class="box valign-middle">
                        <div class="content text-center">
                            <h2 data-animation="animated fadeInUp" class="this-title">Đang có chương trình khuyến mãi</h2>
                            <p data-animation="animated fadeInDown">Mua vé tháng giảm 30% giá trị vé.</p>
                            <a data-animation="animated fadeInLeft" href="#" class="nhs-btn3">Đặt ngay</a>
                            <a data-animation="animated fadeInRight" href="#" class="nhs-btn">Xem thêm</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div style="background-image: url(acc/images/11.jpg); background-position: center right;" class="item slide-2">
            <div class="carousel-caption nhs-caption nhs-caption7">
                <div class="thm-container">
                    <div class="box valign-middle">
                        <div class="content text-left pull-left">
                            <h2 data-animation="animated fadeInUp" class="this-title">Chương trình khuyến mãi cho khách hàng</h2>
                            <p data-animation="animated fadeInDown">Bãi đã có chương trình khách hàng may mắn khi được gửi xe miễn phí 1 tháng.</p>
                            <a data-animation="animated fadeInLeft" href="#" class="nhs-btn3">Xem thêm</a>
                            <a data-animation="animated fadeInRight" href="#" class="nhs-btn">Chi tiết</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div style="background-image: url(acc/images/12.jpg); background-position: center right;" class="item slide-3">
            <div class="carousel-caption nhs-caption nhs-caption8">
                <div class="thm-container">
                    <div class="box valign-middle">
                        <div class="content text-center">
                            {{-- <h2 data-animation="animated fadeInUp" class="this-title">We offer you the best</h2>
                            <h2 data-animation="animated fadeInUp" class="this-title">luxury hotel with an impressive history</h2> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Controls -->
    <a href="#minimal-bootstrap-carousel" role="button" data-slide="prev" class="left carousel-control">
        <i class="fa fa-angle-left"></i>
        <span class="sr-only">Trước</span>
    </a>
    <a href="#minimal-bootstrap-carousel" role="button" data-slide="next" class="right carousel-control">
        <i class="fa fa-angle-right"></i>
        <span class="sr-only">Tiếp theo</span>
    </a>
    
    <!-- Search style -->
    <div class="search-wrapper">
        <section class="container clearfix">
            <div class="search-sec search-sec-homet">
                <div class="overlay">
                    <div class="border">
                        <div class="ser-in-box">
                            <input placeholder="Date" type="text" class="form-control datepicker-example8">
                        </div>
                        <div class="ser-in-box">
                            <input type="text" placeholder="Departure Date" class="form-control datepicker-example8">
                        </div>
                        <div class="ser-in-box">
                            <div class="select-box">
                                <select name="adults" class="select-menu">
                                    <option value="default">Phương tiện</option>
                                    <option value="1">Xe máy</option>
                                    <option value="2">Ô tô</option>
                                    <option value="3">3 bánh</option>
                                    <option value="4">Khác</option>
                                </select>
                            </div>
                        </div>
                        <div class="ser-in-box">
                            <div class="select-box">
                                <select name="children" class="select-menu">
                                    <option value="default">Số lượng</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                        </div>
                        <div class="ser-in-box chk-button">
                            <button type="submit" class="res-btn">Đặt lịch ngay</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
  
    

    @if(isset($bookings))
    <!-- Debug info -->
    <div style="display: none;">
        {{ print_r($bookings->toArray()) }}
    </div>
@endif

<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="booking-history-card">
                <div class="card-header">
                    <h2 class="text-center">Lịch Sử Đặt Chỗ</h2>
                    <p class="text-center text-muted">Xem và quản lý các lịch đặt chỗ của bạn</p>
                </div>

                @if(!isset($bookings) || $bookings->isEmpty())
                    <div class="empty-state">
                        <img src="{{ asset('acc/images/empty-calendar.png') }}" alt="No bookings" class="empty-state-img">
                        <h3>Chưa Có Lịch Đặt</h3>
                        <p>Bạn chưa có lịch đặt nào. Hãy đặt chỗ ngay!</p>
                        <a href="{{ route('booking.form') }}" class="btn btn-primary">
                            <i class="fa fa-calendar-plus-o"></i> Đặt Lịch Ngay
                        </a>
                    </div>
                @else
                    <div class="booking-list">
                        @foreach($bookings as $booking)
                            <div class="booking-item">
                                <div class="booking-status {{ strtolower($booking->status) }}">
                                    <span class="status-badge">{{ $booking->status }}</span>
                                </div>
                                <div class="booking-details">
                                    <div class="location-info">
                                        <h4>
                                            <i class="fa fa-map-marker"></i> 
                                            {{ $booking->parkingLot->name }}
                                        </h4>
                                        <p class="slot-number">
                                            <i class="fa fa-car"></i> 
                                            Vị trí: {{ $booking->parkingSlot->slort_number }}
                                        </p>
                                    </div>
                                    <div class="time-info">
                                        <div class="time-block">
                                            <i class="fa fa-clock-o"></i>
                                            <div>
                                                <label>Bắt đầu:</label>
                                                <span>{{ \Carbon\Carbon::parse($booking->start_time)->format('H:i d/m/Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="time-block">
                                            <i class="fa fa-clock-o"></i>
                                            <div>
                                                <label>Kết thúc:</label>
                                                <span>{{ \Carbon\Carbon::parse($booking->end_time)->format('H:i d/m/Y') }}</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="booking-meta">
                                        <span class="reservation-date">
                                            <i class="fa fa-calendar"></i>
                                            Đặt ngày: {{ \Carbon\Carbon::parse($booking->reservation_time)->format('H:i d/m/Y') }}
                                        </span>
                                    </div>
                                    <div class="booking-actions">
                                        @if(strtolower($booking->status) == 'chưa đỗ')  
                                            <button type="button" 
                                                    class="btn btn-danger btn-sm" 
                                                    data-toggle="modal" 
                                                    data-target="#cancelModal{{ $booking->reservationid }}">
                                                <i class="fa fa-times"></i> Hủy đặt chỗ
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- Modal cho mỗi booking -->
                            @if(strtolower($booking->status) == 'chưa đỗ')
                                <div class="modal fade" id="cancelModal{{ $booking->reservationid }}" tabindex="-1" role="dialog">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title">Xác nhận hủy đặt chỗ</h5>
                                                <button type="button" class="close" data-dismiss="modal">
                                                    <span>&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Bạn có chắc chắn muốn hủy lịch đặt này không?</p>
                                                <div class="booking-info">
                                                    <p><strong>Bãi đỗ:</strong> {{ $booking->parkingLot->name }}</p>
                                                    <p><strong>Vị trí:</strong> {{ $booking->parkingSlot->slort_number }}</p>
                                                    <p><strong>Thời gian:</strong> 
                                                        {{ \Carbon\Carbon::parse($booking->start_time)->format('H:i d/m/Y') }} - 
                                                        {{ \Carbon\Carbon::parse($booking->end_time)->format('H:i d/m/Y') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form action="{{ route('booking.cancel', $booking->reservationid) }}" method="POST">
                                                    @csrf
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                                                    <button type="submit" class="btn btn-danger">Xác nhận hủy</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
.booking-history-card {
    background: #fff;
    border-radius: 15px;
    box-shadow: 0 0 20px rgba(0,0,0,0.1);
    padding: 30px;
    margin-bottom: 30px;
}

.card-header {
    border-bottom: 1px solid #eee;
    padding-bottom: 20px;
    margin-bottom: 30px;
}

.card-header h2 {
    color: #333;
    font-size: 28px;
    margin-bottom: 10px;
}

.empty-state {
    text-align: center;
    padding: 40px 20px;
}

.empty-state-img {
    width: 150px;
    margin-bottom: 20px;
}

.empty-state h3 {
    color: #666;
    margin-bottom: 10px;
}

.booking-item {
    background: #f8f9fa;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    display: flex;
    align-items: flex-start;
    transition: transform 0.2s;
}

.booking-item:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

.booking-status {
    margin-right: 20px;
}

.status-badge {
    padding: 8px 15px;
    border-radius: 20px;
    font-size: 14px;
    font-weight: 500;
}

.chua-do .status-badge {
    background: #fff3cd;
    color: #856404;
}

.da-huy .status-badge {
    background: #f8d7da;
    color: #721c24;
}

.da-do .status-badge {
    background: #d4edda;
    color: #155724;
}

.booking-details {
    flex: 1;
}

.location-info h4 {
    color: #333;
    margin-bottom: 10px;
    font-size: 18px;
}

.slot-number {
    color: #666;
    font-size: 15px;
}

.time-info {
    display: flex;
    gap: 30px;
    margin: 15px 0;
}

.time-block {
    display: flex;
    align-items: center;
    gap: 10px;
}

.time-block i {
    color: #007bff;
}

.time-block label {
    color: #666;
    margin-right: 5px;
    font-size: 14px;
}

.booking-meta {
    font-size: 14px;
    color: #888;
    margin-top: 10px;
}

.btn-primary {
    background: #007bff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    color: #fff;
    font-weight: 500;
    transition: all 0.3s;
}

.btn-primary:hover {
    background: #0056b3;
    transform: translateY(-1px);
}

/* Responsive adjustments */
@media (max-width: 768px) {
    .booking-item {
        flex-direction: column;
    }
    
    .booking-status {
        margin-bottom: 15px;
        margin-right: 0;
    }
    
    .time-info {
        flex-direction: column;
        gap: 10px;
    }
}

.booking-actions {
    margin-top: 15px;
    padding-top: 15px;
    border-top: 1px solid #eee;
}

.btn-danger {
    background: #dc3545;
    color: #fff;
    border: none;
    padding: 8px 15px;
    border-radius: 5px;
    font-size: 14px;
    transition: all 0.3s;
}

.btn-danger:hover {
    background: #c82333;
}

.modal-content {
    border-radius: 10px;
}

.modal-header {
    background: #f8f9fa;
    border-radius: 10px 10px 0 0;
}

.booking-info {
    background: #f8f9fa;
    padding: 15px;
    border-radius: 5px;
    margin-top: 10px;
}

.booking-info p {
    margin-bottom: 5px;
}

.alert {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 1050;
    min-width: 300px;
    box-shadow: 0 3px 10px rgba(0,0,0,0.1);
    border-radius: 5px;
}

.alert-dismissible .close {
    padding: 0.5rem 1rem;
}

/* Animation cho alert */
.fade.show {
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from {
        transform: translateX(100%);
        opacity: 0;
    }
    to {
        transform: translateX(0);
        opacity: 1;
    }
}
</style>
    <!-- Welcome banner  style-->
    <div class="nasir-subscribe-form-row row">
      <div class="container">
        <div class="row this-dashed">
          <div class="this-texts">
            <h2>Hãy liên hệ bằng email</h2>
            <h3>Hãy nhập email của bạn!</h3>
          </div>
          <form action="#" method="post" class="this-form input-group">
            <input type="email" placeholder="Enter your email address" class="form-control"><span class="input-group-addon">
              <button type="submit" class="res-btn">Gửi<i class="fa fa-arrow-right"></i></button></span>
          </form>
        </div>
      </div>
    </div>
    <!-- Welcome banner  style-->
    <!-- footer  style-->
  <footer>
   <section class="clearfix footer-wrapper">
    <section class="container clearfix footer-pad">
      <div class="widget about-us-widget col-md-4 col-sm-6">
        <a href="index.html"><img src="acc/images/footer/logo.png" alt="Logo" class="img-responsive"></a>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
        <a href="aboutus.html">Read More <i class="fa fa-angle-double-right"></i></a>
        <ul class="nav">
          <li><a href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a href="#"><i class="fa fa-linkedin-square"></i></a></li>
          <li><a href="#"><i class="fa fa-facebook-square"></i></a></li>
          <li><a href="#"><i class="fa fa-skype"></i></a></li>
          <li><a href="#"><i class="fa fa-pinterest-square"></i></a></li>
        </ul>
      </div>

      <div class="widget widget-links col-md-2 col-sm-6">
        <h4 class="widget_title">Explore</h4>
        <div class="widget-contact-list">
          <ul>
            <li><a href="activities.html">Activities</a></li>
            <li><a href="gallery1.html">Gallery</a></li>
            <li><a href="aminities.html">Amenities</a></li>
            <li><a href="single-room.html">Single Room</a></li>
            <li><a href="testimonials.html">Testimonials</a></li>
            <li><a href="our-restaurant.html">Dining</a></li>
            <li><a href="offers.html">Offers</a></li>
          </ul>
        </div>
      </div>

      <div class="widget widget-links col-md-2 col-sm-6">
        <h4 class="widget_title">Quick Links</h4>
        <div class="widget-contact-list">
          <ul>
            <li><a href="index.html">Home</a></li>
            <li><a href="aboutus.html">About Us</a></li>
            <li><a href="suite-room.html">Suites & Rooms</a></li>
            <li><a href="news-left.html">News</a></li>
            <li><a href="contact.html">Contact Us</a></li>
            <li><a href="booking.html">Booking</a></li>
          </ul>
        </div>
      </div>

      <div class="widget get-in-touch col-md-4 col-sm-6">
        <h4 class="widget_title">Get In Touch</h4>
        <div class="widget-contact-list">
          <ul>
            <li><i class="fa fa-map-marker"></i>
              <div class="fleft location_address">
                <b>Lake Resort</b><br>Lorance 542B, Tailstoi Town 5248 MT, Worldwide Country
              </div>
            </li>
            <li><i class="fa fa-phone"></i>
              <div class="fleft contact_no">
                <a href="tel:+018655248503">+ 01865 524 8503</a> / <a href="tel:+12549547854">+1254 954 7854</a>
              </div>
            </li>
            <li><i class="fa fa-envelope-o"></i>
              <div class="fleft contact_mail">
                <a href="mailto:info@resorthotel.com">info@resorthotel.com</a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </section>
   </section>

    <section class="container clearfix footer-b-pad">
    <div class="footer-copy">
      <div class="pull-left fo-txt">
        <p>Copyright © Resort and Hotel 2016. All rights reserved.</p>
      </div>
      <div class="pull-right fo-txt">
        <p>Created by: <a href="http://themeforest.net/user/designarc">DesignArc</a></p>
      </div>
    </div>
    </section>
  </footer>

    <!-- Footer Scripts -->
<script src="acc/js/jquery-2.2.4.min.js"></script>
<script src="acc/js/bootstrap.min.js"></script>
<script type="text/javascript" src="acc/js/jquery.bxslider.js"></script>
<!-- Owl Carousel -->
<script src="acc/vendors/owlcarousel/owl.carousel.min.js"></script>
<script src="acc/js/jquery.easing.min.js"></script>
<script src="acc/js/jquery.mCustomScrollbar.concat.min.js"></script>
<script src="acc/js/zebra_datepicker.js"></script>
<!-- jQuery Appear -->
<script src="acc/vendors/jquery-appear/jquery.appear.js"></script>
<!-- jQuery CountTo -->
<script src="acc/vendors/jquery-countTo/jquery.countTo.js"></script>
<script src="acc/js/jquery.form.js"></script>
<script src="acc/js/jquery.validate.min.js"></script>
<script src="acc/js/contact.js"></script>
<script src="acc/js/jquery.mixitup.min.js"></script>
<script src="acc/js/jquery.fancybox.pack.js"></script>
<script src="acc/vendors/jquery-ui-1.11.4/jquery-ui.min.js"></script>
<script src="acc/js/custom.js"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<script>
window.setTimeout(function() {
    $(".alert").fadeTo(500, 0).slideUp(500, function(){
        $(this).remove(); 
    });
}, 5000);
</script>

@if(session('success') || session('error'))
    <div class="alert alert-{{ session('success') ? 'success' : 'danger' }} alert-dismissible fade show" role="alert">
        {{ session('success') ?? session('error') }}
        <button type="button" class="close" data-dismiss="alert">
            <span>&times;</span>
        </button>
    </div>
@endif

</body>
</html>