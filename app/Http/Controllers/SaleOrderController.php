<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaleOrderController extends Controller
{
	public function coba(){
		$odoo = new \Edujugon\Laradoo\Odoo();
		$odoo = $odoo->connect();

		$result = $odoo/*->limit(1)*/->where('partner_id',4)
								->get('sale.order');
		return $result;
	}

	public function createSaleOrder(Request $r)
	{
		$odoo = new \Edujugon\Laradoo\Odoo();

    	$odoo = $odoo->connect();

    	$id = $odoo->create('sale.order', [	'partner_id' => $r->partner_id
    										/*'sale_order_template_id' => $r->sale_order_template_id,
    										'validity_date' => $r->validity_date,
    										'payment_term_id' => $r->payment_term_id,
    										'order_line' => $r->order_line,
    										'note' => $r->note,
    										'sale_order_option_ids' => $r->sale_order_option_ids,
    										'user_id' => $r->user_id,
    										'tag_ids' => $r->tag_ids,
    										'team_id' => $r->team_id,
    										'client_order_ref' => $r->client_order_ref,
    										'require_signature' => intval($r->require_signature),
    										'require_payment' => intval($r->require_payment),
    										'date_order' => $r->date_order,
    										'fiscal_position_id' => $r->fiscal_position_id*/
    										]
    						);

    	dd($id);/*
    	
    	return json_encode([
    		'status' => 200,
    		'message' => "success"
    	]);*/
	}

	public function readSaleOrder(){
		$odoo = new \Edujugon\Laradoo\Odoo();
		$odoo = $odoo->connect();

		$result = $odoo/*->limit(1)->where('id',22)*/
								->fields('name', 'state','partner_id', 'sale_order_template_id', 'validity_date', 'payment_term_id', 'order_line','note', 'sale_order_option_ids', 'user_id', 'tag_ids', 'team_id', 'client_order_ref', 'require_signature','require_payment','fiscal_position_id', 'invoice_status')
								->get('sale.order');
		return $result;
	}
}
