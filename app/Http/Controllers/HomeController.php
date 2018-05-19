<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Working as Working;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application temperature.
     *
     * @return \Illuminate\Http\Response
     */
    public function temperature()
    {
        return view('temperature');
    }

    /**
     * Show the application co.
     *
     * @return \Illuminate\Http\Response
     */
    public function co()
    {
        return view('co');
    }

    /**
     * Show the application monitoring.
     *
     * @return \Illuminate\Http\Response
     */
    public function monitoring()
    {
        return view('monitoring');
    }

    /**
     * Show the application warning.
     *
     * @return \Illuminate\Http\Response
     */
    public function warning()
    {
        return view('warning');
    }

    /**
     * Show the application addressees.
     *
     * @return \Illuminate\Http\Response
     */
    public function addressees()
    {
        return view('addressees');
    }

    /**
     * Show the application logout.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        return view('logout');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function control_panel()
    {
        $working_all = Working::first();
        $demo_on = $working_all->demo_on;
        $co_on = $working_all->co_on;
        $temperature_on = $working_all->temperature_on;
        $warning_on = $working_all->warning_on;

        return view('controlpanel',compact('demo_on','co_on','temperature_on','warning_on'));
    }
}
