<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Charts\NewSampleChart;
use Illuminate\Support\Collection;

class Charting extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'orders_us';

    public function pie(){

        $orders=DB::connection('mysql2')->select("SELECT concat(sr.category_name_text,' - ',sr.sub_name),SUM(order_details_us.line_subtotal)
FROM order_details_us
JOIN sku_organization o on order_details_us.mapped_organization_id = o.id
join orders_us u on order_details_us.order_id = u.id

JOIN calendar_table t on order_details_us.calendar_id = t.id
JOIN sub_relationships sr on o.sub_relationship_id = sr.id
WHERE t.calendar_year=2018
GROUP BY o.sub_relationship_id");

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

        return $chart;

    }
}
