<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aproducts extends Model
{
    protected $connection = 'mysql2';



    public function inventory_now(){
        return $this->hasone(inventory_now::class,'aproduct_id');
    }


    public function condition(){
        return $this->hasOne(SkuCondition::class,'id','condition_id');
    }
}
