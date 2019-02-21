<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
//use charts;
use App\Http\Requests;
use App\Charts\NewSampleChart;
use App\Models\Auth\User;
class ChartController extends Controller
{
    protected $connection = 'mysql2';



  public function index(){
      $orders=DB::connection('mysql2')->select("SELECT t.month_name,t.calendar_year,SUM(orders_us.order_total) as sale
FROM orders_us
JOIN calendar_table t on orders_us.calendar_id = t.id
GROUP BY t.calendar_year,t.month_name");
      dd($orders);

//          $years=array_map(function($year){
//              //      return $order->month_name;
//              return $year->calendar_year;
//          },$orders);
//
//          $months=array_map(function($month){
//              return $month->month_name;
//
//          },$orders);
//
//          $values=array_map(function($value){
//              return $value->sale;
//
//          },$orders);
//dd($orders, $months,$years,$values);
      $chart = new NewSampleChart();
      $chart->labels( $years);
     // $chart->labels($years);
      $chart->dataset('values', 'column', $values);
     // $chart->dataset('values', 'bar', $values)->color('#FF0000');
    //  $chart->labels(['2 days ago', 'Yesterday', 'Today']);
      //$chart->dataset('My dataset', 'line', [1,2,3,4,5,6]);

return view('frontend.charting.youtube', compact('chart'));
   //   return view('frontend.charting.youtube');
  }

}
