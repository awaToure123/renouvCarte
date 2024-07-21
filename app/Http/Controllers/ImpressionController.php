<?php

namespace App\Http\Controllers;

use App\Models\Demande_carte;
use Illuminate\Http\Request;

class ImpressionController extends Controller
{
    //



    public function print_listesDemandeCartes(){

        $demandeAll=Demande_carte::paginate(10);
        return view('Admin.print.demande.listes',compact('demandeAll'));

    }
}
