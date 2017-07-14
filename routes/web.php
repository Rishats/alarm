<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Лого вьюха.
Route::get('/', function () {
    
    return view('logo');
});


Route::get('/temperature', function () {
        if (Auth::guest())
        {
            return view('home');
        }
        else
        {
            return view('temperature');
        }
});

Route::get('/co', function () {
        if (Auth::guest())
        {
            return view('home');
        }
        else
        {
            return view('co');
        }
});

Route::get('/monitoring', function () {
        if (Auth::guest())
        {
            return view('home');
        }
        else
        {
            return view('monitoring');
        }
});

Route::get('/warning', function () {
        if (Auth::guest())
        {
            return view('home');
        }
        else
        {
            return view('warning');
        }
});


Route::get('/addressees', function () {
        if (Auth::guest())
        {
            return view('home');
        }
        else
        {
            return view('addressees');
        }
});

Route::get('/logoutmy', function () {
        if (Auth::guest())
        {
            return view('home');
        }
        else
        {
            return view('logoutmy');
        }
});


// Температура в JSON формате все данные.
Route::get('/temperaturejson','MonitoringController@temperaturejson');
Route::get('/cojson','MonitoringController@cojson');

// Температура в JSON формате за последнюю секунду.
Route::get('/temperaturejsonnow','TemperatureController@temperaturejsonnow');
Route::get('/cojsonnow','CoController@cojsonnow');

// Температура в JSON формате данные за последнюю минуту (60 секунд).
Route::get('/temperaturejsonminute','MonitoringController@temperaturejsonminute');
Route::get('/cojsonminute','MonitoringController@cojsonminute');


// Управления датчиками и Ардуино.
Route::get('/controlpanel','ArduinoController@controlpanel');
Route::get('/startdemo','ArduinoController@start_demo');
Route::get('/stopdemo','ArduinoController@stop_demo');
Route::get('/starttemperature','ArduinoController@start_temperature');
Route::get('/stoptemperature','ArduinoController@stop_temperature');
Route::get('/startco','ArduinoController@start_co');
Route::get('/stopco','ArduinoController@stop_co');
Route::get('/startwarning','ArduinoController@start_warning');
Route::get('/stopwarning','ArduinoController@stop_warning');


// Админ панель
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

