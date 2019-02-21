<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductNames extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'sku_names';
}
