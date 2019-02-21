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

    public function short_name(){
        return $this->hasOne(ProductNames::class,'id','name_id');
    }

    public function cat(){
    return $this->hasOne(Categories::class,'id','category_id');
}

    public function subcat(){
        return $this->hasOne(SubRelationship::class,'id','sub_relationship_id');
    }
    public function size(){
        return $this->hasOne(ProductSize::class,'id','size_id');
    }

    public function color(){
        return $this->hasOne(ProductColor::class,'id','color_id');
    }
}
