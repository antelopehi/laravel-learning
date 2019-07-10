<!DOCTYPE html>
<html>
<head>
    <title>laravel練習(公告系統)</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/css/bootstrap.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.staticfile.org/popper.js/1.12.5/umd/popper.min.js"></script>
    <script src="https://cdn.staticfile.org/twitter-bootstrap/4.1.0/js/bootstrap.min.js"></script>
    @yield('head')

</head>
<body>

<div class="container">
    @if(!empty(session('msg')))
        <div class="alert {{session('alertType')??'alert-secondary'}}" role="alert">
            {{session('msg')??""}}
        </div>
    @endif

    @yield('content')
</div>

@yield('footScript')
</body>
</html>