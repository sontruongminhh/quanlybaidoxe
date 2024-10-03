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

    <script>
        function validateForm() {
            var email = document.forms["resetForm"]["Email"].value;
            if (email == "") {
                alert("Vui lòng nhập địa chỉ email.");
                return false;
            }
        }
    </script>

</head>

<body class="authentication">

    <!-- Container start -->
    <div class="container">

        <form name="resetForm" action="" method="post" onsubmit="return validateForm()">
            @csrf
            <div class="row justify-content-md-center">
                <div class="col-xl-5 col-md-6 col-sm-12">
                    <div class="login-screen">
                        <div class="login-box">
                            <a href="#" class="login-logo">
                                Lấy lại mật khẩu
                            </a>
                            <h5>Xin chào<br />Hãy nhập email.</h5>
                            <div class="form-group">
                                <input type="text" name="Email" class="form-control" placeholder="Email Address" />
                            </div>
                            <div class="actions">
                                <button type="submit" class="btn btn-primary">Xác nhận</button>
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
