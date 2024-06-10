<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class suiviDemandeController extends Controller
{
    public function etat(){
        return view('html.html.suivi');
    }
}
