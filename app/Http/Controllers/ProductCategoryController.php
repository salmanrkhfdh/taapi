<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductCategoryController extends Controller
{
   
    public function readProductCategory()
    {
        $odoo = new \Edujugon\Laradoo\Odoo();
        $odoo = $odoo->connect();

        $result = $odoo/*->where('id','198')*/
                        /*->limit(8)*/
                        ->fields('complete_name')
                        ->get('product.category');
                        
        return json_encode([
            'result' => $result]);
    }

    
}