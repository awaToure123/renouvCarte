<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class accueilController extends Controller
{
    public function index()
    {
        return view('accueil');
    }
}
