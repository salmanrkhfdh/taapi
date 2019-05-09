<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QuotationController extends Controller
{
   
    public function readQuotation()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $result = $odoo /*->where('user_id',2)*/
                        ->where('id', '37')
                        ->get('sale.order');
        return $result;
    }

    public function createQuotation(Request $r)
    {
    	$odoo = new \Edujugon\Laradoo\Odoo();

    	$odoo = $odoo->connect();
    	
    	$id = $odoo->create('sale.order',
                                [
                                    'partner_id' => $r->partner_id,
                                    'partner_invoice_id' => $r->partner_invoice_id,
                                    'partner_shipping_id' => $r->partner_shipping_id,
                                    'state' => $r->state,
                                    'invoice_status'=>$r->invoice_status,
                                    'pricelist_id'=>'1',
                                    'sale_order_template_id' => $r->sale_order_template_id,
                                    'validity_date' => $r->validity_date,
                                    'payment_term_id' => $r->payment_term_id,
                                    'note' => $r->note,
                                    'team_id' => $r->team_id,
                                    'client_order_ref' => $r->client_order_ref,
                                    'require_signature' => $r->require_signature,
                                    'require_payment' => $r->require_payment,
                                    'date_order' => $r->date_order,
                                    'fiscal_position_id' => $r->fiscal_position_id
                                ]);
        dd($id);

    	return json_encode([
    		'status' => 200,
    		'message' => "success"
    	]);
   		
    }

    public function updateQuotation(Request $u)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $updated = $odoo->where('name', $u->name)
                        ->update('sale.order', 
                                    [
                                        'partner_id' => $u->partner_id,
                                        'partner_invoice_id' => $u->partner_invoice_id,
                                        'partner_shipping_id' => $u->partner_shipping_id,
                                        'state' => $u->state,
                                        'invoice_status'=>$u->invoice_status,
                                        'sale_order_template_id' => $u->sale_order_template_id,
                                        'validity_date' => $u->validity_date,
                                        'payment_term_id' => $u->payment_term_id,
                                        'note' => $u->note,
                                        'team_id' => $u->team_id,
                                        'client_order_ref' => $u->client_order_ref,
                                        'require_signature' => $u->require_signature,
                                        'require_payment' => $u->require_payment,
                                        'date_order' => $u->date_order,
                                        'fiscal_position_id' => $u->fiscal_position_id
                                    ]);

        if ($updated==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($updated);
    }

    public function deleteQuotation(Request $d)
    {
        $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo->connect();

        $result = $odoo ->where('id',$d->id)
                        ->delete('sale.order');

        if ($result==true)
            return json_encode([
                'status' => 200,
                'message' => "success"
            ]);
        else
            dd($result);
    }
}