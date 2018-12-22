@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <div class="row mb-4">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-home"></i> @lang('navs.general.home')
                </div>
                <div class="card-body">
                   <h1>{{ $aproducts[1]['sku'] }}</h1>
                    @lang('strings.frontend.welcome_to', ['place' => app_name()])
                </div>
                <div>
                    @foreach( $aproducts as $aproduct)
                        <li>{{ $aproduct->sku }}</li>
                        <li>{{ $aproduct->inventory_now->stock }}</li>
                        @endforeach
                </div>
            </div><!--card-->
        </div><!--col-->
    </div>