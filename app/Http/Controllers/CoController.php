<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CoController extends Controller
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
     * Last CO data in Database
     * @return string
     */
    public function co_json_now()
    {
        $hour = DB::table('co');

        $co_json = json_encode($hour
            ->where('created_at', '>=', Carbon::now('Asia/Almaty')
            ->subSeconds(1))
            ->get());

        return $co_json;
    }
}
