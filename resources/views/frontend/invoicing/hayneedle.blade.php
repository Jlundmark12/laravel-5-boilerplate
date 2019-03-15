@extends('frontend.layouts.app')

@section('title', app_name() . ' | ' . __('navs.general.home'))

@section('content')

{{--<div class="container">--}}
{{--<div>--}}
    {{--<div class="btn-group" role="group" aria-label="Basic example">--}}
        {{--<button type="button" class="btn btn-secondary"  href="invoicing/download">Left</button>--}}
        {{--<button type="button" class="btn btn-secondary">Middle</button>--}}
        {{--<button type="button" class="btn btn-secondary">Right</button></div>--}}

{{--</div>--}}
{{--<div>--}}
    {{--@foreach( $orders as $order)--}}
{{--<li>{{ $order->id }}</li>--}}
    {{--@endforeach--}}
{{--</div>--}}


    <div>
        <div class="container">
            <div>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <a href="invoicing/download"><button type="button" class="btn btn-secondary"  href="invoicing/download">Download All</button></a>
                    <a href="invoicing/download/unsubmitted"><button type="button" class="btn btn-secondary"  href="invoicing/download/unsubmitted">Download Unsubmitted</button></a>
                    <a href="invoicing/download/submitted"><button type="button" class="btn btn-secondary"  href="invoicing/download/submitted">Download submitted</button></a>

            </div>
        </div>
        <table class="table-striped table-hover table-bordered">

            <thead>
            <!--<div  class="row">-->
            <tr>
                <th class="col">id</th>
                <th class="col">Vendor Number</th>
                <th class="col">Vendor Name</th>
                <th class="col">Invoice Number</th>
                <th class="col">PO Date</th>
                <th class="col">PO Date txt</th>
                <th class="col">PO Number</th>
                <th class="col">Ship Name</th>
                <th class="col">Ship Date</th>
                <th class="col">Ship Date txt</th>
                <th class="col">SKU</th>
                <th class="col">Supplier SKU</th>
                <th class="col">Qty</th>
                <th class="col">Unit Price</th>
                <th class="col">Address Correction Charge</th>
                <th class="col">Site Placement Allowance</th>
                <th class="col">Advertising Accrual Allowance</th>
                <th class="col">Rebates Allowance</th>
                <th class="col">Preference Return Allowance</th>
                <th class="col">Defective Return Allowance</th>
                <th class="col">Misc Allowance</th>
                <th class="col">Freight Charge</th>
                <th class="col">Fuel Charge</th>
                <th class="col">Handling Charge</th>
                <th class="col">Palletizing Charge</th>
                <th class="col">Invoice Total</th>
                <th class="col">Misc Charge</th>
                <th class="col">Sales Tax Charge</th>
                <th class="col">po number sku</th>
                <th class="col">invoice status</th>
                <th class="col">new invoice status</th>
                <th class="col">fsos status</th>

            </tr>
            <!--</div>-->
            </thead>
            <tbody>
            {{--<tr v-for="product in products" :key="product.id">--}}
            <tr>
                @foreach( $orders as $order)

                    <td>{{$order->id}}</td>
                    <td>{{$order->Vendor_Number}}</td>
                    <td>{{$order->Vendor_Name}}</td>
                    <td>{{$order->Invoice_Number}}</td>
                    <td>{{$order->PO_Date}}</td>
                    <td>{{$order->PO_Date_txt}}</td>
                    <td>{{$order->PO_Number}}</td>
                    <td>{{$order->Ship_Name}}</td>
                    <td>{{$order->Ship_Date}}</td>
                    <td>{{$order->Ship_Date_txt}}</td>
                    <td>{{$order->SKU}}</td>
                    <td>{{$order->Supplier_SKU}}</td>
                    <td>{{$order->Qty}}</td>
                    <td>{{$order->Unit_Price}}</td>
                    <td>{{$order->Address_Correction_Charge}}</td>
                    <td>{{$order->Site_Placement_Allowance}}</td>
                    <td>{{$order->Advertising_Accrual_Allowance}}</td>
                    <td>{{$order->Rebates_Allowance}}</td>
                    <td>{{$order->Preference_Return_Allowance}}</td>
                    <td>{{$order->Defective_Return_Allowance}}</td>
                    <td>{{$order->Misc_Allowance}}</td>
                    <td>{{$order->Freight_Charge}}</td>
                    <td>{{$order->Fuel_Charge}}</td>
                    <td>{{$order->Handling_Charge}}</td>
                    <td>{{$order->Palletizing_Charge}}</td>
                    <td>{{$order->Invoice_Total}}</td>
                    <td>{{$order->Misc_Charge}}</td>
                    <td>{{$order->Sales_Tax_Charge}}</td>
                    <td>{{$order->po_number_sku}}</td>
                    <td>{{$order->invoice_status}}</td>
                    <td>{{$order->new_invoice_status}}</td>
                    <td>{{$order->fsos_status}}</td>

                {{--<td><input type="text" class="form-control user_input_value"></td>--}}


                <td>
                    <a href="#">
                        <i class="fa fa-edit blue"></i>
                    </a>

                    <a href="#">
                        <i class="fa fa-trash" style="color: red;"></i>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>

        {{ $orders->links() }}

    </div>
</div>
@endsection


