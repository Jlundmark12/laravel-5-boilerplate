@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')


        <div class="col">
                @foreach( $data as $datas)
                        <li>{{ $data->order_total }}</li>
                        <li>{{ $data->order_date }}</li>
                @endforeach
        </div><!--col-->

@endsection
