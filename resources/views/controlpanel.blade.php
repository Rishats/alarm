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
    <link rel='stylesheet prefetch' href="{{ asset('css/font-awesome.min.css') }}">
    <link rel='stylesheet prefetch' href="{{ asset('css/working.css') }}">
    <script type="text/javascript"> jQuery(document).ready(function() {jQuery.scrollTo('#pageHr',2000);}); </script>

</head>
<body>
<div id="header">
    <div class="center" id="headerc">
        <div class="middle">
            <h1>Панель управления Arduino</h1>
            <p>Alarm System</p>
        </div>
    </div>
</div>
<div id="pageHr">
    <i><i>↓</i></i>
    <div class="charts-wrap">
    <div class="popup">
</div>
<div id="controlpanelmain">
<img src="img/arduinopu.png" alt="Arduino Logo" />
</div>
<div id="controlpanelmain">
<div id="controlpanel">
    	<h4>Демо датчики </h4>
    	<div class="alert alert-success fade in">
        <strong>Рандом!</strong> Запустить рандомные данные в систему.
    	</div>
      <div class="buttons_left">
    	<form action="/startdemo">
  	    <input type="submit" class="btn btn-success" value="Запустить">
  	    </form>
        </div>
        <div class="buttons_right">
  	    <form action="/stopdemo">
  	    <input type="submit" class="btn btn-warning" value="Приостановить">
  	    </form>
        </div>
        @if($demo_on == 1)
          <div class="area">⚠ Запущено</div>
        @else
          <div class="areano">⚠ Остановлено</div>
        @endif
        <hr style="width: 100%">
	      <div class="alert alert-info fade in">
        <h4>Датчик температуры</h4>
	        <strong>Запуск датчика температуры</strong>
	      </div>
        <div class="buttons_left">
	      <form action="/starttemperature">
  	    <input type="submit" class="btn btn-success" value="Запустить">
  	    </form>
        </div>
        <div class="buttons_right">
  	    <form action="/stoptemperature">
  	    <input type="submit" class="btn btn-warning" value="Приостановить">
  	    </form>
        </div>
        @if($temperature_on == 1)
          <div class="area">⚠ Запущено</div>
        @else
          <div class="areano">⚠ Остановлено</div>
        @endif
        <hr style="width: 100%">
	      <!-- Rounded switch -->
	      <div class="alert alert-info fade in">
        <h4>Датчик CO </h4>
	      <strong>Запуск датчика CO</strong>
	      </div>
        <div class="buttons_left">
	      <form action="/startco">
  	    <input type="submit" class="btn btn-success" value="Запустить">
  	    </form>
        </div>
        <div class="buttons_right">
  	    <form action="/stopco">
  	    <input type="submit" class="btn btn-warning" value="Приостановить">
  	    </form>
        </div>
        @if($co_on == 1)
          <div class="area">⚠ Запущено</div>
        @else
          <div class="areano">⚠ Остановлено</div>
        @endif
        <hr style="width: 100%">
	    <!-- Rounded switch -->
	    <h4>Уведомления </h4>
        <div class="alert alert-danger fade in">
            <strong>Запуск системы оповещений на сайте.</strong>
        </div>
        <div class="buttons_left">
        <form action="/startwarning">
  	    <input type="submit" class="btn btn-success" value="Запустить">
  	    </form>
        </div>
        <div class="buttons_right">
  	    <form action="/stopwarning">
  	    <input type="submit" class="btn btn-warning" value="Приостановить">
  	    </form>
        </div>
        <hr style="width: 100%">
        @if($warning_on == 1)
          <div class="area">⚠ Запущено</div>
        @else
          <div class="areano">⚠ Остановлено</div>
        @endif
        </br></br>
	</form>
	</br>
	</div>
    </div>        
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
