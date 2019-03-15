@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('2018 Cost Breakdown') )

@section('content')
    {{--<div class="row mb-4">--}}

        {{--<div class="col-12">--}}
    <div class="container">
    <div class="card ">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-tachometer-alt"></i>2018 Cost Breakdown                    </strong>
                </div><!--card-header-->

{{--<div class="card-text row">--}}


                <table class="table table-responsive table-hover table-dark">
                    {{--<div class="table responsive-table">--}}
                    <thead >
                    <tr class="col-10" style="color: #00aced">

                        <th scope="col">Month</th>
                        <th scope="col">Total Sales</th>
                        <th scope="col">COG %</th>
                        <th scope="col">Total Cost</th>
                        <th scope="col">Product %</th>
                        <th scope="col">Total Product Cost</th>
                        <th scope="col">Shipping %</th>
                        <th scope="col">Shipping Total</th>
                        <th scope="col">Discounts %</th>
                        <th scope="col">Discount Total</th>
                        <th scope="col">Total taxes</th>
                        <th scope="col">Total Profit</th>
                        <th scope="col">Profit %</th>
                    </tr>
                    </thead>
                    <tbody>

                    @for ($i = 0; $i < $months->count(); $i++)
                        <tr style="flex-shrink:inherit">
                            {{--<th scope="row">{{$i}}</th>--}}
                            <td>{{$months[$i]}}</td>

                            {{--<th scope="row">{{$i}}</th>--}}
                            <td>{{$sales[$i]+$discounts[$i]}}</td>
                            <td>{{round((($cog[$i]+$shipping[$i]+$discounts[$i]+$taxes[$i])/$sales[$i]*100))}}%</td>
                            <td>${{$cog[$i]+$shipping[$i]+$discounts[$i]+$taxes[$i]}}</td>
                            <td>{{round($cog[$i]/$sales[$i]*100)}}%</td>
                            <td>${{$cog[$i]}}</td>
                            <td>{{round($shipping[$i]/$sales[$i]*100)}}%</td>
                            <td>${{$shipping[$i]}}</td>
                            <td>{{round($discounts[$i]/$sales[$i]*100)}}%</td>
                            <td>-${{$discounts[$i]}}</td>
                            <td>-${{$taxes[$i]}}</td>
                            <td>${{$sales[$i]-($cog[$i]+$shipping[$i]+$discounts[$i]+$taxes[$i])}}</td>
                            <td>{{round(($sales[$i]-($cog[$i]+$shipping[$i]+$discounts[$i]+$taxes[$i]))/($sales[$i])*100)}}%</td>
                            {{--<td>{{$sales[$i]-($cog[$i]+$shipping[$i]+$discounts[$i]+$taxes[$i])}}</td>--}}
                        </tr>

                    @endfor


                    </tbody>

                </table>
            </div>  </div>

    <div class="card">
                <div class="card-body">


                    {!! $chart->container() !!}



                </div> <!-- card-body -->
    </div>

          <!-- card -->

    {!! $chart->script() !!}

    {{--{!! $chart->script() !!}--}}

@endsection
