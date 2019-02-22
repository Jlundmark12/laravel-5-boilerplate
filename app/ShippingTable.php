<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class ShippingTable extends Model
{
    protected $connection = 'mysql2';
    protected $table = 'shipments_indv';
    public function shipData(){
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


       // return $shipments;
    }
}
