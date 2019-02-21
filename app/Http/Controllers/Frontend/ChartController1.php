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
  //  protected $table = 'orders_us';


  public function index(){
      $orders=DB::connection('mysql2')->select("SELECT t.month_name,t.calendar_year,SUM(orders_us.order_total) as sale
FROM orders_us
JOIN calendar_table t on orders_us.calendar_id = t.id
GROUP BY t.calendar_year,t.month_name");

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
      //$months=collect($months)->groupBy($months);
      $count=count($orders);

     dd($months);

      $loop_index=0;
      $data = collect([]);
  //    dd($orders->month_name);
     // foreach ($orders as $order)
    while ($count>$loop_index)
      {
          $grouped=collect([
              'Months'=>$orders[$loop_index]["month_name"]
          ]);
          $loop_index ++;

      }
      dd($grouped);
//      $grouped=collect([
//          'Months'=>$orders['month_name']
//          ]);
//      dd($grouped);
     // $count=$grouped->count();
   //   dd($count);
     // $groupn=$grouped->mapToGroups('calendar_year',$grouped);

     // $gm=$grouped->groupBy('month_name');
      $data = collect([]);
      $loop_index=0;
foreach ($orders as $order)
{
    $data["month_names"]=$order->month_name;

    //$data[$loop_index]["year"]=$order->calendar_year;
    $loop_index++;
}
    dd($data);
     // dd($grouped);
      $data = collect();
      $loop_index=0;
      for ($count; $loop_index <= $count; $loop_index--) {
          // Could also be an array_push if using an array rather than a collection.
          $data->push($orders[$loop_index]->month_name);
          $loop_index++;

      }
;

//      $collection = $grouped->map(function ($array) {
//          return collect($array)->unique('month_name')->all();
//      });
//$months=collect([$months]);
      $chart = new NewSampleChart();
      $chart->labels($grouped);
    //  $chart->dataset('My dataset', 'bar', [1, 2, 3, 4]);
     // $chart->dataset('My dataset 2', 'bar', [4, 3, 2, 1])->color('#FF0000');
    //  $chart->labels(['2 days ago', 'Yesterday', 'Today']);
      $chart->dataset('My dataset', 'line', $data);

return view('frontend.charting.youtube', compact('chart'));
   //   return view('frontend.charting.youtube');
  }

}
