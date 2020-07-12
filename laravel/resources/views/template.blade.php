<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Sistem Akademik</title>  
        
        <link href="{{ asset('../public/bootstrap-3.3.6/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset ('../public/css/style.css') }}" rel="stylesheet">
    </head>
    <body>
    <div class="container">
        @include('navbar')
        @yield('main')
        </div>
        @yield('footer')   
        <script src="{{ asset('../public/js/jquery_2_2_1.min.js') }}"></script>
        <script src="{{ asset('../public/bootstrap_3_3_6/js/bootstrap.min.js' ) }}"></script>
    </body>
</html>
