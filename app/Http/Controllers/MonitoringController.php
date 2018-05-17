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
     * All temperature data in Database
     * @return string
     */
    public function temperature_json()
    {
        $temperature_json = json_encode(Temperature::all());

        return $temperature_json;
    }

    /**
     * All CO data in Database
     * @return string
     */
    public function co_json()
    {
        $co_json = json_encode(Co::all());

        return $co_json;
    }

    /**
     * Last 60 seconds Temperature data in Database
     * @return string
     */
    public function temperature_json_minute()
    {
        $hour = DB::table('temperature')
            ->where('created_at', '>=', Carbon::now('Asia/Almaty')->subSeconds(60));
        $temerature_json = json_encode($hour->get());

        return $temerature_json;
    }

    /**
     * Last 60 seconds CO data in Database
     * @return string
     */
    public function co_json_minute()
    {
        $hour = DB::table('co')
            ->where('created_at', '>=', Carbon::now('Asia/Almaty')->subSeconds(60));
        $co_json = json_encode($hour->get());

        return $co_json;
    }
}
