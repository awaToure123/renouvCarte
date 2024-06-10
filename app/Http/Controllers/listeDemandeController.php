<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class listeDemandeController extends Controller
{
    public function demander()
{
    return view('html.html.demande');
}

}
