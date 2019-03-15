<?php

namespace App\Exports;

use App\Invoicing;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithTitle;
class InvoicingExport implements FromCollection, WithHeadings, WithTitle
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //return Invoicing::all();
        return Invoicing::select('Vendor_Number', 'Vendor_Name', 'Invoice_Number', 'PO_Date_txt', 'PO_Number', 'Ship_Name', 'Ship_Date_txt', 'SKU', 'Supplier_SKU', 'Qty', 'Unit_Price', 'Address_Correction_Charge', 'Site_Placement_Allowance', 'Advertising_Accrual_Allowance', 'Rebates_Allowance', 'Preference_Return_Allowance', 'Defective_Return_Allowance', 'Misc_Allowance', 'Freight_Charge', 'Fuel_Charge', 'Handling_Charge', 'Palletizing_Charge',  'Misc_Charge', 'Sales_Tax_Charge','Invoice_Total')->where('fsos_status','=',0)->get();
    }
//    public function unsubmitted()
//    {
//        return Invoicing::select('Vendor_Number', 'Vendor_Name', 'Invoice_Number', 'PO_Date_txt', 'PO_Number', 'Ship_Name', 'Ship_Date_txt', 'SKU', 'Supplier_SKU', 'Qty', 'Unit_Price', 'Address_Correction_Charge', 'Site_Placement_Allowance', 'Advertising_Accrual_Allowance', 'Rebates_Allowance', 'Preference_Return_Allowance', 'Defective_Return_Allowance', 'Misc_Allowance', 'Freight_Charge', 'Fuel_Charge', 'Handling_Charge', 'Palletizing_Charge', 'Invoice_Total', 'Misc_Charge', 'Sales_Tax_Charge')->having('fsos_status','=',0);
//    }
    public function headings(): array
    {
        return [
            'Vendor Number',
            'Vendor Name',
            'Invoice Number',
            'PO Date',
            'PO Number',
            'Ship Name',
            'Ship Date',
            'SKU',
            'Supplier SKU',
            'Qty',
            'Unit Price',
            'Address Correction Charge',
            'Site Placement Allowance',
            'Advertising Accrual Allowance',
            'Rebates Allowance',
            'Preference Return Allowance',
            'Defective Return Allowance',
            'Misc Allowance',
            'Freight Charge',
            'Fuel Charge',
            'Handling Charge',
            'Palletizing Charge',
            'Sales Tax Charge',
            'Misc Charge',
            'Invoice Total',
        ];
    }
    public function title(): string
    {
        return 'Order Batch';
    }
}
