<?php

namespace App\Http\Controllers;

use App\Models\Demande_carte;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //


    public function index(){


        $users=session()->get('users');
        $auth=session()->get('auth');

        if($auth ==null || $auth !=true){
           toastr()->error('Veuillez vous authentifier');
           return redirect()->route('home');

        }

        return view('demandeur.dashboard',compact('users'));
    }


    public function logoutUsers(){


        session()->forget('users');
        session()->forget('auth');
        return redirect()->route('home');

    }

    public function demande_carte(Request $request){


        $request->validate([
            'acte_naissance' => 'required|mimes:pdf',
            'certificat_residence' => 'required|mimes:pdf',
            'piece_pere' => 'nullable|mimes:pdf',
            'piece_mere' => 'nullable|mimes:pdf',
            'id' => 'required|exists:demandeurs,id',
            'age' => 'required',
            'photo' => 'required|mimes:pdf'
        ], [
            'acte_naissance.required' => 'L\'acte de naissance est requis.',
            'acte_naissance.mimes' => 'L\'acte de naissance doit être un fichier PDF.',
            'certificat_residence.required' => 'Le certificat de résidence est requis.',
            'certificat_residence.mimes' => 'Le certificat de résidence doit être un fichier PDF.',
            'piece_pere.mimes' => 'La pièce du père doit être un fichier PDF.',
            'piece_mere.mimes' => 'La pièce de la mère doit être un fichier PDF.',
            'id.required' => 'L\'ID est requis.',
            'id.exists' => 'L\'ID fourni n\'existe pas.',
            'age.required' => 'L\'âge est requis.',
            'photo.required' => 'La photo est requise.',
            'photo.mimes' => 'La photo doit être un fichier PDF.'
        ]);

        if($request->age < 18 ){

            if(!$request->hasFile('piece_pere') || !$request->hasFile('piece_mere')){
                toastr()->error('Vous etes mimieur donc les pièces de vos parents sont réquis _');
                return back();
            }


        }

        $demande_carte= new Demande_carte();


        if($request->hasFile('acte_naissance')){
            $demande_carte->acte_naissance=$request->file('acte_naissance')->store('demande','public');
        }
        if($request->hasFile('certificat_residence')){
            $demande_carte->certificat_residence=$request->file('certificat_residence')->store('demande','public');
        }

        $demande_carte->photo=$request->file('photo')->store('demande','public');
        $demande_carte->demandeur_id=$request->id;
            $demande_carte->piece_pere=$request->file('piece_pere')->store('demande','public');
            $demande_carte->piece_mere=$request->file('piece_mere')->store('demande','public');
            $demande_carte->save();


            toastr()->success('Votre demande à été soumis avec succèss !');
            return back();
    }
}
