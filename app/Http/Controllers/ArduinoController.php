<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Working as Working;
use Auth;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\DB;

class ArduinoController extends Controller
{
    public function controlpanel()
    {
        if (Auth::guest()){
            return view('home');
        }
        else{
        	$working_all = Working::first();
        	$demo_on = $working_all->demo_on;
        	$co_on = $working_all->co_on;
        	$temperature_on = $working_all->temperature_on;
        	$warning_on = $working_all->warning_on;
        	return view('controlpanel',compact('demo_on','co_on','temperature_on','warning_on'));
        }
    }
    public function start_demo()
    {
        if (Auth::guest()){
            return view('home');
        }
        else{
            Working::where('id', 1)->update(['demo_on' => 1]);
            while($demo_on = DB::table('working')->select('demo_on')->get()->first()->demo_on == 1){
                $randomco = random_int(1, 1023);
                $randomtemperature = random_int(1, 50);
                DB::table('co')->insert(
                    ['co' => $randomco]
                );
                DB::table('temperature')->insert(
                    ['temperature' => $randomtemperature]
                );
                sleep(1);
            }
            return redirect('/controlpanel');
        }
    }
    public function stop_demo()
    {
        if (Auth::guest()){
            return view('home');        
        }
        else{
        	Working::where('id', 1)->update(['demo_on' => 0]);
            return redirect('/controlpanel');
        }
    }
    public function start_temperature()
    {
        if (Auth::guest()){
            return view('home');
        }
        else{
            Working::where('id', 1)->update(['temperature_on' => 1]);
            return redirect('/controlpanel');
        }
    }
    public function stop_temperature()
    {
        if (Auth::guest()){
            return view('home');        
        }
        else{
            Working::where('id', 1)->update(['temperature_on' => 0]);
            return redirect('/controlpanel');
        }
    }
    public function start_co()
    {
        if (Auth::guest()){
            return view('home');
        }
        else{
            Working::where('id', 1)->update(['co_on' => 1]);
            return redirect('/controlpanel');
        }
    }
    public function stop_co()
    {
        if (Auth::guest()){
            return view('home');        
        }
        else{
            Working::where('id', 1)->update(['co_on' => 0]);
            return redirect('/controlpanel');
        }
    }
    public function start_warning()
    {
        if (Auth::guest()){
            return view('home');
        }        
        else{
            Working::where('id', 1)->update(['warning_on' => 1]);
            return redirect('/controlpanel');
        }
    }
    public function stop_warning()
    {
        if (Auth::guest()){
            return view('home');        
        }
        else{
            Working::where('id', 1)->update(['warning_on' => 0]);
            return redirect('/controlpanel');
        }
    }
}
