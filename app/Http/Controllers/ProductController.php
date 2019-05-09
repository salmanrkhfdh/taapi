<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
   
    public function readProduct()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $result = $odoo/*->where('id','251')*/
                        ->limit(8)
                        ->get('product.template');
        return json_encode([
            'result' => $result]);
    }

    

    public function createProduct(Request $r)
    {
    	$odoo = new \Edujugon\Laradoo\Odoo();

    	$odoo = $odoo->connect();
    	
    	$taxes_id = array();
        foreach ($r->taxes_id as $variable ) {

            array_push($taxes_id, array(4,intval($variable)));
        }



        /*$taxes_id = array();
        
        foreach (json_decode($r['taxes_id']) as $var ) {

            array_push($taxes_id, array(4,intval($var)));
        }*/

        // return json_encode([
        //     'status' => 200,
        //     'message' => json_encode([
        //                             'name' => $r->name,
        //                             'description' => $r->description,
        //                             'description_sale' => $r->description_sale,
        //                             'type' => $r->type,
        //                             'default_code' => $r->default_code,
        //                             'barcode' => $r->barcode,
        //                             'categ_id' => $r->categ_id,
        //                             'lst_price' => $r->lst_price, 
        //                             'standard_price' => $r->standard_price,
        //                             'sales_count' => $r->sales_count,
        //                             'active' => $r->active,
        //                             'invoice_policy' => $r->invoice_policy,
        //                             'expense_policy' => $r->expense_policy,
        //                             'taxes_id' => $taxes_id
        //     ]),

        // ]);

        $id = $odoo->create('product.template',
                                [
                                    'image' => $r->image,
                                    'name' => $r->name,
                                    'sale_ok' => $r->sale_ok,
                                    'purchase_ok' => $r->purchase_ok,
                                    'description' => $r->description,
                                    'description_sale' => $r->description_sale,
                                    'type' => $r->type,
                                    'default_code' => $r->default_code,
                                    'barcode' => $r->barcode,
                                    'categ_id' => $r->categ_id,
                                    'lst_price' => $r->lst_price, 
                                    'standard_price' => $r->standard_price,
                                    'sales_count' => $r->sales_count,
                                    'active' => $r->active,
                                    'invoice_policy' => $r->invoice_policy,
                                    'expense_policy' => $r->expense_policy,
                                    'taxes_id' => $taxes_id,
                                    'supplier_taxes_id' => $supplier_taxes_id,
                                    'optional_product_ids' => $optional_product_ids
                                ]);

    	return json_encode([
    		'status' => 200,
    		'message' => $id,
            'request' => json_encode
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