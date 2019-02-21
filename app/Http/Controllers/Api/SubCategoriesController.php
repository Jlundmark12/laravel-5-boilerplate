<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SubRelationship;
class SubCategoriesController extends Controller
{
 //   public function index()
        public function index(Request $request)
    {
       // return $request->category;
        $cat_id= $request->category;
      //  return $cat_id;
       // return this.cat_id;
        //return SubRelationship::all()->get();
       return SubRelationship::where('cat_id',$cat_id)->get();
      //   return SubRelationship::with('subcat')->where('cat_id',$request)->get();
        //       return Categories::with('inventory_now','condition','short_name','cat','subcat','size','color')->get();
    }

//    public function subcat()
//    {
//        return $this->hasOne(SubRelationship::class, 'id', 'sub_relationship_id');
//    }

}