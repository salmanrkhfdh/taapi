<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaxController extends Controller
{
   
    public function readTax()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $result = $odoo->where('type_tax_use','sale')
                        /*->limit(8)*/
                        ->fields('name')
                        ->get('account.tax');
                        
        return json_encode([
            'result' => $result]);
    }
}