<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductAttributeValue extends Controller
{
   
    public function readProductAttributeValue()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $result = $odoo/*->limit(1)*/
                        /*->where('name','plastic')*/
                        ->get('product.attribute.value');
        return $result;
    }

    public function createProductAttributeValue(Request $r)
    {
    	$odoo = new \Edujugon\Laradoo\Odoo();

    	$odoo = $odoo->connect();
    	
    	$id = $odoo->create('product.attribute.value',
                                [
                                    'name' => $r->name,
                                    'attribute_id' => $r->attribute_id,
                                    'is_custom' => $r->is_custom,
                                    'html_color' => $r->html_color,
                                ]);
        dd($id);

    	return json_encode([
    		'status' => 200,
    		'message' => "success"
    	]);
   		
    }

    public function updateProductAttributeValue(Request $u)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $updated = $odoo->where('name', $u->name
                                /*'type', $u->type,
                                'create_variant', $u->create_variant,
                                'value_ids', $u->value_ids*/
                                )
                        ->update('product.attribute.value', ['name' => $u->new_name,
                                                             'attribute_id' => $u->new_attribute_id,
                                                             'is_custom' => $u->new_is_custom,
                                                             'html_color' => $u->new_html_color
                                                            ]);

        if ($updated==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($updated);
    }

    public function deleteProductAttributeValue(Request $d)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $result = $odoo ->where('name',$d->name)
                        ->delete('product.attribute.value');

        if ($result==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($result);
    }
}