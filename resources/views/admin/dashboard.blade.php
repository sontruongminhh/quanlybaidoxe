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
							<div class="row gutters">
								<div class="col-lg-2 col-sm-4 col-12">
									<div class="hospital-tiles">
										<img src="assets/img/hospital/appointment.svg" alt="Quality Dashboards" />
										<p>Appointments</p>
										<h2>49</h2>
									</div>
								</div>
								<div class="col-lg-2 col-sm-4 col-12">
									<div class="hospital-tiles">
										<img src="assets/img/hospital/patient.svg" alt="Best Dashboards" />
										<p>New Patients</p>
										<h2>60</h2>
									</div>
								</div>
								<div class="col-lg-2 col-sm-4 col-12">
									<div class="hospital-tiles">
										<img src="assets/img/hospital/operation.svg" alt="Best Dashboards" />
										<p>Operations</p>
										<h2>21</h2>
									</div>
								</div>
								<div class="col-lg-2 col-sm-4 col-12">
									<div class="hospital-tiles">
										<img src="assets/img/hospital/doctor.svg" alt="Top Dashboards" />
										<p>Doctors</p>
										<h2>75</h2>
									</div>
								</div>
								<div class="col-lg-2 col-sm-4 col-12">
									<div class="hospital-tiles">
										<img src="assets/img/hospital/staff.svg" alt="Top Dashboards" />
										<p>Staff</p>
										<h2>253</h2>
									</div>
								</div>
								<div class="col-lg-2 col-sm-4 col-12">
									<div class="hospital-tiles">
										<img src="assets/img/hospital/revenue.svg" alt="Top Dashboards" />
										<p>Earnings</p>
										<h2>$900k</h2>
									</div>
								</div>
							</div>
							<!-- Row end -->
		
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="card">
										<div class="card-header">
											<div class="card-title">Patients</div>
										</div>
										<div class="card-body">
											<div id="hospital-line-column-graph"></div>
										</div>
									</div>
								</div>
								<div class="col-lg-6 col-sm-12 col-12">
									<div class="card">
										<div class="card-header">
											<div class="card-title">Treatment Type</div>
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
											<div class="card-title">Patients by Age</div>
										</div>
										<div class="card-body">
											<div id="hospital-patients-by-age"></div>
										</div>
									</div>
								</div>
							</div>
							<!-- Row end -->
		
							<!-- Row start -->
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


			