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
    return view('temperature');
})->middleware('auth');

Route::get('/co', function () {
    return view('co');
})->middleware('auth');

Route::get('/monitoring', function () {
    return view('monitoring');
})->middleware('auth');

Route::get('/warning', function () {
    return view('warning');
})->middleware('auth');

Route::get('/addressees', function () {
    return view('addressees');
})->middleware('auth');

Route::get('/logoutmy', function () {
    return view('logoutmy');
})->middleware('auth');


// Температура в JSON формате все данные.
Route::get('/temperaturejson','MonitoringController@temperature_json');
Route::get('/cojson','MonitoringController@co_json');

// Температура в JSON формате за последнюю секунду.
Route::get('/temperaturejsonnow','TemperatureController@temperature_json_now');
Route::get('/cojsonnow','CoController@co_json_now');

// Температура в JSON формате данные за последнюю минуту (60 секунд).
Route::get('/temperaturejsonminute','MonitoringController@temperature_json_minute');
Route::get('/cojsonminute','MonitoringController@co_json_minute');

// Notification(Оповещение) в JSON формате данные за последнюю секунду.
Route::get('/notyjsonnow','NotificationController@noty_info');


// Управления датчиками и Ардуино.
Route::get('/controlpanel','ArduinoController@control_panel');
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


