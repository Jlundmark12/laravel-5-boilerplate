<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Aproducts;


class AproductsController extends Controller
{
    public function rdn()
    {
        $aproducts= Aproducts::all();
       // return $aproducts;

        return view('frontend.newrdn',compact('aproducts')
            );
    }


 }

