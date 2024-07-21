<?php

namespace App\Http\Controllers;

use App\Models\Demande_carte;
use App\Models\PertesCartesUser;
use App\Models\Renouvellement_carte;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;


class PrintController extends Controller
{
    public function print_listesDemandeCartes(){

        $demandeAll=Demande_carte::paginate(10);
        $pdf=Pdf::loadView('Admin.print.demande.listes',['demandeAll'=>$demandeAll]);


        return $pdf->download();
    }


    public function print_listesRenouveCartes(){

        $demandeAll=Renouvellement_carte::paginate(10);
        $pdf=Pdf::loadView('Admin.print.renouve.listes',['demandeAll'=>$demandeAll]);


        return $pdf->download();
    }


    public function print_listesPertesCartes(){

        $demandeAll=PertesCartesUser::paginate(10);
        $pdf=Pdf::loadView('Admin.print.pertes.listes',['demandeAll'=>$demandeAll]);


        return $pdf->download();
    }
}
