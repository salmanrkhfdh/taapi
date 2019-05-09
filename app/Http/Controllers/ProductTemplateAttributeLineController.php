<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductTemplateAttributeLineController extends Controller
{
   
    public function readProductTemplateAttributeLine()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $result = $odoo->where('id','18')
                        ->get('product.template.attribute.line');
        return $result;
    }

    public function createProductTemplateAttributeLine(Request $r)
    {
    	$odoo = new \Edujugon\Laradoo\Odoo();

    	$odoo = $odoo->connect();
    	
    	$value_ids = array();
        foreach ($r->value_ids as $variable ) {

            array_push($value_ids, array(4,intval($variable)));
        }

        $id = $odoo->create('product.template.attribute.line',
                                [
                                    'product_tmpl_id' => $r->product_tmpl_id,
                                    'attribute_id' => $r->attribute_id,
                                    'value_ids' => $value_ids,
                                ]);
        dd($id);

    	return json_encode([
    		'status' => 200,
    		'message' => "success"
    	]);
   		
    }

    public function updateProduct(Request $u)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $updated = $odoo->where('name', $u->name)
                        ->update('product.template', [   'name' => $u->new_name,
                                                        'description' => $u->description,
                                                        'description_purchase' => $u->description_purchase,
                                                        'type' => $u->type,
                                                        'default_code' => $u->default_code,
                                                        'barcode' => $u->barcode,
                                                        'categ_id' => $u->categ_id,
                                                        'list_price' => $u->list_price, 
                                                        'list_price' => $u->list_price, 
                                                        'standard_price' => $u->standard_price,
                                                        'description' => $u->description,
                                                        'sales_count' => $u->sales_count,
                                                        'active' => $u->active,
                                                        'attribute_line_ids' => $u->attribute_line_ids,
                                                        'product_variant_ids' => $u->product_variant_ids,
                                                        'invoice_policy' => $u->invoice_policy,
                                                        'expense_policy' => $u->expense_policy,
                                                        'optional_product_ids' => $u->optional_product_ids,
                                                        'description_sale' => $u->description_sale,
                                                        'supplier_taxes_id' => $u->supplier_taxes_id
                                                    ]);

        if ($updated==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($updated);
    }

    public function deleteProduct(Request $d)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $result = $odoo ->where('name',$d->name)
                        ->delete('product.template');

        if ($result==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($result);
    }
}