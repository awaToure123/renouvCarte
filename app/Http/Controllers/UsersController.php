<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPertesCartesRequest;
use App\Http\Requests\AddRenouveCarteRequest;
use App\Http\Requests\DemandeCarteRequest;
use App\Http\Requests\ResetPassWordRequest;
use App\Http\Requests\updateDemandeCarteRequest;
use App\Http\Requests\updatePertesCartesRequest;
use App\Http\Requests\UpdateUsersRequest;
use App\Models\Demande_carte;
use App\Models\Demandeur;
use App\Models\Message;
use App\Models\PertesCartesUser;
use App\Models\Renouvellement_carte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    //


    public function index(){


        $users=session()->get('users');


        $demandeAll=Demande_carte::where('demandeur_id', $users[0]->id)->get();
        return view('users.home',compact('users','demandeAll'));
    }



     public function edit($id){

        $users=session()->get('users');
        $demande=Demande_carte::find($id);
        if(!$demande){
            flash()->error('La demande ulterieure est supprimé');
            return back();
        }
        return view('users.details_demande',compact('users','demande'));
     }

    public function addDemande(DemandeCarteRequest $request){

        $user=session()->get('users');
        if($user[0]->status =='off'){
           toastr()->error('Veuillez completer vos informations');
           return redirect()->route('users.completes.informations');
        }
        $todayCount = Demande_carte::where('demandeur_id', $request->id)
        ->whereDate('created_at', date('Y-m-d'))
        ->count();

    if ($todayCount > 0) {
        flash()->warning('Vous avez déjà une demande en cours');
        return back();
    }
        $demande_carte = new Demande_carte();
        $demande_carte->photo = $request->file('photo')->store('demande','public');
        $demande_carte->acte_naissance = $request->file('acte_naissance')->store('demande','public');
        $demande_carte->certificat_residence = $request->file('certificat_residence')->store('demande','public');
        $piece_pere='';
        $piece_mere='';
        if($request->hasFile('piece_pere')){
            $piece_pere = $request->file('piece_pere')->store('demande','public') ;

        }
        if($request->hasFile('piece_mere')){
            $piece_mere = $request->file('piece_mere')->store('demande','public');

        }
        $demande_carte->piece_mere=$piece_mere;
        $demande_carte->piece_pere=$piece_pere;
        $demande_carte->status = 'En-cours';
        $demande_carte->demandeur_id = $request->id;
        $demande_carte->save();
        flash()->info('Demande envoyé avec succèss !');
        return back();
    }

    public function updateDemande(updateDemandeCarteRequest $request){



        $demande_carte = Demande_carte::find( $request->id );
          if(!$demande_carte){
            flash()->error('Réactualiser la page  !');
            return back();
          }

        if($request->hasFile('piece_pere')){
            $demande_carte->piece_pere = $request->file('piece_pere')->store('demande','public') ;

        }
        if($request->hasFile('piece_mere')){
            $demande_carte->piece_mere= $request->file('piece_mere')->store('demande','public');

        }


        if($request->hasFile('acte_naissance')){
            $demande_carte->acte_naissance = $request->file('acte_naissance')->store('demande','public') ;

        }
        if($request->hasFile('certificat_residence')){
            $demande_carte->certificat_residence= $request->file('certificat_residence')->store('demande','public');

        }

        if($request->hasFile('photo')){
            $demande_carte->photo= $request->file('photo')->store('demande','public');

        }

        $demande_carte->save();
           flash()->success('Modification reussi !');
        return back();
    }


    public function logoutUsers(){


        session()->forget('users');
        session()->forget('auth');
        return redirect()->route('home');

    }

    public function renouveCarte(){


        $users=session()->get('users');

        $renouveauCarteAll = Renouvellement_carte::where('demandeur_id', $users[0]->id)->get();


        return view('users.renouveau.listes',compact('users','renouveauCarteAll'));
    }

    public function addRenouCarte(AddRenouveCarteRequest $request){

        $user=session()->get('users');
        if($user[0]->status =='off'){
           toastr()->error('Veuillez completer vos informations');
           return redirect()->route('users.completes.informations');
        }

        $todayCount = Renouvellement_carte::where('demandeur_id', $request->id)
        ->whereDate('created_at', date('Y-m-d'))
        ->count();

    if ($todayCount > 0) {
        flash()->error('Veuillez vous authentifier');
        return;
    }

    $Renouvellement_carte = new Renouvellement_carte();


    $Renouvellement_carte->ancienne_carte = $request->file('renouveauCarte')->store('renouveau','public');

    $Renouvellement_carte->status = 'En-cours';
    $Renouvellement_carte->demandeur_id =$request->id;
    $Renouvellement_carte->save();
    flash()->success('Modification reussi !');
    return back();
    }


    public function edit_renouve($id){

        $users=session()->get('users');
        $demande=Renouvellement_carte::find($id);
        if(!$demande){
            flash()->error('La demande ulterieure est supprimé');
            return back();
        }
        return view('users.renouveau.update',compact('users','demande'));
     }
     public function updateRenouveau(Request $request){

        $request->validate([
           'id'=> 'required',
           'renouveauCarte'=> 're|mimes:pdf',

        ],[
            'renouveauCarte.mimes'=>'Le fichier doit etre de format pdf'
        ]);

        $demande_carte = Renouvellement_carte::find( $request->id );
          if(!$demande_carte){
            flash()->error('Réactualiser la page  !');
            return back();
          }

          $demande_carte->ancienne_carte = $request->file('renouveauCarte')->store('renouveau','public');

        $demande_carte->save();
           flash()->success('Modification reussi !');
        return back();
    }
    public function perteCarte(){


        $users=session()->get('users');
        $auth=session()->get('auth');

        if($auth ==null || $auth !=true){
           flash()->error('Veuillez vous authentifier');
           return redirect()->route('home');

        }
        $demandeAll=PertesCartesUser::where('demandeur_id',$users[0]->id)->get();
        return view('users.pertes.pertes_cartes',compact('users','demandeAll'));
    }



    public function addPertes(AddPertesCartesRequest $request){

        $user=session()->get('users');
         if($user[0]->status =='off'){
            toastr()->error('Veuillez completer vos informations');
            return redirect()->route('users.completes.informations');
        }
        $todayCount = PertesCartesUser::where('demandeur_id', $request->id)
            ->whereDate('created_at', date('Y-m-d'))
            ->count();

        if ($todayCount > 0) {
           flash()->error('Veuillez actualisé la page');
            return back();
        }

        $PertesCartesUser = new PertesCartesUser();
        $PertesCartesUser->ancienne_carte = $request->file('ancienne_carte')->store('pertes','public');
        $PertesCartesUser->certificat_de_perte = $request->file('certificat_de_perte')->store('pertes','public');
        $PertesCartesUser->extrait_naissance =  $request->file('extrait_naissance')->store('pertes','public');
        $PertesCartesUser->date_perte = $request->date_perte;
        $PertesCartesUser->status = 'En-cours';
        $PertesCartesUser->demandeur_id = $request->id;
        $PertesCartesUser->save();
        flash()->info('Information valider');
        return back();
    }

    public function edit_pertes($id){

        $users=session()->get('users');
        $demande=PertesCartesUser::find($id);
        if(!$demande){
            flash()->error('La demande ulterieure est supprimé');
            return back();
        }
        return view('users.pertes.update',compact('users','demande'));
     }

     public function updatePertesCarte(updatePertesCartesRequest $request){



        $demande_carte = PertesCartesUser::find( $request->id );
          if(!$demande_carte){
            flash()->error('Réactualiser la page  !');
            return back();
          }

        if($request->hasFile('ancienne_carte')){
            $demande_carte->ancienne_carte = $request->file('ancienne_carte')->store('pertes','public');

        }
        if($request->hasFile('certificat_de_perte')){
            $demande_carte->certificat_de_perte = $request->file('certificat_de_perte')->store('pertes','public');

        }


        if($request->hasFile('extrait_naissance')){
            $demande_carte->extrait_naissance =  $request->file('extrait_naissance')->store('pertes','public');

        }
        if($request->hasFile('certificat_residence')){
            $demande_carte->certificat_residence= $request->file('certificat_residence')->store('demande','public');

        }

        if($request->perte_date){
            $demande_carte->date_perte = $request->date_perte;

        }

        $demande_carte->save();
           flash()->success('Modification reussi !');
        return back();
    }


    public function reset_passwordusers(){

        return view('reset_password');
    }

    public function reset_password_users_account(ResetPassWordRequest $request){


        $users = Demandeur::where('email',$request->emailOrTel)->orWhere('tel',$request->emailOrTel)->first();
        if(!$users){
            toastr()->error('L email ou numéro de téléphone incorrect');

            return back();
        }
        if($request->password != $request->password_confirm){
            toastr()->error('Attention les mots de passes sont différents');

            return back()->withInput();
        }
        $users->password=Hash::make($request->password);
        $users->save();
        flash()->info('Veuillez vous connecter maintenant');
           return redirect()->route('home');
    }


    public function message(){
        $users=session()->get('users');
        $auth=session()->get('auth');

        if($auth ==null || $auth !=true){
           flash()->error('Veuillez vous authentifier');
           return redirect()->route('home');

        }

        $messages = Message::where('demandeur_id', $users[0]->id)->get();


        return view('users.messages',compact('users','messages'));
}


public function deleteMessage($id){
    $auth=session()->get('auth');

    if($auth ==null || $auth !=true){
       flash()->error('Veuillez vous authentifier');
       return redirect()->route('home');

    }

    $messages = Message::find( $id);
    $messages->delete();
    flash()->info('Message supprime avec succèss');
    return redirect()->back();
}

public function home_page(){

    $users=session()->get('users');
    $demandeAll=Demande_carte::where('demandeur_id', $users[0]->id)->get();
    return view('users.home',[
        'demandeAll'=>  $demandeAll,
        'users'=> $users
    ]);
}


public function pertes_cartes(){

    $users=session()->get('users');
    $demandeAll=Demande_carte::where('demandeur_id', $users[0]->id)->get();
    return view('users.demande.pertes_cartes',[
        'demandeAll'=>  $demandeAll,
        'users'=> $users
    ]);
}


public function update_account(){
    $users=session()->get('users');

    return view('users.update_information',[
        'users'=>$users
    ]);
}


public function user_update(Request $request){


    $user=Demandeur::find($request->id);

    $user->nom=$request->nom;
    $user->prenom=$request->prenom;
    $user->email=$request->email;
    $user->tel=$request->tel;
    $user->professession=$request->professession;
    $user->region=$request->region;
    $user->adresse=$request->adresse;
    $user->age=$request->age;
    $user->situation_matrimonial=$request->situation_matrimonial;

    $user->status='on';
    session()->forget('users');
    session()->put('users',[$user]);

    $user->save();
    toastr()->info('Informations modifier avec succès !');
    return back();
}

}

