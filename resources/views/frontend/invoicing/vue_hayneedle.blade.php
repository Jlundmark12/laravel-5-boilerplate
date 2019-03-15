@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
<div>
<invoicing-table></invoicing-table>
</div>

{{--<div>--}}
    {{--@foreach( $orders as $order)--}}
{{--<li>{{ $order->id }}</li>--}}
    {{--@endforeach--}}
{{--</div>--}}

@endsection


