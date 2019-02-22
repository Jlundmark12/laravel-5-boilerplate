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

                <div class="card-body">


                    {!! $chart->container() !!}

                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->

    {!! $chart->script() !!}

    {{--{!! $chart->script() !!}--}}

@endsection

