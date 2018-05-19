<?php

namespace App\Http\Controllers;

use App\Working as Working;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\DB;

class ArduinoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    /**
     * Start random data, which record random data in to Database.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function start_demo()
    {
        Working::where('id', 1)->update(['demo_on' => 1]);

        while($demo_on = DB::table('working')->select('demo_on')->get()->first()->demo_on == 1){
            $random_co = random_int(1, 1023);
            $random_temperature = random_int(1, 50);
            DB::table('co')->insert(
                [
                    'co' => $random_co,
                    'created_at' => Carbon::now('Asia/Almaty'),
                    'updated_at' => Carbon::now('Asia/Almaty')
                ]
            );

            DB::table('temperature')->insert(
                [
                 'temperature' => $random_temperature,
                 'created_at' => Carbon::now('Asia/Almaty'),
                 'updated_at' => Carbon::now('Asia/Almaty')
                ]
            );

            sleep(1);
        }

        return redirect('/controlpanel');

    }

    /**
     * Stop record random data in to Database
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function stop_demo()
    {
        Working::where('id', 1)->update(['demo_on' => 0]);

        return redirect('/controlpanel');
    }

    /**
     * Start Temperature data recording if data exist.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function start_temperature()
    {
        Working::where('id', 1)->update(['temperature_on' => 1]);

        return redirect('/controlpanel');
    }

    /**
     * Stop Temperature data recording.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function stop_temperature()
    {
        Working::where('id', 1)->update(['temperature_on' => 0]);

        return redirect('/controlpanel');
    }

    /**
     * Start Co data recording if data exist.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function start_co()
    {
        Working::where('id', 1)->update(['co_on' => 1]);

        return redirect('/controlpanel');
    }

    /**
     * Stop Temperature data recording.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function stop_co()
    {
        Working::where('id', 1)->update(['co_on' => 0]);

        return redirect('/controlpanel');
    }

    /**
     * Start Warning alarm.
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function start_warning()
    {
        Working::where('id', 1)->update(['warning_on' => 1]);

        return redirect('/controlpanel');
    }

    /**
     * Stop Warning alarm
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function stop_warning()
    {
        Working::where('id', 1)->update(['warning_on' => 0]);

        return redirect('/controlpanel');
    }
}
