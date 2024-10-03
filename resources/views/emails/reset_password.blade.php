<!DOCTYPE html>
<html>
<head>
    <title>Lấy lại mật khẩu</title>
</head>
<body>
    <h2>Xin chào, {{ $user->name }}!</h2>
    <p>Bạn đã yêu cầu lấy lại mật khẩu. Nhấn vào liên kết bên dưới để đặt lại mật khẩu:</p>
    <a href="{{ url('/reset-password?token=' . $token) }}">Đặt lại mật khẩu</a>
    <p>Liên kết này sẽ hết hạn sau 60 phút.</p>
    <p>Nếu bạn không yêu cầu lấy lại mật khẩu, vui lòng bỏ qua email này.</p>
</body>
</html>
