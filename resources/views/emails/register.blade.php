@component('mail::message')

<h3>Xin chào!</h3>

<p>Cảm ơn bạn đã đăng ký tài khoản. Vui lòng click vào link bên dưới để xác thực email của bạn:</p>

<p>
    <a href="{{ route('verify.email', ['token' => $user->remember_token]) }}">Click vào đây để xác thực tài khoản</a>
</p>

<p>Link này sẽ hết hạn sau 24 giờ.</p>

<p>Nếu bạn không thực hiện đăng ký tài khoản, vui lòng bỏ qua email này.</p>

@endcomponent