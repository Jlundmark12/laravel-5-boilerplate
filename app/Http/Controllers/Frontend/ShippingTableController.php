<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ShippingTable;
use Illuminate\Support\Facades\DB;
class ShippingTableController extends Controller
{
    public function index(){
        $shipments=DB::connection('mysql2')->select("SELECT sr.category_name_text,sr.sub_name,v.size_name, ROUND(AVG(od.line_price),2) as avg_line_price,ROUND(AVG(sd.weight_dim),2) as avg_weight_dim,ROUND(AVG(s.label_cost),2) AS avg_label_cost, COUNT(indi.shipment_id) AS count_shipments, o.store_id,us_s.STATE_NAME
FROM shipments_indv indi

  JOIN orders o on indi.order_id = o.id
JOIN order_details od on o.id = od.order_id
JOIN shipment_dim sd on indi.dimension_id = sd.id
JOIN sku_organization organization on od.mapped_organization_id = organization.id
JOIN sub_relationships sr on organization.sub_relationship_id = sr.id
JOIN sizing_variations v on organization.sizing_id = v.id
JOIN shipments s on sd.rdn_shipment_id = s.id
JOIN US_STATES us_s on o.state_id=us_s.ID
WHERE s.label_cost >=1 AND od.line_quantity=1 AND o.order_date BETWEEN '2018-01-01' AND '2018-12-31'
AND indi.order_id=o.id AND o.store_id=48 AND o.state_id IS NOT NULL
GROUP BY sr.category_name_text,sr.sub_name,v.size_name,od.line_quantity,sr.id,v.size,o.store_id,us_s.STATE_NAME
ORDER BY sr.id,v.size,count_shipments desc");
        $shipments=collect($shipments);


        $state_shipping=DB::connection('mysql2')->select("SELECT u.STATE_NAME as state,round(SUM(o.order_total)) as order_total,round(AVG(o.order_total),2) as avg_order,
       round(AVG(s.label_cost),2) as label_cost

FROM orders_us o
    JOIN calendar_table t on o.calendar_id = t.id
JOIN US_STATES u on o.state_id = u.ID
JOIN shipments s on o.id = s.sub_order_id
WHERE t.calendar_year = 2018 AND o.store_id=48
GROUP BY u.STATE_NAME
ORDER BY order_total desc ");
        $ss=collect($state_shipping);
//dd($state_shipping);
//dd($ss, $shipments);
//        dd($shipments);
        return view('frontend.charting.shipping',compact('shipments','ss'));
    }
}
