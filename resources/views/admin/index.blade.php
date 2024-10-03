@extends('admin.master')
@section('title','trangchu')

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
						<img src="assets/img/award.svg" alt="Hospital Dashboards"> Bãi đỗ xe chất lượng
					</div>
				</div>
				<!-- Page header end -->

				<!-- Content wrapper start -->
				<div class="content-wrapper">
					@yield('admin_content')
				</div>
				<!-- Content wrapper end -->


			</div>
			@endsection
			
			<!-- *************
				************ Main container end *************


			