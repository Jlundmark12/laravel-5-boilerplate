<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkuCondition extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'sku_condition';
public function aproducts(){

    return $this->belongsTo(Aproducts::class,'condition_id','id');
}
}
