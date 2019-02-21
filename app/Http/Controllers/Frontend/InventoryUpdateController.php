<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InventoryUpdateController extends Controller
{

    public function index()
    {
        return view('frontend.inventory_updates.index');
    }
}
