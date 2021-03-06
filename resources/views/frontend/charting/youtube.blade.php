@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <strong>
                        <i class="fas fa-tachometer-alt"></i> @lang('navs.frontend.products.inventory')
                    </strong>
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

