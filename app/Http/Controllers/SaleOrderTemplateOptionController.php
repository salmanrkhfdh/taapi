<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SaleOrderTemplateOptionController extends Controller
{
   
    public function readSaleOrderTemplateOption()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $result = $odoo/*->limit(1)*/
                        /*->where('name','plastic')*/
                        ->get('sale.order.template.option');
        return $result;
    }

    public function createSaleOrderTemplateOption(Request $r)
    {
    	$odoo = new \Edujugon\Laradoo\Odoo();

    	$odoo = $odoo->connect();
    	
    	$id = $odoo->create('sale.order.template.option',
                                [
                                    'name' => $r->name,
                                    'sale_order_template_id' => $r->sale_order_template_id,
                                    'product_id' => $r->product_id,
                                    'price_unit' => $r->price_unit,
                                    'discount' => $r->discount,
                                    'uom_id' => $r->uom_id,
                                    'quantity' => $r->quantity
                                ]);
        
    	return json_encode([
    		'status' => 200,
    		'message' => "success"
    	]);
   		
    }

    public function updateSaleOrderTemplateOption(Request $u)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $updated = $odoo->where('id', $u->id)
                        ->update('sale.order.template.option',  ['name' => $u->new_name,
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

    public function deleteSaleOrderTemplateOption(Request $d)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $result = $odoo ->where('id',$d->id)
                        ->delete('sale.order.template.option');

        if ($result==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($result);
    }
}