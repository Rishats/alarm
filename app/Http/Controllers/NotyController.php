<?php

namespace App\Http\Controllers;

use App\r;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;



class NotyController extends Controller
{

    // JSON дата - включать Noty или нет.
    public function notyinfo()
    {
        if (Auth::guest()) {
            return view('home');
        } else {
            // Провера включены ли оповещения на сайте.
            $working = DB::table('working')->get();
            $work = $working->first()->warning_on;
            if ($work == 1) {
                // CO array за последнюю секунду
                $co = DB::table('co');
                $coarray = [];
                $coobj = $co
                    ->where('created_at', '>=', Carbon::now('Asia/Almaty')
                        ->subSeconds(1))
                    ->get();

                foreach ($coobj as $key => $value) {
                    foreach ($value as $key => $value) {
                        if($key == 'co') {
                            $coarray['co'] = $value;
                        }
                    }
                }

                // Temperature array за последнюю секунду
                $temperature = DB::table('temperature');
                $temperaturearray = [];
                $temperatureobj = $temperature
                    ->where('created_at', '>=', Carbon::now('Asia/Almaty')
                    ->subSeconds(1))
                    ->get();

                foreach ($temperatureobj as $key => $value) {
                    foreach ($value as $key => $value) {
                        if($key == 'temperature') {
                            $temperaturearray['temperature'] = $value;
                        }
                    }
                }



                // Глобальные данные для варнингов на сайте.
                $co_temperature_noty_json_data = array_merge($coarray, $temperaturearray);

                return json_encode($co_temperature_noty_json_data);
            } else {
                $errors = ['[Offline] Noty Отключена в панели','Empty'];
                return $errors;
            }
        }
    }
}
