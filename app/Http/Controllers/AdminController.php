<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemandeRequest;
use App\Models\Demande_carte;
use App\Models\Demandeur;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function home(){

        return view("Admin.index");
    }


    public function listeDemande(){

        $demandeAll=Demande_carte::paginate(10);
        return view('Admin.Demande.listes',compact('demandeAll'));
    }

    public function detailsDemande($id){

        $demande=Demande_carte::find($id);
        if(!$demande){
            toastr()->error('Demande inexistante ou supprimer !');
            return back();
        }
        return view('Admin.Demande.details',compact('demande'));

    }

    public function index()
    {
        return view('accueil');
    }


    public function registerDemande(DemandeRequest $demandeRequest){

        if($demandeRequest->password != $demandeRequest->password_confirm){


            //flash()->warning('Attention !! Les mots de passes doivent etre identique');
            return back();
        }
        $user=new Demandeur();
        $user->nom=$demandeRequest->nom;
        $user->prenom=$demandeRequest->prenom;
        $user->email=$demandeRequest->email;
        $user->age=$demandeRequest->age ?:0;
        $user->tel=$demandeRequest->tel;
        $user->password= Hash::make($demandeRequest->password) ;

        $user->save();
        flash()->success('Operation completed successfully.');
        return back();

    }


    public function login(Request $request){

        $request->validate([
            'emailOrTel' =>'required',
            'password' => 'required|string'
        ]);

        $user=Demandeur::where('email',$request->emailOrTel)->orWhere('tel',$request->emailOrTel)->first();
        if(!$user){
            flash()->warning('Attention!! Information introuvable ');
            return back();
        }

        if(!Hash::check($request->password,$user->password)){
            flash()->warning('Attention!! Information introuvable ');
            return back();
        }

        session()->put('users',[$user]);
        session()->put('auth',true);

        return redirect()->route('users.dashboard');
    }
}
