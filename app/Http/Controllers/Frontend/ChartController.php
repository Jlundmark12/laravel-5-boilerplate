<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Charting;
//use charts;
use App\Http\Requests;
use App\Charts\NewSampleChart;
use App\Charts\category_pie;
use App\Models\Auth\User;
use Illuminate\Support\Collection;
use App\Charts\CogChart;
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

  public function pie(){
      $orders=DB::connection('mysql2')->select("SELECT concat(sr.category_name_text,' - ',sr.sub_name) as cat,SUM(order_details_us.line_subtotal) as total
FROM order_details_us
JOIN sku_organization o on order_details_us.mapped_organization_id = o.id
join orders_us u on order_details_us.order_id = u.id

JOIN calendar_table t on order_details_us.calendar_id = t.id
JOIN sub_relationships sr on o.sub_relationship_id = sr.id
WHERE t.calendar_year=2018
GROUP BY o.sub_relationship_id");

      //dd($orders);
      $orderss=collect([$orders]);
      $categories=collect($orders);
      $labels=$categories->unique('cat')->pluck('cat');
     // dd($labels);
      //  $labels->values()->all();
      // dd($labels);
      $seven=[];
      foreach ($orders as $pie){

          array_push($seven,round($pie->total,2));

      }

$count=count($labels);

      $chart = new category_pie();
      $chart->labels($labels);
      // $chart->labels($years);
      $chart->dataset('Category', 'pie',$seven)->backgroundColor(['#FFA07A','#F08080','#FF0000','#FF8C00','#FFD700','#FFFFE0','#BDB76B','#FFDAB9','#7CFC00','#228B22','#00FA9A','#808000','#00FFFF','#7FFFD4','#008080','#1E90FF','#87CEFA','#000080','#FF00FF','#8B4513']);
$chart->height(700);
$chart->width(500);

//      $chart->dataset('2018', 'pie',$eight)->backgroundColor('#42f4e8');
//      $chart->dataset('2019', 'pie',$nine)->backgroundColor('#a5ff4c');
      return view('frontend.charting.sadsad', compact('chart'));
      //return view('frontend.charting.youtube')
  }




    public function eight()
    {

        $months=DB::connection('mysql2')->select("SELECT distinct (month_name) as month_name, month_num,calendar_year
FROM calendar_table
WHERE calendar_year>=2018
ORDER BY calendar_year asc,month_num asc");
        $shipping=DB::connection('mysql2')->select("SELECT round(SUM(s.label_cost)) as labelcost
FROM shipments s
JOIN orders_us o on s.sub_order_id = o.id
JOIN calendar_table t on o.calendar_id = t.id
WHERE t.calendar_year>=2018
GROUP BY  t.month_num,t.month_name,t.calendar_year
ORDER BY t.calendar_year asc,t.month_num asc
");
        $cog=$orders=DB::connection('mysql2')->select("SELECT round(SUM(order_bd_us.line_value_subtotal)) as item_cost
FROM order_bd_us
JOIN order_details_us o on order_bd_us.order_details_id = o.id
JOIN calendar_table t on o.calendar_id = t.id
WHERE t.calendar_year>=2018
GROUP BY  t.month_num,t.month_name,t.calendar_year
ORDER BY t.calendar_year asc,t.month_num asc");
            $sales=$orders=DB::connection('mysql2')->select("SELECT  round( SUM(orders_us.order_total)) as sales
FROM orders_us
JOIN calendar_table t on orders_us.calendar_id = t.id
WHERE t.calendar_year>='2018'
GROUP BY t.calendar_year,t.month_name, t.month_num

ORDER BY t.calendar_year asc, t.month_num asc");
            $discounts=$orders=DB::connection('mysql2')->select("SELECT round(SUM(orders_us.dicounts)) as discounts
FROM orders_us
JOIN calendar_table t on orders_us.calendar_id = t.id
WHERE t.calendar_year>='2018'
GROUP BY t.calendar_year,t.month_name, t.month_num

ORDER BY t.calendar_year asc, t.month_num asc
");
                $taxes=$orders=DB::connection('mysql2')->select("SELECT round(SUM(orders_us.tax)) as taxes
FROM orders_us
JOIN calendar_table t on orders_us.calendar_id = t.id
WHERE t.calendar_year>='2018'
GROUP BY t.calendar_year,t.month_name, t.month_num

ORDER BY t.calendar_year asc, t.month_num asc
");


      //          dd($taxes);

$months=collect($months)->pluck('month_name');

        $sales=collect($sales)->pluck('sales');
        $cog=collect($cog)->pluck('item_cost');
        $shipping=collect($shipping)->pluck('labelcost');
        $discounts=collect($discounts)->pluck('discounts');
        $taxes=collect($taxes)->pluck('taxes');
//$months=array_flatten($months);
//dd($months);
//dd($taxes);

        $chart = new CogChart();
        $chart->labels($months);

        $chart->dataset('Product Sales', 'bar',$sales)->backgroundColor('#FF0000');
        $chart->dataset('Product Cost', 'bar',$cog)->backgroundColor('#42f4e8');
        $chart->dataset('Shipping', 'bar',$shipping)->backgroundColor('#a5ff4c');
        $chart->dataset('Discounts', 'bar',$discounts)->backgroundColor('#7FFFD4');
        $chart->dataset('Taxes', 'bar',$taxes)->backgroundColor('#008080');


//#00FFFF','#7FFFD4','#008080'

        return view('frontend.charting.cogs', compact('chart','months','sales','cog','shipping','discounts','taxes'));







    }


}
