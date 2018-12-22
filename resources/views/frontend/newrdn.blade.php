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

                <div class="row mt-4">
                    <div class="col">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sku</th>
                                    <th>Condition</th>
                                    <th>Stock</th>

                                </tr>
                                </thead>
                                <tbody>
                                @foreach( $aproducts as $aproduct)
                                    <tr>
                                        <td>{{ $aproduct->id }}</td>
                                        <td>{{ $aproduct->sku }}</td>
                                        <td>{{ $aproduct->condition->condition_name }}</td>
                                       <td>{{ $aproduct->inventory_now->stock }}</td>

                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div><!--col-->
                </div><!--row-->

            </div><!--card-->
        </div><!--col-->
    </div>
@endsection