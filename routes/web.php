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

// Главная страница для неавторизованных юзеров.
Route::get('/', function () {
    return view('logo');
});

/**
 * Админ часть
 */
Auth::routes();

// Информационные страницы.
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/temperature', 'HomeController@temperature')->name('temperature');
Route::get('/co', 'HomeController@co')->name('co');
Route::get('/monitoring', 'HomeController@monitoring')->name('monitoring');
Route::get('/warning', 'HomeController@warning')->name('warning');
Route::get('/addressees', 'HomeController@addressees')->name('addressees');
Route::resource('/addressees_resource','AddresseesController');
Route::get('/logout', 'HomeController@logout')->name('logout');
Route::get('/controlpanel', 'HomeController@control_panel')->name('control_panel');

// Управления Ардуино и системой безопасности.
Route::get('/startdemo','ArduinoController@start_demo');
Route::get('/stopdemo','ArduinoController@stop_demo');
Route::get('/starttemperature','ArduinoController@start_temperature');
Route::get('/stoptemperature','ArduinoController@stop_temperature');
Route::get('/startco','ArduinoController@start_co');
Route::get('/stopco','ArduinoController@stop_co');
Route::get('/startwarning','ArduinoController@start_warning');
Route::get('/stopwarning','ArduinoController@stop_warning');
Route::get('/start_email_notification','ArduinoController@start_email_notification');
Route::get('/stop_email_notification','ArduinoController@stop_email_notification');

/**
 * API JSON для авторизированных юзеров.
 */
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

