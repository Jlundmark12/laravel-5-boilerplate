<?php

namespace App\Http\Controllers\Api;

use function GuzzleHttp\Promise\all;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders_Us;
use App\Calendar;
use App\Categories;
use Illuminate\Support\Facades\DB;


class OrdersUsController extends Controller

{

    public function index()
    {
     //   $orders= Orders_Us::limit(1500)->get();
//$orders=Orders_Us::with('rawquery')->get();

        $orders=DB::connection('mysql2')->select("SELECT t.month_name,t.calendar_year,SUM(orders_us.order_total) as sale
FROM orders_us
JOIN calendar_table t on orders_us.calendar_id = t.id
GROUP BY t.calendar_year,t.month_name");

//return $orders[0]['month_name'];

        $years=array_map(function($year){
      //      return $order->month_name;
            return $year->calendar_year;
       },$orders);
        $months=array_map(function($month){
                  return $month->month_name;

        },$orders);

        $values=array_map(function($value){
            return $value->sale;

        },$orders);
//dd($values,$years,$months);
//        return $orders;
        $grouped=collect($orders);
       $gm=$grouped->groupBy('month_name');
   //    $fil=$gm->filter('month_name','=','');
      // $yearsale=$gm->partition('calendar_year');
     //   $jackson=array_map($years, $months,$values);

    return response()->json(['year'=>$years, 'months'=>$months,'sale'=>$values]);
     //   return $gm;
    }

    public function newindex(){
        $orders=DB::connection('mysql2')->select("SELECT t.month_name,t.calendar_year,SUM(orders_us.order_total) as sale
FROM orders_us
JOIN calendar_table t on orders_us.calendar_id = t.id
GROUP BY t.calendar_year,t.month_name");

$grouped=collect([$orders->calendar_year,$orders->month_name,$orders->sale]);
//$filtered=$grouped->groupBy('calendar_year');
   //     $groupn=$grouped->mapToGroups('calendar_year',$grouped);
        dd($grouped);
        //return $orders;

    }
  //  public function monthlyorders()
  //  {
//        $orders= Orders_Us::take(30)->skip(30)->get();
//        $orders= Orders_Us::with('getMonthName')->get();
//        $orders= Orders_Us::with('getMonthName')->limit(100)->get();
 //      $dates= $orders->pluck('order_date');
       // $months = $orders->;





    //    return  $orders;

  //  }

}
