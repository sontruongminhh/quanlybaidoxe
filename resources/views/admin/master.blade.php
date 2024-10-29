<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap Dashboards">
		<meta name="author" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="{{asset('assets')}}/img/favicon.svg" />

		<!-- Title -->
		<title>@yield('title')</title>


		<!-- *************
			************ Common Css Files *************
			************ -->
		<!-- Bootstrap css -->
		<link rel="stylesheet" href="{{asset('assets')}}/css/bootstrap.min.css">

		<!-- Icomoon Font Icons css -->
		<link rel="stylesheet" href="fonts/style.css">

		<!-- Main css -->
		<link rel="stylesheet" href="{{asset('assets')}}/css/main.min.css">


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
						<a href="index.html" class="logo">ADMIN<span></span></a>
					</div>
					<div class="col-sm-8 col-8">

						<!-- Header actions start -->
						<ul class="header-actions">
							<li class="dropdown d-none d-sm-block">
								<a href="#" class="contact">
									<i class="icon-phone"></i> 012 345 6789
								</a>
							</li>
							
							<li class="dropdown">
								<a href="#" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
									{{-- <span class="user-name">{{ Auth::user()->email }}</span> --}}
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

						{{-- @php
						use App\Models\User;
					@endphp --}}

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
							<a class="nav-link dropdown-toggle" href="#" id="formsDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-edit1 nav-icon"></i>
								Lịch sử gửi xe
							</a>
							<ul class="dropdown-menu" aria-labelledby="formsDropdown">
								<li>
									<a class="dropdown-item" href="datepickers.html">Datepickers</a>
								</li>
								<li>
									<a class="dropdown-item" href="wizard.html">Wizards</a>
								</li>
								<li>
									<a class="dropdown-item" href="bs-select.html">BS Select</a>
								</li>
								<li>
									<a class="dropdown-toggle sub-nav-link" href="#" id="customDropdown" role="button"
										data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										Custom Forms
									</a>
									<ul class="dropdown-menu dropdown-menu-right" aria-labelledby="customDropdown">
										<li>
											<a class="dropdown-item" href="contact.html">Contact Form</a>
										</li>
										<li>
											<a class="dropdown-item" href="contact2.html">Contact Form #2</a>
										</li>
										<li>
											<a class="dropdown-item" href="contact3.html">Contact Form #3</a>
										</li>
										<li>
											<a class="dropdown-item" href="contact4.html">Contact Form #4</a>
										</li>
									</ul>
								</li>
								<li>
									<a class="dropdown-item" href="form-inputs.html">Form Inputs</a>
								</li>
								<li>
									<a class="dropdown-item" href="input-groups.html">Input Groups</a>
								</li>
								<li>
									<a class="dropdown-item" href="check-radio.html">Check Boxes</a>
								</li>
								<li>
									<a class="dropdown-item" href="range-sliders.html">Range Sliders</a>
								</li>
								<li>
									<a class="dropdown-item" href="editor.html">Editor</a>
								</li>
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
							<a class="nav-link dropdown-toggle" href="#" id="tablesDropdown" role="button" data-toggle="dropdown"
								aria-haspopup="true" aria-expanded="false">
								<i class="icon-border_all nav-icon"></i>
								Báo cáo
							</a>
							<ul class="dropdown-menu" aria-labelledby="tablesDropdown">
								<li>
									<a class="dropdown-item" href="bs-tables.html">Bootstrap Tables</a>
								</li>
								<li>
									<a class="dropdown-item" href="data-tables.html">Data Tables</a>
								</li>
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