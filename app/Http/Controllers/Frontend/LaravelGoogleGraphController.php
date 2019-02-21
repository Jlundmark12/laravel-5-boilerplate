<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;  //by using this statement we use this class for database operation  
use App\Calendar;
use App\orders_us;

class LaravelGoogleGraphController extends Controller
{
    function index ()
    {
        return view('frontend.charting.index');
//        $data = DB::table('orders_us','calendar_table')
//                ->select(
//                    DB::raw('')
//                )
    }
}
