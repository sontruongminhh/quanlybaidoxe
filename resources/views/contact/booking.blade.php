<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Đặt lịch gửi xe</title>
    <!-- reponsive meta-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap-->
    <link href="acc/css/bootstrap.min.css" rel="stylesheet">
    <link href="acc/css/font-awesome.min.css" rel="stylesheet">
    <!-- strock gap icons-->
    <link rel="stylesheet" href="vendors\Stroke-Gap-Icons-Webfont\style.css">
    <link rel="stylesheet" href="acc/css/animate.min.css">
    <!-- owl-carousel-->
    <link rel="stylesheet" href="vendors\owlcarousel\owl.carousel.css">
    <link rel="stylesheet" href="vendors\imagelightbox\imagelightbox.min.css">
    <link rel="stylesheet" href="vendors\jquery-ui-1.11.4\jquery-ui.min.css">
    <!-- Main Css-->
    <link rel="stylesheet" href="acc/css/style.css">
    <link rel="stylesheet" href="acc/css/responsive.css">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon\favicon-16x16.png">
    <!--if IE-->
    <link rel="stylesheet" type="text/css" href="acc/css/all-ie-only.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries-->
    <!-- WARNING: Respond.js doesn't work if you view the page via file://-->
    <!--if lt IE 9
    script(src='https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js')
    script(src='https://oss.maxcdn.com/respond/1.4.2/respond.min.js')
    
    -->
  </head>
  <body>
    <!-- .hidden-bar-->
    <section id="sidebarCollapse" class="side-menu">
      <button type="button" data-toggle="collapse" data-target="#sidebarCollapse" aria-expanded="false" aria-controls="sidebarCollapse" class="close-button"><i class="fa fa-times"></i></button>
      <div class="side-menu-widget about-widget"><a href="index.html" class="logo"><img src="acc/images/icon\lr-home.png" alt="Awesome Image"></a>
        <h3 class="title playball-font">Chào mừng bạn</h3>
        <!-- /.title playball-font-->
        <p>Xin chào</p>
      </div>
      <!-- /.side-menu-widget-->
      <div class="side-menu-widget gallery-widget">
        <div class="title-box">
          <h4>hello</h4><span class="decor-line inline"></span>
        </div>
        <!-- /.title-box-->
        <ul class="list-inline">
          <li><a href="#"><img src="acc/images/gallery-thumb\1.jpg" alt="Awesome Image"></a></li>
          <li><a href="#"><img src="acc/images/gallery-thumb\2.jpg" alt="Awesome Image"></a></li>
          <li><a href="#"><img src="acc/images/gallery-thumb\3.jpg" alt="Awesome Image"></a></li>
          <li><a href="#"><img src="acc/images/gallery-thumb\4.jpg" alt="Awesome Image"></a></li>
          <li><a href="#"><img src="acc/images/gallery-thumb\5.jpg" alt="Awesome Image"></a></li>
          <li><a href="#"><img src="acc/images/gallery-thumb\6.jpg" alt="Awesome Image"></a></li>
          <li><a href="#"><img src="acc/images/gallery-thumb\7.jpg" alt="Awesome Image"></a></li>
          <li><a href="#"><img src="acc/images/gallery-thumb\8.jpg" alt="Awesome Image"></a></li>
        </ul>
        <!-- /.list-inline-->
        <ul class="contact-info">
          <li>son@gmail.com</li>
          <li>034666666</li>
        </ul>
        <!-- /.contact-info-->
      </div>
      <!-- /.side-menu-widget-->
      <div class="side-menu-widget subscribe-widget">
        <div class="title-box">
          <h4>Đăng ký để nhận ưu đãi của chúng tôi</h4><span class="decor-line inline"></span>
        </div>
        <!-- /.title-box-->
        <form action="#" class="clearfix">
          <input type="text" placeholder="Enter email address">
          <button type="submit" class="res-btn">Đăng ký</button>
        </form>
      </div>
    </section>
    <!-- /.side-menu-->
    <section class="top-bar dhomev">
      <div class="container">
        <div class="pull-left left-infos contact-infos">
          <ul class="list-inline">
            <li><a href="#"><i class="fa fa-phone"></i>034691646</a></li>
            <!--comment for inline hack
            -->
            <li><a href="#"><i class="fa fa-map-marker"></i> Nguyễn Đức Đạt , phường Bến Thủy, thành phố Vinh</a></li>
            <!--comment for inline hack
            -->
            <li><a href="#"><i class="fa fa-envelope"></i>Truongminhson@gmail.com</a></li>
          </ul>
        </div>
        <!-- /.pull-left left-infos-->
        @if ($userEmail == null)
    <div class="pull-right right-infos link-list">
        <ul class="list-inline">
            <li><a href="#">Đăng nhập</a></li>
            <li><a href="#">Đăng ký</a></li>
        </ul>
    </div>
        @else
    @if ($userRole == 'admin')
        <p class="pull-right">Chào mừng, Admin!</p>
    @else
    <p class="pull-right" style="color: #ffffff; font-weight: bold; font-size: 1em;">Chào mừng, {{ $userEmail }}!</p>
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
                <li><a href="{{url('home')}}">Home</a></li>
              </ul>
            </li>
            <li><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle"> Bài viết <span class="glyphicon glyphicon-chevron-down"></span></a>
              <ul class="dropdown-submenu dropdown-menu">
               
              </ul>
            </li>
            <li><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Thông tin <span class="glyphicon glyphicon-chevron-down"></span></a>
              <ul class="dropdown-submenu dropdown-menu">
                
              </ul>
            </li>
           
            <li><a href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" class="dropdown-toggle">Bãi đỗ <span class="glyphicon glyphicon-chevron-down"></span></a>
              <ul class="dropdown-submenu dropdown-menu">
              
              
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
    <!-- Header  Inner style-->
    <section class="row final-inner-header">
      <div class="container">
        <h2 class="this-title">Đặt lịch gửi xe</h2>
      </div>
    </section>
    <section class="row final-breadcrumb">
      <div class="container">
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>
          <li class="active">Đặt lịch</li>
        </ol>
      </div>
    </section>
    <!-- Header  Slider style-->
    <!-- Booking style-->
    <section class="container clearfix common-pad-inner booknow">
      <div class="sec-header">
        <h2>Đặt lịch</h2>
        <h3>Chọn một chỗ đỗ phù hợp và ưng ý nhất của bạn</h3>
      </div>
      <div class="row">
        <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 pull-left">
          <div class="book-left-content input_form">
            <div class="row">
                <div class="col-lg-12">
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
            <form action="{{ route('send.booking') }}" method="post">
              @csrf
              <input type="hidden" name="customerid" value="{{ $userid }}">
              
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                  <input type="text" value="{{ $userName }}" class="form-control" readonly>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                  <input type="email" value="{{ $userEmail }}" class="form-control" readonly>
                </div>
              </div>
              
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                  <select name="parkingid" id="parkingid" class="form-control" required>
                    <option value="">Chọn bãi đỗ xe</option>
                    @foreach($parkingLots as $lot)
                      <option value="{{ $lot->parkingid }}">{{ $lot->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                  <select name="parking_slotid" id="parking_slotid" class="form-control" required>
                    <option value="">Chọn chỗ đỗ xe</option>
                    @foreach($parkingSlots as $slot)
                      <option value="{{ $slot->parking_slotid }}">{{ $slot->slort_number }}</option>
                    @endforeach
                  </select>
                </div>
               
              </div>

              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                  <input name="start_time" type="datetime-local" class="form-control" required>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 m0 col-xs-12">
                  <input type="datetime-local" name="end_time" class="form-control" required>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                  <button type="submit" class="res-btn">Đặt lịch</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-sm-4 pull-right">
          <div class="book-right"><span><img src="acc/images\1.jpg" alt=""></span>
            <h2>Bãi đỗ sontruong</h2>
            <p>Đảm bảo an toàn cho phương tiện của bạn được nghĩ ngơi đúng nghĩa</p>
          </div>
        </div>
      </div>
    </section>
    <!-- Booking style-->
    <!-- Welcome banner  style-->
    <div class="nasir-subscribe-form-row row">
      <div class="container">
        <div class="row this-dashed">
          <div class="this-texts">
            <h2>Liên hệ chúng tôi</h2>
            <h3>Qua địa chỉ email này</h3>
          </div>
          <form action="#" method="post" class="this-form input-group">
            <input type="email" placeholder="nhấn vào đây" class="form-control"><span class="input-group-addon">
              <button type="submit" class="res-btn">xong<i class="fa fa-arrow-right"></i></button></span>
          </form>
        </div>
      </div>
    </div>
    <!-- Welcome banner  style-->
    <!-- footer  style-->
    <footer>
      <section class="clearfix footer-wrapper">
        <section class="container clearfix footer-pad">
          <div class="widget about-us-widget col-md-4 col-sm-6"><a href="index.html"><img src="acc/images/footer\logo.png" alt="" class="img-responsive"></a>
            <p>Lorem ipsum dolor sit amet, consecte- tur adipiscing elit, sed do eiusmod tempor incididunt ut labore et.</p><a href="aboutus.html">Read More <i class="fa fa-angle-double-right"></i></a>
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
                <li><a href="aminities.html">Aminities</a></li>
                <li><a href="single-room.html">Single Room</a></li>
                <li><a href="testimonials.html">Testimonials</a></li>
                <li><a href="our-restaurant.html">Dinning</a></li>
                <li><a href="offers.html">offers</a></li>
              </ul>
            </div>
          </div>
          <div class="widget widget-links col-md-2 col-sm-6">
            <h4 class="widget_title">Quick Links</h4>
            <div class="widget-contact-list">
              <ul>
                <li><a href="index.html">Home</a></li>
                <li><a href="aboutus.html">About Us</a></li>
                <li><a href="suite-room.html">suits & Rooms</a></li>
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
                  <div class="fleft location_address"><b>Lake Resort</b><br>Lorance 542B, Tailstoi Town 5248 MT, Wordwide Country</div>
                </li>
                <li><i class="fa fa-phone"></i>
                  <div class="fleft contact_no"><a href="tel:+018655248503">+ 01865 524 8503</a>  /  <a href="tel:+12549547854">1254 954 7854</a></div>
                </li>
                <li><i class="fa fa-envelope-o"></i>
                  <div class="fleft contact_mail"><a href="mailto:info@resorthotel.com">info@resorthotel.com</a></div>
                </li>
              </ul>
            </div>
          </div>
        </section>
      </section>
      <section class="container clearfix footer-b-pad">
        <div class="footer-copy">
          <div class="pull-left fo-txt">
            <p>Copyright © Resort and Hotel 2016. All rights reserved. </p>
          </div>
          <div class="pull-right fo-txt">
            <p>Created by: <a href="http://themeforest.net/user/designarc">DesignArc</a></p>
          </div>
        </div>
      </section>
    </footer>
    <!-- footer  style-->
    <script src="acc/js/jquery-2.2.4.min.js"></script>
    <script src="acc/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="acc/js/jquery.bxslider.js"></script>
    <!-- owl carousel-->
    <script src="vendors\owlcarousel\owl.carousel.min.js"></script>
    <script src="acc/js/jquery.easing.min.js"></script>
    <script src="acc/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="acc/js/zebra_datepicker.js"></script>
    <script src="acc/js/jquery.form.js"></script>
    <script src="acc/js/jquery.validate.min.js"></script>
    <script src="acc/js/contact.js"></script>
    <script src="acc/js/email.js"></script>
    <script src="acc/js/jquery.fancybox.pack.js"></script>
    <script src="vendors\jquery-ui-1.11.4\jquery-ui.min.js"></script>
    <script src="acc/js/custom.js"></script>
    @push('scripts')
    <script>
    document.getElementById('parkingid').addEventListener('change', function() {
        let parkingid = this.value;
        let slotSelect = document.getElementById('parking_slotid');
        
        // Reset chỗ đỗ xe
        slotSelect.innerHTML = '<option value="">Chọn chỗ đỗ xe</option>';
        
        if(parkingid) {
            // Gọi API để lấy danh sách chỗ đỗ
            fetch(`/get-parking-slots/${parkingid}`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(slot => {
                        let option = document.createElement('option');
                        option.value = slot.parking_slotid;
                        option.textContent = `Vị trí: ${slot.slort_number}`;
                        slotSelect.appendChild(option);
                    });
                });
        }
    });
    </script>
    @endpush
    @if(session('error'))
        <div class="alert alert-danger">
            {!! session('error') !!}
        </div>
    @endif

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  </body>
</html>