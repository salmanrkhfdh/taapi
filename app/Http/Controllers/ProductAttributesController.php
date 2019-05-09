<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductAttributesController extends Controller
{
   
    public function readProductAttribute()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $result = $odoo/*->limit(1)->where('id',22)*/
                                ->get('product.attribute');
        return $result;
    }

    public function createProductAttribute(Request $r)
    {
    	$odoo = new \Edujugon\Laradoo\Odoo();

    	$odoo = $odoo->connect();
    	
    	$id = $odoo->create('product.attribute',
                                [
                                    'name' => $r->name,
                                    'type' => $r->type,
                                    'create_variant' => $r->create_variant,
                                    'value_ids' => $r->value_ids
                                ]);
   /*     dd($id);*/

    	return json_encode([
    		'status' => 200,
    		'message' => "success"
    	]);
   		
    }

    public function updateProductAttribute(Request $u)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $updated = $odoo->where('name', $u->name,
                                /*'type', $u->type,
                                'create_variant', $u->create_variant,
                                'value_ids', $u->value_ids*/
                                )
                        ->update('product.attribute',   ['name' => $u->new_name,
                                                          'type'=> $u->new_type,
                                                          'create_variant'=> $u->new_create_variant,
                                                          'value_ids'=> $u->new_value_ids
                                                        ]);

        if ($updated==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($updated);
    }

    public function deleteProductAttribute(Request $d)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $result = $odoo ->where('name',$d->name)
                        ->delete('product.attribute');

        if ($result==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($result);
    }
}