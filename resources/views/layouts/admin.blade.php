<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <!-- Thêm các file CSS hoặc các thẻ style cần thiết -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <!-- Thêm các file JavaScript hoặc các thẻ script cần thiết -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
