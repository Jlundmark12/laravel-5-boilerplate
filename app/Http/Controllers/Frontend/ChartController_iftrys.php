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
      $orders=DB::connection('mysql2')->select("SELECT t.month_name,t.month_num,t.calendar_year,SUM(orders_us.order_total) as sale
FROM orders_us
JOIN calendar_table t on orders_us.calendar_id = t.id
WHERE t.calendar_year > 2016
GROUP BY t.calendar_year,t.month_name,t.month_num
ORDER BY calendar_year asc, month_num asc");

    $orders=collect($orders);
$data_arry=[];

   //   $keyed = $orders->mapWithKeys(function ($item) {
    //      return [$item->pluck('calendar_year') => $item->pluck('sales')];
   //   });
   //   dd($keyed);
$orders=$orders->groupBy('month_name')->tap(function($collection){
    $collection->each(function ($value){
//        $data_array=push([$value->pluck('month_name')=>[]]);
     // $data_arry=[$value->pluck('calendar_year').'=>'.$value->pluck('sale')];
      foreach ($value as $newvalue) {
          $month_year = collect($newvalue);
          $mydata = $month_year->mapWithKeys(function ($item, $key) {

              // $sale_item =number_format(0);
              //  $yr='';
              if ($key == 'sale') {
//dd($item, $key);
                  $item = number_format($item, 2);
                  //dd($item);
                  $sale_item = $item;
              return $sale_item;
              }
              if ($key == 'calendar_year') {
                  $yr = $item;
return $yr;
              }

              if (isset($sale_item)) {

                  return [

                    $sale_item,
                      //    $key.'upper'=>strtoupper($item)];
                  ];
              }elseif (isset($yr)){
                  return[
               $yr,
                      ];
              }

                  return [
                      '$yr'=>'$sale_item',

                  ];
              }

          );
          dump($month_year, $mydata);
          die();

      }

      dd($value);
        dump('in Tap: '.$value->pluck('calendar_year').'=>'.$value->pluck('sale'));
    });
});
      die();
//$collection=collect([$orders]);

      $collection=$orders;
//      $keyed = $orders->mapWithKeys(function ($item) {
////          return [$item['calendar_year'] => $item['sales']];
////      });

$labels=$orders->keys()->toArray();
//dd($orders->filter('2017','calendar_year'));


 //dd($orders,$collection,$labels);

      $chart = new NewSampleChart();
      $chart->labels($labels);
     // $chart->labels($years);
      $chart->dataset('2017', 'bar',[1,2,3,4,5,6,7,8,9,10,11,12]);
      $chart->dataset('2018', 'bar',[1,2,3,4,5,6,7,8,9,10,11,12]);
      $chart->dataset('2019', 'bar',[1,2,3,4,5,6,7,8,9,10,11,12]);
     // $chart->dataset('values', 'bar', $values)->color('#FF0000');
    //  $chart->labels(['2 days ago', 'Yesterday', 'Today']);
      //$chart->dataset('My dataset', 'line', [1,2,3,4,5,6]);

return view('frontend.charting.youtube', compact('chart'));
   //   return view('frontend.charting.youtube');
  }

}
