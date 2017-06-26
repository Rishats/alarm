<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class CoController extends Controller
{
    public function cojsonnow()
    {
        if (Auth::guest())
        {
            return view('home');
        }
        else
        {
            $hour = DB::table('co')
                ->where('created_at', '>=', Carbon::now('Asia/Almaty')->subSeconds(1));
            $cojson = json_encode($hour->get());
            return $cojson;
        }
    }
}
