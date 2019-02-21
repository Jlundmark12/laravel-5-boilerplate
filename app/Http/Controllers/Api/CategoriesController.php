<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
class CategoriesController extends Controller
{
    public function index(){
        return Categories::all();

 //       return Categories::with('inventory_now','condition','short_name','cat','subcat','size','color')->get();
    }
}
