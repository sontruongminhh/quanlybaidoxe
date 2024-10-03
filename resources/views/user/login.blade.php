
<!doctype html>
<html lang="en">

	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta -->
		<meta name="description" content="Responsive Bootstrap Dashboards">
		<meta name="author" content="Bootstrap Gallery">
		<link rel="shortcut icon" href="assets/assets/img/favicon.svg" />

		<!-- Title -->
		<title> Login</title>

		<!-- *************
			************ Common Css Files *************
			************ -->
		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />

		<!-- Master CSS -->
		<link rel="stylesheet" href="assets/css/main.css" />
		<script>
			function validateForm() {
				var email = document.forms["resetForm"]["Email"].value;
				if (email == "") {
					alert("Vui lòng nhập đầy đủ thông tin.");
					return false;
				}
			}
		</script>

	</head>

	<body class="authentication">

		<!-- Container start -->
		<div class="container">
			<form action="{{ route('login_post') }}" method="post" >
				@csrf
				<div class="row justify-content-md-center">
					<div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
						<div class="login-screen">
							<div class="login-box">
								<a href="#" class="login-logo">
									Đăng nhập
								</a>
								<h5>Chào bạn<br />Đăng nhập bằng tài khoản</h5>
								<div class="form-group">
									<input type="Email " name="Email" required value="{{ old('Email') }}"  class="form-control" placeholder="Email Address" />
								</div>
								<div class="form-group">
									<input type="password" name="Password" required class="form-control" placeholder="Password" />
								</div>
								@error('error_login')
									<span class="text-danger text-center" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
								<div class="actions">
									<a href="{{url('forget')}}">Khôi phục mật khẩu</a>
									<button type="submit"  class="btn btn-info" >Đăng nhập</button>
								</div>
								<hr>
								<div class="m-0">	
									<span class="additional-link">Bạn chưa có tài khoản? <a href="{{url('register')}}"
											class="btn btn-secondary">Đăng ký</a></span>
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