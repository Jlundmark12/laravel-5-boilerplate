<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Calendar extends Model
{

    protected $connection = 'mysql2';
    protected $table = 'calendar_table';

//    public function raw(){
//        $charlie = DB::table(or)
//    }


    public function CalendarSales(){
        return $this->hasMany(Orders_Us::class,'calendar_id','id');

//return $charlie;
    }
}
