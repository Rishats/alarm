<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use App\Noty;

class CoController extends Controller
{
    public function cojsonnow()
    {
        if (Auth::guest()) {
            return view('home');
        } else {
            $hour = DB::table('co');

            $co_json = json_encode($hour
                ->where('created_at', '>=', Carbon::now('Asia/Almaty')
                ->subSeconds(1))
                ->get());
            return $co_json;
        }
    }
}
