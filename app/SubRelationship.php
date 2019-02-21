<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;
//use App\SubRelationship;
class SubRelationship extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'sub_relationships';

//    public function aproduct_sub(){
//
//        return $this->belongsTo(Aproducts::class,'condition_id','id');
//    }
//
    public function subcat(){
        return $this->hasMany(Categories::class,'id','cat_id');
   }

}
