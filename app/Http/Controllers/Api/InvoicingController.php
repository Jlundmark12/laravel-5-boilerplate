<?php

namespace App\Http\Controllers\Api;

use App\Exports\InvoicingExport;
use App\Invoicing;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class InvoicingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  Invoicing::select('id')->get();
//dd($orders);

       // return orders;
//        return view('frontend.invoicing.hayneedle',compact('orders'));
       // return view('frontend.invoicing.vue_hayneedle');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Invoicing  $invoicing
     * @return \Illuminate\Http\Response
     */
    public function show(Invoicing $invoicing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Invoicing  $invoicing
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoicing $invoicing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Invoicing  $invoicing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoicing $invoicing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Invoicing  $invoicing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoicing $invoicing)
    {
        //
    }

    public function export()
    {
        return Excel::download(new InvoicingExport(), 'all_hayneedle.xls');
    }
}
