<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{--<meta http-equiv="refresh" content="10">--}}
    <link rel="shortcut icon" href="{{ asset('img/as.ico') }}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Alarm System</title>
    <!-- Styles -->

    <script src='js/jquery-3.2.1.min.js'></script>
    <script src='js/Chart.min.js'></script>
    <link href="css/appfunc.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/gauge.min.js"></script>
    <script src="js/jquery.scrollTo-1.4.3.1-min.js" type="text/javascript"></script>
    <link href="{{ asset('css/controlpanel.css') }}" rel="stylesheet">  
    <script type="text/javascript"> jQuery(document).ready(function() {jQuery.scrollTo('#pageHr',2000);}); </script>

</head>
<body>
<div id="header">
    <div class="center" id="headerc">
        <div class="middle">
            @yield('headerappfunc')
        </div>
    </div>
</div>
<div id="pageHr">
    <i><i>↓</i></i>
    <div class="charts-wrap">
            @yield('contentappfunc')
    </div>
    <div id="backmain">
        <form action="/home">
            <button type="submit" class="btn btn-primary">Вернуться в главное меню</button>
        </form>
    </div>
</div>

<!-- Scripts -->
<script src="js/appfunc.js"></script>
</body>
</html>
