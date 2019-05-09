<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleOrderTemplateLineController extends Controller
{
   
    public function readSaleOrderTemplateLine()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $result = $odoo/*->limit(1)*/
                        /*->where('name','plastic')*/
                        ->get('sale.order.template.line');
        return $result;
    }

    public function createSaleOrderTemplateLine(Request $r)
    {
    	$odoo = new \Edujugon\Laradoo\Odoo();

    	$odoo = $odoo->connect();
    	
    	$id = $odoo->create('sale.order.template.line',
                                [
                                    'name' => $r->name,
                                    'sale_order_template_id' => $r->sale_order_template_id,
                                    'product_id' => $r->product_id,
                                    'price_unit' => $r->price_unit,
                                    'discount' => $r->discount,
                                    'product_uom_qty' => $r->product_uom_qty,
                                    'product_uom_id' => $r->product_uom_id
                                ]);
        
    	return json_encode([
    		'status' => 200,
    		'message' => "success"
    	]);
   		
    }

    public function updateSaleOrderTemplateLine(Request $u)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $updated = $odoo->where('id', $u->id)
                        ->update('sale.order.template.line',  ['name' => $u->new_name,
                                                                'sale_order_template_id' => $u->new_sale_order_template_id,
                                                                'product_id' => $u->new_product_id,
                                                                'price_unit' => $u->new_price_unit,
                                                                'discount' => $u->new_discount,
                                                                'product_uom_qty' => $u->new_product_uom_qty,
                                                                'product_uom_id' => $u->new_product_uom_id
                                                            ]);

        if ($updated==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($updated);
    }

    public function deleteSaleOrderTemplateLine(Request $d)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $result = $odoo ->where('id',$d->id)
                        ->delete('sale.order.template.line');

        if ($result==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($result);
    }
}