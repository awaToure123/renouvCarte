<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class serviceController extends Controller
{
    public function servir(){

        return view('html.html.service');
    }
}
