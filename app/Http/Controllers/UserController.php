<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function login(Request $r)
    {
   $odoo = new \Edujugon\Laradoo\Odoo();

        $odoo = $odoo
            ->username($r->username)
            ->password($r->password)
            ->connect();

        $userId= $odoo->getUid();

        dd($userId);


    }
}