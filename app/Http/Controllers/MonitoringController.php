<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Co;
use App\Temperature;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MonitoringController extends Controller
{
    public function temperaturejson()
    {
        if (Auth::guest()) {
            return view('home');
        } else {
            $temperaturejson = json_encode(Temperature::all());
            return $temperaturejson;
        }
    }

    public function cojson()
    {
        if (Auth::guest()) {
            return view('home');
        } else {
            $cojson = json_encode(Co::all());
            return $cojson;
        }
    }

    public function temperaturejsonminute()
    {
        if (Auth::guest()) {
            return view('home');
        } else {
            $hour = DB::table('temperature')
                ->where('created_at', '>=', Carbon::now('Asia/Almaty')->subSeconds(60));
            $temeraturejson = json_encode($hour->get());
            return $temeraturejson;
        }
    }

    public function cojsonminute()
    {
        if (Auth::guest()) {
            return view('home');
        } else {
            $hour = DB::table('co')
                ->where('created_at', '>=', Carbon::now('Asia/Almaty')->subSeconds(60));
            $cojson = json_encode($hour->get());
            return $cojson;
        }

    }



}
