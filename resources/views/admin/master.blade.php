<!doctype html>
<html lang="en">

<head>
		<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- Meta -->
<meta name="description" content="Responsive Bootstrap Dashboards">
<meta name="author" content="Bootstrap Gallery">
<link rel="shortcut icon" href="assets/img/favicon.svg" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<!-- Title -->
<title>@yield('title')</title>


<!-- *************
    ************ Common Css Files *************
    ************ -->
<!-- Bootstrap css -->
<link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

<!-- Icomoon Font Icons css -->
<link rel="stylesheet" href="{{asset('assets/fonts/style.css')}}">

<!-- Main css -->
<link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}">


<!-- *************
    ************ Vendor Css Files *************
************ -->

	</head>

	<body>

		<!-- Loading starts -->
		<div id="loading-wrapper">
			<div class="spinner-border" role="status">
				<span class="sr-only">Loading...</span>
			</div>
		</div>
		<!-- Loading ends -->

			<!-- Header start -->
			<header class="header">
				<div class="container-fluid">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-sm-4 col-4">
							<a href="index.html" class="logo">Bãi đỗ xe</a>
						</div>
						<div class="col-sm-8 col-8">

							<!-- Header actions start -->
							<ul class="header-actions">
								<li class="dropdown d-none d-sm-block">
									<a href="#" class="contact">
										<i class="icon-phone"></i> 012 345 6789
									</a>
								</li>
								<li class="dropdown d-none d-sm-block">
									<a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
										<i class="icon-bell"></i>
										<span class="count-label"></span>
									</a>
									<div class="dropdown-menu lrg" aria-labelledby="notifications">
										<div class="dropdown-menu-header">
											<h5>HI</h5>
											<p class="m-0 sub-title">Trang quản trị</p>
										</div>
										<ul class="header-notifications">
											<li>
												<a href="#" class="clearfix">
													<div class="avatar">
														<img src="assets/img/user24.png" alt="Medical Admin Dashboards" />
														<span class="notify-iocn icon-drafts text-danger"></span>
													</div>
													<div class="details">
														<h6>Dr. Clive</h6>
														<p>Appointed as a new President 2021-2024</p>
													</div>
												</a>
											</li>
											<li>
												<a href="#" class="clearfix">
													<div class="avatar">
														<img src="assets/img/user21.png" alt="Medical Admin Dashboards" />
														<span class="notify-iocn icon-layers text-info"></span>
													</div>
													<div class="details">
														<h6>Dr. G. Levsmia</h6>
														<p>Will be on leave on October 2nd week.</p>
													</div>
												</a>
											</li>
											<li>
												<a href="#" class="clearfix">
													<div class="avatar">
														<img src="assets/img/user19.png" alt="Medical Admin Dashboards" />
														<span class="notify-iocn icon-person_add text-success"></span>
													</div>
													<div class="details">
														<h6>Dr. George S</h6>
														<p>Sent new applointments list</p>
													</div>
												</a>
											</li>
										</ul>
									</div>
								</li>
								<li class="dropdown">
									<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
										<span class="user-name">{{ Auth::user()->email }}</span>
										<span class="avatar">NR<span class="status busy"></span></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="userSettings">
										<div class="header-profile-actions">
											<div class="header-user-profile">
												<div class="header-user">
													<img src="assets/img/user11.png" alt="Medical Dashboards" />
												</div>
												<h5>Nélson Romyo</h5>
												<p>Admin</p>
											</div>
											<a href="hospital-add-doctor.html"><i class="icon-user1"></i> My Profile</a>
											<a href="account-settings.html"><i class="icon-settings1"></i> Account Settings</a>
											<a href="hospital-reviews.html"><i class="icon-activity"></i> Activity Logs</a>
											<a href="{{ route('logout') }}"><i class="icon-log-out1"></i>
												Đăng xuất
											</a>
										</div>
									</div>
								</li>
							</ul>
							<!-- Header actions end -->

						</div>
					</div>
					<!-- Row end -->

				</div>
			</header>
			<!-- Header end -->

		<!-- *************
			************ Header section end *************
		************* -->


		<div class="container-fluid">


			<!-- Navigation start -->
			<nav class="navbar navbar-expand-lg custom-navbar">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#royalHospitalsNavbar"
					aria-controls="royalHospitalsNavbar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i></i>
						<i></i>
						<i></i>
					</span>
				</button>
				<div class="collapse navbar-collapse" id="royalHospitalsNavbar">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class="nav-link active-page" href="{{url('admin')}}">
								<i class="icon-devices_other nav-icon"></i>
								Trang chủ
							</a>
						</li>

						@php
						use App\Models\User;
					    @endphp
  
                        @if (Auth::user()->role == User::ROLE['STAFF'])
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-users nav-icon"></i>
								Phương tiện
							</a>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
								<li>
									<a class="dropdown-item" href="{{URL::to('/add-vehicle')}} ">Thêm mới</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{URL::to('all-vehicle')}}">Danh sách</a>
								</li>
								
									{{-- <a class="dropdown-item" href="error2.html">505</a> --}}
								</li>
							</ul>
						</li>
					
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-book-open nav-icon"></i>
								Khách hàng
							</a>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
								<li>
									<a class="dropdown-item" href="{{URL::to('/add-customer')}} ">Thêm mới</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{URL::to('all-customer')}}">Danh sách</a>
								</li>
								
									{{-- <a class="dropdown-item" href="error2.html">505</a> --}}
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-users nav-icon"></i>
							     Lịch sử gửi xe
							</a>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
								<li>
									<a class="dropdown-item" href="{{URL::to('/add-log')}} ">Thêm mới</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{URL::to('all-log')}}">Danh sách</a>
							</ul>
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-users nav-icon"></i>
							     Đặt chỗ
							</a>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
								<li>
									<a class="dropdown-item" href="{{URL::to('/add-reservation')}} ">Thêm mới</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{URL::to('all-reservation')}}">Danh sách</a>
							</ul>
						</li>
	                    @endif
						
						@if (Auth::user()->role == User::ROLE['ADMIN'])
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-users nav-icon"></i>
								Phương tiện
							</a>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
								<li>
									<a class="dropdown-item" href="{{URL::to('/add-vehicle')}} ">Thêm mới</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{URL::to('all-vehicle')}}">Danh sách</a>
								</li>
								
									{{-- <a class="dropdown-item" href="error2.html">505</a> --}}
								</li>
							</ul>
						</li>
					
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-book-open nav-icon"></i>
								Khách hàng
							</a>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
								<li>
									<a class="dropdown-item" href="{{URL::to('/add-customer')}} ">Thêm mới</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{URL::to('all-customer')}}">Danh sách</a>
								</li>
								
									{{-- <a class="dropdown-item" href="error2.html">505</a> --}}
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-users nav-icon"></i>
							     Lịch sử gửi xe
							</a>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
								<li>
									<a class="dropdown-item" href="{{URL::to('/add-log')}} ">Thêm mới</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{URL::to('all-log')}}">Danh sách</a>
							</ul>
						</li>
						
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-users nav-icon"></i>
							     Đặt chỗ
							</a>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
								<li>
									<a class="dropdown-item" href="{{URL::to('/add-reservation')}} ">Thêm mới</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{URL::to('all-reservation')}}">Danh sách</a>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="doctoRs" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-users nav-icon"></i>
							     Phản hồi
							</a>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
								
								<li>
									<a class="dropdown-item" href="{{URL::to('all-contact')}}">Danh sách</a>
							</ul>
						</li>
							
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="loginDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-alert-triangle nav-icon"></i>
								Người dùng
							</a>
							<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="loginDropdown">
								<li>
									<a class="dropdown-item" href="{{URL::to('/add-user')}} ">Thêm mới</a>
								</li>
								<li>
									<a class="dropdown-item" href="{{URL::to('all-user')}}">Danh sách</a>
								</li>
								
									{{-- <a class="dropdown-item" href="error2.html">505</a> --}}
								</li>
							</ul>
						</li>
						@endif	
					</ul>
				</div>
			</nav>
			<!-- Navigation end -->


			<!-- *************
				************ Main container start *************
			************* -->
			@yield('main-container')
			<!-- *************
				************ Main container end *************
			************* -->

			<footer class="main-footer">quanlybaidoxe</footer>

		</div>

		<!-- *************
			************ Required JavaScript Files *************
		************* -->
		<!-- Required jQuery first, then Bootstrap Bundle JS -->
		<script src="{{asset('assets')}}/js/jquery.min.js"></script>
		<script src="{{asset('assets')}}/js/bootstrap.bundle.min.js"></script>
		<script src="{{asset('assets')}}/js/moment.js"></script>


		<!-- *************
			************ Vendor Js Files *************
		************* -->

		<!-- Apex Charts -->
		<script src="{{asset('assets')}}/vendor/apex/apexcharts.min.js"></script>
		<script src="{{asset('assets')}}/vendor/apex/examples/mixed/hospital-line-column-graph.js"></script>
		<script src="{{asset('assets')}}/vendor/apex/examples/mixed/hospital-line-area-graph.js"></script>
		<script src="{{asset('assets')}}/vendor/apex/examples/bar/hospital-patients-by-age.js"></script>

		<!-- Rating JS -->
		<script src="{{asset('assets')}}/vendor/rating/raty.js"></script>
		<script src="{{asset('assets')}}/vendor/rating/raty-custom.js"></script>

		<!-- Main Js Required -->
		<script src="{{asset('assets')}}/js/main.js"></script>

	</body>

</html>