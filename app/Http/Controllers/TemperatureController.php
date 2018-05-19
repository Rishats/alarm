<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TemperatureController extends Controller
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
     * Return last record in DB.
     * Temperature now.
     *
     * @return String
     */
    public function temperature_json_now()
    {
        $hour = DB::table('temperature')
            ->where('created_at', '>=', Carbon::now('Asia/Almaty')->subSeconds(1));
        $temerature_json = json_encode($hour->get());

        return $temerature_json;
    }
}