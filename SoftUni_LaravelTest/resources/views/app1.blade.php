<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    @yield('css')
</head>
<body>
    @if(Session::has('flash_message'))
        <h1>{{session('flash_message')}}</h1>
    @endif
    <div class="container">
        @yield('content')
        <a href="/about" class="btn btn-primary btn-n" style="margin-top: 25px;">About</a>
        <a href="/contact" class="btn btn-primary btn-n" style="margin-top: 25px;">Contact</a>
    </div>


</body>
</html>