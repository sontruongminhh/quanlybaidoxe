@extends('admin.master')
@section('title','trang chu')

			<!-- *************
				************ Main container start *************
			************* -->
			@section('main-container')
			
			<div class="main-container">


				<!-- Page header start -->
				<div class="page-header">
					<ol class="breadcrumb">
						<li class="breadcrumb-item active">Trang Quản Trị</li>
					</ol>
					<div class="site-award">
						<img src="{{ asset('assets/img/award.svg') }}" alt="Hospital Dashboards"> Bãi đỗ xe chất lượng
					</div>
					
				</div>
				<!-- Page header end -->

				<!-- Content wrapper start -->
				<div class="content-wrapper">	
					@yield('admin_content')
					<div class="main-container">
						<!-- Content wrapper start -->
						<div class="content-wrapper">
							<!-- Row start -->
							<div class="container mt-4">
								<div class="row mb-4">
									<div class="col-12">
										<form method="GET" action="{{ route('admin') }}" class="d-flex justify-content-end">
											<input type="date" name="date" class="form-control w-auto me-2" value="{{ $date }}">
											<button type="submit" class="btn btn-primary">Lọc</button>
										</form>
									</div>
								</div>
								<!-- Thống kê -->
								<div class="row gutters">
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="hospital-tiles">
											<p>Tổng số xe hôm nay</p>
											<h2>{{ $totalVehiclesToday }}</h2>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="hospital-tiles">
											<p>Tổng số xe hiện tại trong bãi</p>
											<h2>{{ $totalVehiclesInParking }}</h2>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="hospital-tiles">
											<p>Tổng số khách hàng</p>
											<h2>{{ $totalCustomers }}</h2>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="hospital-tiles">
											<p>Phản hồi đã xử lý</p>
											<h2>{{ $feedbackResolved }}</h2>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="hospital-tiles">
											<p>Phản hồi đang chờ</p>
											<h2>{{ $feedbackPending }}</h2>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="hospital-tiles">
											<p>Lịch đặt đang chờ duyệt</p>
											<h2>{{ $reservationPendingToday }}</h2>
										</div>
									</div>
									<div class="col-lg-3 col-sm-6 col-12">
										<div class="hospital-tiles">
											<p>Lịch đặt đã duyệt</p>
											<h2>{{ $reservationResolvedToday }}</h2>
										</div>
									</div>
								</div>
							</div>													
							<!-- Row end -->
							 <!-- Row start -->
							 <div class="row gutters">
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="card">
										<div class="card-header">
											<div class="card-title">Số xe trong bãi</div>
										</div>
										<div class="card-body">
											<div id="hospital-line-column-graph"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="card">
										<div class="card-header">
											<div class="card-title">Số khách hàng</div>
										</div>
										<div class="card-body">
											<div id="hospital-line-area-graph"></div>
										</div>
									</div>
								</div>
							</div>
							<!-- Row end -->
					
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-sm-12 col-12">
									<div class="card">
										<div class="card-header">
											<div class="card-title">Số phản hồi</div>
										</div>
										<div class="card-body">
											<div id="hospital-patients-by-age"></div>
										</div>
									</div>
								</div>
							</div>
							<!-- Row end -->
						</div>
						<!-- Content wrapper end -->
					</div>
					
				</div>
				<!-- Content wrapper end -->


			</div>	
			@endsection
			
			<!-- *************
				************ Main container end *************


			