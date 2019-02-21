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
WHERE t.calendar_year > 2016
GROUP BY t.calendar_year,t.month_name");
$months=([]);
    $collection=collect($orders);

  //  dd($collection->pluck('month_name'));
//    dd($collection->where('month_name','January'));
   $month_grouping=$collection->groupBy('month_name');
$months=['Months'=>$collection->groupBy('month_name')];
$months=collect($months);
   //   $month_names=$months->pluck('sale','calendar_year');
      dd($months);
dd($months);
$plucking=$months['Months']->pluck('calendar_year','sale');
//dd($plucking);
$data=collect([]);


foreach ($months as $month){
    //$data=[
    //  'month'=>$month->month_name,
      dd($month->pluck('month_name'));
    //];

}
      dd($data);
     // $years=$collection->groupBy('calendar_year');
     // $months=$years->pluck('month_name');
//$years=$months->slice('calendar_year');
//dd($years,$months);

dd(json_encode($months));
$orders=$orders->map(function ($order){
    return [
        'year' =>$order['calendar_year'] ,
        'value'=> $order['sale']
    ];
}

);
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
      $chart->labels($orders->calendar_year);
     // $chart->labels($years);
      $chart->dataset('values', 'column',$orders->month_name);
     // $chart->dataset('values', 'bar', $values)->color('#FF0000');
    //  $chart->labels(['2 days ago', 'Yesterday', 'Today']);
      //$chart->dataset('My dataset', 'line', [1,2,3,4,5,6]);

return view('frontend.charting.youtube', compact('chart'));
   //   return view('frontend.charting.youtube');
  }

}
