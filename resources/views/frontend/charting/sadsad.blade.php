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
                                    <div class="card-header">
                                        Product Table Component
                                    </div><!--card-header-->

                                    <div class="card-body">
                                        <product-table-component></product-table-component>

                                    </div>
                                </div><!--card-->
                            </div><!--col-md-6-->
                        </div><!--row-->


                        <div class="row">
                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">

                                    </div><!--card-header-->

                                    <div class="card-body">

                                    </div><!--card-body-->
                                </div><!--card-->
                            </div><!--col-md-6-->

                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">

                                    </div><!--card-header-->

                                    <div class="card-body">

                                    </div><!--card-body-->
                                </div><!--card-->
                            </div><!--col-md-6-->

                            <div class="w-100"></div>

                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">

                                    </div><!--card-header-->

                                    <div class="card-body">

                                    </div><!--card-body-->
                                </div><!--card-->
                            </div><!--col-md-6-->

                            <div class="col">
                                <div class="card mb-4">
                                    <div class="card-header">

                                    </div><!--card-header-->

                                    <div class="card-body">

                                    </div><!--card-body-->
                                </div><!--card-->
                            </div><!--col-md-6-->
                        </div><!--row-->
                    </div><!--col-md-8-->
                </div><!-- row -->
            </div> <!-- card-body -->
        </div><!-- card -->
    </div><!-- row -->
    </div><!-- row -->
@endsection
