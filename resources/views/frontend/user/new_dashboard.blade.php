@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.frontend.dashboard') )

@section('content')
    <div class="container">
        <div class="card-header">
            <strong>
                <i class="fas fa-tachometer-alt"></i> @lang('navs.frontend.dashboard')
            </strong>
        </div><!--card-header-->






            {{--<raw-filter :category='cat_id'></raw-filter>--}}
            {{--<product-table></product-table>--}}
            {{--<raw-filter></raw-filter>--}}
        {{--<filters></filters>--}}
<products></products>
    </div><!--card-->



@endsection
