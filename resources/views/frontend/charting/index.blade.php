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




                        <div class="col-md- order-2 order-sm-1">
                            <div class="row mb-4">
                                <div class="col">
                                    <div class="card mb-4">


                                        <div class="card-body">


                                                <graph-component-test1></graph-component-test1>


                                        </div>

                                    </div><!--card-->
                                </div><!--col-md-6-->
                            </div><!--row-->


                            {{--Testing--}}


                                <div class="row mb-4">

                                    <div class="card-body">


                                    </div>
                                    <div class="card-body">


                                    </div>






                            {{--End Testing--}}




                        </div><!--col-md-8-->
                    </div><!-- row -->
                </div> <!-- card-body -->
            </div><!-- card -->
        </div><!-- row -->
    </div><!-- row -->
@endsection
