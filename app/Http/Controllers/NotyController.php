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
        if (Auth::guest())
        {
            return view('home');
        }
        else
        {
            $hour = DB::table('noty')->find(1);
            $notyjson = json_encode($hour);
            return $notyjson;
        }
    }
}
