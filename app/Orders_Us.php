<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Calendar;
class Orders_Us extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'orders_us';

    public function months(){

    //return Calendar::where('id',$this->calendar_id)->first()->month_name->get();
return $this->hasOne('App\Calendar','id','calendar_id');
        //return $this->belongsTo('App\Calendar','calendar_id','id');
    //    return $this->belongsTo('App\Calendar','calendar_id','id');
    }

    public function rawq(){
        
$monthlydata= DB::connection('mysql2')->select("SELECT t.month_name,t.calendar_year,SUM(orders_us.order_total)
FROM orders_us
JOIN calendar_table t on orders_us.calendar_id = t.id
GROUP BY t.calendar_year,t.month_name");
return $monthlydata;
    }


    public function rawquery(){
$db= new DB::connection('mysql2');
return $db;
//        $md= DB::connection('mysql2')->select(DB::raw("SELECT t.month_name,t.calendar_year,SUM(orders_us.order_total)
//FROM orders_us
//JOIN calendar_table t on orders_us.calendar_id = t.id
//GROUP BY t.calendar_year,t.month_name"));
//        return $this->$md;
    }


};
