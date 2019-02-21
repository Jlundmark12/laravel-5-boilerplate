<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Orders_Us;
use App\Calendar;


class CalendarController extends Controller
{
    public function index()
    {
     //   $orders= Calendar::with('CalendarSales')->limit(10);

     //   $grouped=$orders->groupBy('month_name');

        $years=Calendar::with('CalendarSales')->limit(100)->get();
       $year= $years->map(function ($year){return $year;});
return $year;
      //  $months=$years->groupBy('month_name');
//        $months=array_map(function($year){
//            return $year->calendar_sales->order_total;
//        },$years);
      //  return $orders;
       // return json_encode($grouped);


        }

//    $orders=Calendar::all();
//$orders=$orders->CalendarSales;
//    return $this->take($orders);
//       // return $orders->sortBy('calendar_date',0,true)->values();
//    }
//    public function take($orders){
//        $grouped= $orders->groupBy('calendar_year');
//      //  $groupm=$grouped->groupBy('month_name');
////    $grouped_ids=$grouped->pluck('id');
//    return $grouped;
       // return $this->loser($grouped);
   // }
//    public function loser($grouped){
//      //  $grouped= $orders->groupBy('calendar_year');
//        $groupm=$grouped->having('month_name');
////    $grouped_ids=$grouped->pluck('id');
//        return $groupm;
//    }
}
//
//

////  $calendar_sales= Calendar::with('CalendarSales')->where('calendar_year','=','2019')->get();
////     $calendar_sales= Calendar::with('CalendarSales')->where('calendar_year','=','2019')->select(['month_name','calendar_year'])->get();
////good       $calendar_sales= Calendar::where('calendar_year','=','2019')->select(['month_name','calendar_year','calendar_date'])->get();
////    $calendar_sales=Orders_Us::pluck('order_total');
//$calendar_sales=Calendar::with('CalendarSales')->limit(10)->get();
//$totals=$calendar_sales->pluck($calendar_sales->order_total);
////  $calendar_sales=$calendar_sales
////    $calendar_sales=$calendar_sales->CalendarSales()->pluck('order_total');
////       $calendar_sales=$calendar_sales->groupBy('month_name');
////       $calendar_sales=$calendar_sales->shuffle();
////        $months=$calendar_sales->groupBy('month_name');
////   $months=$calendar_sales->sum('order_total');
