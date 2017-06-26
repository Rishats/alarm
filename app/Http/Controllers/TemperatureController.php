<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TemperatureController extends Controller
{
    public function temperaturejsonnow()
    {
        if (Auth::guest())
        {
            return view('home');
        }
        else
        {
            $hour = DB::table('temperature')
                ->where('created_at', '>=', Carbon::now('Asia/Almaty')->subSeconds(1));
            $temeraturejson = json_encode($hour->get());
            return $temeraturejson;
        }
    }
}