<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationTemplatesController extends Controller
{
   
    public function readQuotationTemplates()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $result = $odoo/*->limit(1)*/
                        /*->where('name','plastic')*/
                        ->get('sale.order.template');
        return $result;
    }

    public function createQuotationTemplates(Request $r)
    {
    	$odoo = new \Edujugon\Laradoo\Odoo();

    	$odoo = $odoo->connect();
    	dd($r);
    	$id = $odoo->create('sale.order.template',
                                [
                                    'name' => $r->name,
                                    'number_of_days' => $r->number_of_days,
                                    'require_signature' => $r->require_signature,
                                    'require_payment' => $r->require_payment,
                                    /*'mail_template_id' => $r->mail_template_id,*/
                                    'active' => $r->active,
                                    'note' => $r->note
                                ]);
        /*dd($id);*/

    	return json_encode([
    		'status' => 200,
    		'message' => "success"
    	]);
   		
    }

    public function updateQuotationTemplates(Request $u)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $updated = $odoo->where('name', $u->name)
                        ->update('sale.order.template', ['name' => $u->new_name,
                                                         'number_of_days' => $u->new_number_of_days,
                                                         'require_signature' => $u->new_require_signature,
                                                         'require_payment' => $u->new_require_payment,
                                                         'active' => $u->new_active,
                                                         'note' => $u->new_note
                                                        ]);

        if ($updated==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($updated);
    }

    public function deleteQuotationTemplates(Request $d)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $result = $odoo ->where('name',$d->name)
                        ->delete('sale.order.template');

        if ($result==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($result);
    }
}