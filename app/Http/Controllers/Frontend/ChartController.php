<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
//use charts;
use App\Http\Requests;
use App\Charts\NewSampleChart;
use App\Models\Auth\User;
use Illuminate\Support\Collection;

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

    $orderss=collect([$orders]);
    $months=collect($orders);
    $labels=$months->unique('month_name')->pluck('month_name');
  //  $labels->values()->all();
  // dd($labels);
      $seven=[];
      $eight=[];
$nine=[];
foreach ($orderss as $order) {
    //echo $order['calendar_year'];
//    $new= $order['calendar_year'];
    $collection = Collection::make($order);
    foreach ($collection as $collect) {
        // $myArray[]=['$collect->calendar_year' =>$collect->sale];
            if ($collect->calendar_year==2018) {
                array_push($eight,round($collect->sale,2));
      //  $data_arry[] =array_push($data_arry, $collect->sale);
            //[$collect->calendar_year => [$collect->sale]]


          }
        if ($collect->calendar_year==2017) {
//            $value=$collect->sale;
//            var_dump($value);
//            die();
          //  $currency=number_format($collect->sale,2);
// dd($currency);
          //  array_push($seven, number_format("$collect->sale",2));
            array_push($seven, round($collect->sale,2));

        }
        if ($collect->calendar_year==2019) {
            array_push($nine, round($collect->sale,2));
        }
        //   if ($collect->calendar_year==2017) {
        //       $data_arry=[$collect->calendar_year=>$collect->sale];

        //      dump($data_arry);
        //       die();
    }
  //  dump($seven,$eight,$nine);
//   die();
    }
   // $myNewArry=collect($myArray);
    //$seven=[];
  //  $eight=[];
 //   $nine=[];
  //  $myNewArry->mapWithKeys(function($item,$key){
      //  dd($key);

   // });

   // dump($myArray, $myNewArry);
   // dump(array_flatten($myArray));

    //die();
//dump($collection,$order,$orders);
//die();
//}

//$new=$orders->flatMap(function ($item){
//    $item=collect($item);
//    if ($item->values()=='2017'){
//        return $item;
//    }
//});
//dump($new);
//die();
// $new=$orders->mapToGroups(function ($item){
//     $item=collect($item);
//  //dd($item);
//return $item;
//});
//dump($new,$orders);
//die();
  //    dump($seven);
      $seven=array_flatten($seven);
      $sevenCount=count($seven);
$eightCount=count($eight);
      $nineCount=count($nine);
      do{
array_push($nine, 0);
$nineCount++;

      }while( $nineCount < $sevenCount);

//dd($sevenCount, $eightCount,$nineCount);
     // dump($seven);
     // die();
      $chart = new NewSampleChart();
      $chart->labels($labels);
     // $chart->labels($years);
      $chart->dataset('2017', 'bar',$seven)->backgroundColor('#FF0000');
      $chart->dataset('2018', 'bar',$eight)->backgroundColor('#42f4e8');
      $chart->dataset('2019', 'bar',$nine)->backgroundColor('#a5ff4c');
     // $chart->dataset('values', 'bar', $values)->color('#FF0000');
    //  $chart->labels(['2 days ago', 'Yesterday', 'Today']);
      //$chart->dataset('My dataset', 'line', [1,2,3,4,5,6]);

return view('frontend.charting.youtube', compact('chart'));
   //   return view('frontend.charting.youtube');
  }

}
