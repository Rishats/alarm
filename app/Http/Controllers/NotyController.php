<?php

namespace App\Http\Controllers;

use App\r;
use Illuminate\Http\Request;
use Auth;
use DB;
use Carbon\Carbon;


class NotyController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * JSON дата - включать Noty или нет.
     * @return array|string
     */
    public function noty_info()
    {
        // Провера включены ли оповещения на сайте.
        $working = DB::table('working')->get();
        $work = $working->first()->warning_on;
        if ($work == 1) {
            // CO array за последнюю секунду
            $co = DB::table('co');
            $co_array = [];
            $co_obj = $co
                ->where('created_at', '>=', Carbon::now('Asia/Almaty')
                    ->subSeconds(1))
                ->get();

            foreach ($co_obj as $key => $value) {
                foreach ($value as $key => $value) {
                    if($key == 'co') {
                        $co_array['co'] = $value;
                    }
                }
            }

            // Temperature array за последнюю секунду
            $temperature = DB::table('temperature');
            $temperature_array = [];
            $temperature_obj = $temperature
                ->where('created_at', '>=', Carbon::now('Asia/Almaty')
                ->subSeconds(1))
                ->get();

            foreach ($temperature_obj as $key => $value) {
                foreach ($value as $key => $value) {
                    if($key == 'temperature') {
                        $temperature_array['temperature'] = $value;
                    }
                }
            }



            // Глобальные данные для варнингов на сайте.
            $co_temperature_noty_json_data = array_merge($co_array, $temperature_array);

            return json_encode($co_temperature_noty_json_data);
        } else {
            $errors = ['[Offline] Noty Отключена в панели','Empty'];
            return $errors;
        }
    }

}
