<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="refresh" content="10">
    <link rel="shortcut icon" href="{{ asset('img/as.ico') }}}">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Alarm System</title>
    <!-- Styles -->
    <script src="js/howler.js"></script>
    <script src="js/noty.js" type="text/javascript"></script>
    <link href="css/noty.css" rel="stylesheet">
    <script src='js/jquery-3.2.1.min.js'></script>
    <script src='js/Chart.min.js'></script>
    <link href="css/appfunc.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <script src="js/gauge.min.js"></script>
    <script src="js/jquery.scrollTo-1.4.3.1-min.js" type="text/javascript"></script>
    <script type="text/javascript"> jQuery(document).ready(function() {jQuery.scrollTo('#pageHr',2000);}); </script>

</head>
<body>
<div id="header">
    <div class="center" id="headerc">
        <div class="middle" id="scroll">
            <h1>Мониторинг</h1>
            <p>Alarm System</p>
        </div>
    </div>
</div>
<div id="pageHr">
    <i><i>↓</i></i>
    <div class="charts-wrap">
        <div class="chart" id="temperaturemonitoring1">
            <h1 id="textmonitoring">Датчик температуры.</h1>
            <canvas id="temperaturemonitoringchart1" width="400" height="400"></canvas>
        </div>
        <div class="chart" id="comonitoring1">
            <h1 id="textmonitoring2">Датчик CO.</h1>
            <canvas id="comonitoringchart1" width="400" height="400"></canvas>
        </div>
    </div>
    <div id="backmain">
        <form action="/home">
            <button type="submit" class="btn btn-primary">Вернуться в главное меню</button>
        </form>
    </div>

    <script type="text/javascript" src="js/monitoringtemperature.js"></script>
    <script type="text/javascript" src="js/monitoringco.js"></script>
</div>

<!-- Scripts -->
<script src="js/appfunc.js"></script>
<script src="js/noty_project.js" type="text/javascript"></script>
</body>
</html>

