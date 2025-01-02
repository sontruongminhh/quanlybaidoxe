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

		<!-- Title -->
		<title>Đăng ký</title>

		<!-- Common Css Files -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>

	<body class="authentication">

		<!-- Container start -->
		<div class="container">

			<form action="{{ route('register.post') }}" method="post">
			@csrf
				<div class="row justify-content-md-center">
					<div class="col-xl-5 col-md-6 col-sm-12">
						<div class="login-screen">	
							<div class="login-box">
								<a href="#" class="login-logo">
									Đăng ký
								</a>
								<h5>Xin chào<br />Hãy tạo cho mình một tài khoản.</h5>
								
								<div class="form-group">
									<input type="text" name="name" class="form-control" placeholder="Họ và tên" value="{{ old('name') }}" />
									<div style="color:red">{{ $errors->first('name') }}</div>
								</div>

								<div class="form-group">
									<input type="text" name="Email" class="form-control" placeholder="Email" value="{{ old('Email') }}" />
									<div style="color:red">{{ $errors->first('Email') }}</div>
								</div>

								<div class="form-group">
									<input type="text" name="phone" class="form-control" placeholder="Số điện thoại" value="{{ old('phone') }}" />
									<div style="color:red">{{ $errors->first('phone') }}</div>
								</div>

								<div class="form-group">
									<input type="text" name="address" class="form-control" placeholder="Địa chỉ" value="{{ old('address') }}" />
									<div style="color:red">{{ $errors->first('address') }}</div>
								</div>

								<div class="form-group">
									<div class="input-group">
										<input type="password" name="Password" class="form-control" placeholder="Mật khẩu" />
									</div>
									<div style="color:red">{{ $errors->first('Password') }}</div>
								</div>

								<div class="form-group">
									<div class="input-group">
										<input type="password" name="Password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu" />
									</div>
								</div>

								@if(session('success'))
									<div class="alert alert-success">
										{{ session('success') }}
									</div>
								@endif

								<div class="actions">	
									<button type="submit" class="btn btn-primary">Đăng ký</button>
								</div>
								<hr>
								<div class="m-0">
									<span class="additional-link">Bạn đã có tài khoản? <a href="{{url('login')}}"
											class="btn btn-secondary">Đăng nhập</a></span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</form>

		</div>
		<!-- Container end -->

	</body>

</html>

