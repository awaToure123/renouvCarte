<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemandeRequest;
use App\Models\Demandeur;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function home(){ 

        return view("Admin.index");
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
        $user->tel=$demandeRequest->tel;
        $user->password= Hash::make($demandeRequest->password) ;

        $user->save();
        //flash()->success('Operation completed successfully.');
        return back();

    }


    public function login(Request $request){

        $request->validate([
            'emailOrTel' =>'required',
            'password' => 'required|string'
        ]);

        $user=Demandeur::where('email',$request->emailOrTel)->orWhere('tel',$request->emailOrTel)->first();
        if(!$user){
            //flash()->warning('Attention!! Information introuvable ');
            return back();
        }
        if(!Hash::check($request->password,$user->password)){
            //flash()->warning('Attention!! Information introuvable ');
            return back();
        }

        //flash()->info('Utilisateur trouvé ');
        session()->put('users',[$user]);
            return redirect()->route('users.dashboard');
    }
}
