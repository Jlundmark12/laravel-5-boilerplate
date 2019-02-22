@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('2018 Cost Breakdown') )

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-tachometer-alt"></i>2018 Cost Breakdown                    </strong>
                </div><!--card-header-->


                <table class="table table-hover table-dark">
                    <thead>
                    <tr>

                        <th scope="col">Category</th>
                        <th scope="col">Sub Category</th>
                        <th scope="col">Size</th>
                        <th scope="col">state</th>

                        <th scope="col">Cost %</th>
                        <th scope="col">Avg Price</th>
                        <th scope="col">Avg Dim Weight</th>
                        <th scope="col">avg label</th>
                        <th scope="col">Shipment count</th>

                    </tr>
                    </thead>
                    <tbody>

                        @for ($i = 0; $i < $shipments->count(); $i++)
                            <tr>
                            {{--<th scope="row">{{$i}}</th>--}}
                            <td>{{$shipments[$i]->category_name_text}}</td>
                                <td>{{$shipments[$i]->sub_name}}</td>
                                <td>{{$shipments[$i]->size_name}}</td>
                                <td>{{$shipments[$i]->STATE_NAME}}</td>
                                @if($shipments[$i]->avg_line_price>0)
                                <td>{{round($shipments[$i]->avg_label_cost/$shipments[$i]->avg_line_price*100)}}%</td>
                                @else
                            <td>0</td>
@endif
                                {{--<td>{{($shipments[$i]->avg_label_cost)/ ($shipments[$i]->avg_line_price)}}</td>--}}
                                <td>{{$shipments[$i]->avg_line_price}}</td>
                                <td>{{$shipments[$i]->avg_weight_dim}}</td>
                                <td>{{$shipments[$i]->avg_label_cost}}</td>
                                <td>{{$shipments[$i]->count_shipments}}</td>
                                {{--<th scope="row">{{$i}}</th>--}}
                                {{--<td>{{$sales[$i]}}</td>--}}
                                {{--<td>{{round((($cog[$i]+$shipping[$i]+$discounts[$i]+$taxes[$i])/$sales[$i]*100))}}%</td>--}}
                                {{--<td>{{$cog[$i]+$shipping[$i]+$discounts[$i]+$taxes[$i]}}</td>--}}
                                {{--<td>{{round($cog[$i]/$sales[$i]*100)}}%</td>--}}
                                {{--<td>{{$cog[$i]}}</td>--}}
                                {{--<td>{{round($shipping[$i]/$sales[$i]*100)}}%</td>--}}
                                {{--<td>{{$shipping[$i]}}</td>--}}
                                {{--<td>{{round($discounts[$i]/$sales[$i]*100)}}%</td>--}}
                                {{--<td>{{$discounts[$i]}}</td>--}}
                                {{--<td>{{$taxes[$i]}}</td>--}}
                                {{--<td>{{$sales[$i]-($cog[$i]+$shipping[$i]+$discounts[$i]+$taxes[$i])}}</td>--}}
                                {{--<td>{{round(($sales[$i]-($cog[$i]+$shipping[$i]+$discounts[$i]+$taxes[$i]))/($sales[$i])*100)}}%</td>--}}
                                {{--<td>{{$sales[$i]-($cog[$i]+$shipping[$i]+$discounts[$i]+$taxes[$i])}}</td>--}}
                            </tr>

                        @endfor


                    </tbody>
                </table>
                <div class="card-body">


                    {{--{!! $chart->container() !!}--}}



                </div> <!-- card-body -->


            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->



    {{--{!! $chart->script() !!}--}}

@endsection

