<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductVariantController extends Controller
{
   
    public function readProductVariant()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $result = $odoo->where('id','322')
                        ->get('product.product');
        return $result;
    }

    public function createProductVariant(Request $r)
    {
    	$odoo = new \Edujugon\Laradoo\Odoo();

    	$odoo = $odoo->connect();

        $optional_product_ids = array();
        foreach ($r->optional_product_ids as $variable ) {

            array_push($optional_product_ids, array(4,intval($variable)));
        };

        $supplier_taxes_id = array();
        foreach ($r->supplier_taxes_id as $var) {

            array_push($supplier_taxes_id, array(4,intval($var)));
        };
    	
    	$id = $odoo->create('product.product',
                                [
                                    /*'image_variant' => $r->image_variant,*/
                                    'name' => $r->name,
                                    'active' => $r->active,
                                    'sales_count' => $r->sales_count,
                                    'sale_ok' => $r->sale_ok,
                                    'purchase_ok' => $r->purchase_ok,
                                    'type' => $r->type,
                                    'default_code' => $r->default_code,
                                    /*'barcode' => $r->barcode,*/
                                    'categ_id' => $r->categ_id,
                                    'lst_price' => $r->lst_price, 
                                    'standard_price' => $r->standard_price,
                                    'description' => $r->description,
                                    'invoice_policy' => $r->invoice_policy,
                                    'expense_policy' => $r->expense_policy,
                                    'optional_product_ids' => $optional_product_ids,
                                    'description_sale' => $r->description_sale,   
                                    'supplier_taxes_id' => $supplier_taxes_id
                                ]);
        dd($id);

    	return json_encode([
    		'status' => 200,/**/
    		'message' => "success"
    	]);
   		
    }

    public function updateProductVariant(Request $u)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        /*$optional_product_ids = array();
        foreach ($u->optional_product_ids as $variable ) {

            array_push($optional_product_ids, array(4,intval($variable)));
        };

        $supplier_taxes_id = array();
        foreach ($u->supplier_taxes_id as $var) {

            array_push($supplier_taxes_id, array(4,intval($var)));
        };
*/
        $updated = $odoo->where('name', $u->name)
                        ->update('product.product', [   'name' => $u->new_name,
                                                        /*'image_variant' => $u->image_variant,*/
                                                        'active' => $u->active,
                                                        'sales_count' => $u->sales_count,
                                                        'sale_ok' => $u->sale_ok,
                                                        'purchase_ok' => $u->purchase_ok,
                                                        'type' => $u->type,
                                                        'default_code' => $u->default_code,
                                                        /*'barcode' => $u->barcode,*/
                                                        'categ_id' => $u->categ_id,
                                                        'lst_price' => $u->lst_price, 
                                                        'standard_price' => $u->standard_price,
                                                        'description' => $u->description,
                                                        'invoice_policy' => $u->invoice_policy,
                                                        'expense_policy' => $u->expense_policy,
                                                        /*'optional_product_ids' => $optional_product_ids,*/
                                                        'description_sale' => $u->description_sale,   
                                                        /*'supplier_taxes_id' => $supplier_taxes_id*/
                                                    ]);

        if ($updated==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($updated);
    }

    public function deleteProductVariant(Request $d)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $result = $odoo ->where('name',$d->name)
                        ->delete('product.product');

        if ($result==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($result);
    }
}