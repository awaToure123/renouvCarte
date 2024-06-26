<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemandeRequest;
use App\Models\Demande_carte;
use App\Models\Demandeur;
use App\Models\Message;
use App\Models\PertesCartesUser;
use App\Models\Renouvellement_carte;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function home(){

        return view("Admin.index");
    }


    public function message(Request $request){

        $request->validate([
            "message"=> "required|min:2",
            'id'=>'required|exists:demandeurs,id'
        ]);

        $message=new Message();
        $message->message=$request->message;
        $message->demandeur_id=$request->id;
        $message->save();
         toastr()->success('Message envoyé 📩');
         return back();

    }


    public function listeDemande(){

        $demandeAll=Demande_carte::paginate(10);
        return view('Admin.Demande.listes',compact('demandeAll'));
    }


    // Partie des traitement de renouvellement de carte
    public function listesRenouveau(){
        $demandeAll=Renouvellement_carte::paginate(10);

        return view('Admin.Renouve.listes',compact('demandeAll'));
    }

    public function detailsRenouveCarte($id){

        $demande=Renouvellement_carte::find($id);
        if(!$demande){
            toastr()->error('Demande inexistante ou supprimer !');
            return back();
        }
        return view('Admin.Renouve.details',compact('demande'));

    }

    public function valider_renouve_carte($id){

        $demande=Demande_carte::find($id);
        if(!$demande){
            toastr()->error('Demande n est plus d actualité ');
            return back();
        }
        $demande->status='Valider';
        $demande->save();
        toastr()->info('Demande valider avec succèss !');
        return back();
    }
    //
    // Partie des traitement de demande de carte

    public function detailsDemande($id){

        $demande=Demande_carte::find($id);
        if(!$demande){
            toastr()->error('Demande inexistante ou supprimer !');
            return back();
        }
        return view('Admin.Demande.details',compact('demande'));

    }

    public function valider_demande_carte($id){

        $demande=Demande_carte::find($id);
        if(!$demande){
            toastr()->error('Demande n est plus d actualité ');
            return back();
        }
        $demande->status='Valider';
        $demande->save();
        toastr()->info('Demande valider avec succèss !');
        return back();
    }

    //
    public function listesPertesCarte(){
        $demandeAll=PertesCartesUser::paginate(10);

        return view('Admin.Pertes.listes',compact('demandeAll'));
    }

    public function detailsPertesCarte($id){

        $demande=PertesCartesUser::find($id);
        if(!$demande){
            toastr()->error('Demande inexistante ou supprimer !');
            return back();
        }
        return view('Admin.Pertes.details',compact('demande'));

    }

        // Page d acceuil
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
