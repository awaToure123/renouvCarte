<?php

namespace App\Http\Controllers;

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
        $auth=session()->get('auth');

        if($auth ==null || $auth !=true){
           flash()->error('Veuillez vous authentifier');
           return redirect()->route('home');

        }
        $demandeAll=Demande_carte::where('demandeur_id', $users[0]->id)->get();
        return view('demandeur.dashboard',compact('users','demandeAll'));
    }



     public function edit($id){

        $users=session()->get('users');
        $demande=Demande_carte::find($id);
        if(!$demande){
            flash()->error('La demande ulterieure est supprimé');
            return back();
        }
        return view('demandeur.update_demande',compact('users','demande'));
     }

    public function addDemande(Request $request){



        $request->validate([
            'photo' => 'required|image:png,jpg,png',
            'acte_naissance' => 'required|mimes:pdf',
            'certificat_residence' => 'required|mimes:pdf',
            'piece_pere' => 'nullable|mimes:pdf',
            'piece_mere' => 'nullable|mimes:pdf',
            'id' => 'required',
        ], [
            'photo.required' => 'La photo est obligatoire.',
            'photo.image' => 'La photo doit être une image de type png ou jpg.',
            'acte_naissance.required' => 'L\'acte de naissance est obligatoire.',
            'acte_naissance.mimes' => 'L\'acte de naissance doit être un fichier de type pdf.',
            'certificat_residence.required' => 'Le certificat de résidence est obligatoire.',
            'certificat_residence.mimes' => 'Le certificat de résidence doit être un fichier de type pdf.',
            'piece_pere.mimes' => 'La pièce du père doit être un fichier de type pdf.',
            'piece_mere.mimes' => 'La pièce de la mère doit être un fichier de type pdf.',
            'id.required' => 'L\'identifiant est obligatoire.',
        ]);


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

    public function updateDemande(Request $request){

        $request->validate([
           'photo'=> 'nullable|image:png,jpg,png',
           'acte_naissance'=> 'nullable|mimes:pdf',
           'certificat_residence'=> 'nullable|mimes:pdf',
           'piece_pere'=> 'nullable|mimes:pdf',
           'piece_mere'=> 'nullable|mimes:pdf',
           'id'=> 'required|exists:demande_cartes,id',

        ]);

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
        $auth=session()->get('auth');

        if($auth ==null || $auth !=true){
           flash()->error('Veuillez vous authentifier');
           return redirect()->route('home');

        }

        $renouveauCarteAll = Renouvellement_carte::where('demandeur_id', $users[0]->id)->get();


        return view('users.renouveau.listes',compact('users','renouveauCarteAll'));
    }

    public function addRenouCarte(Request $request){

        $request->validate([
            'renouveauCarte' => 'required|mimes:pdf',
            'id' => 'required|exists:demandeurs,id',

        ],[
            'renouveauCarte.required' => 'Le fichier est requis',
            'renouveauCarte.mimes' => 'Le fichier doit etre un pdf',

        ]);

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
           'renouveauCarte'=> 'nullable|mimes:pdf',

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



    public function addPertes(Request $request){

        $request->validate([
            'extrait_naissance' => 'required|mimes:pdf',
            'certificat_de_perte' => 'required|mimes:pdf',
            'ancienne_carte' => 'required|mimes:pdf',
            'date_perte' => 'required',
            'id'=>'required'

        ],[
           'extrait_naissance.required' => 'L extrait de naissance est requis',
            'certificat_de_perte.required' => 'Le certificat de perte est requis',
            'ancienne_carte.required' => 'L ancienne carte  est requis',
            'date_perte.required' => 'La date de perte de la carte est requis',
            'id'=>'required',
            'extrait_naissance.mimes' => 'L extrait de naissance doit etre de type pdf',
            'certificat_de_perte.mimes' => 'Le certificat de perte doit etre de type pdf',
            'ancienne_carte.mimes' => 'L ancienne carte  doit etre de type pdf',

        ]);

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

     public function updatePertesCarte(Request $request){



        $request->validate([
            'extrait_naissance' => 'nullable|mimes:pdf',
            'certificat_de_perte' => 'nullable|mimes:pdf',
            'ancienne_carte' => 'nullable|mimes:pdf',
            'date_perte' => 'nullable',
            'id' => 'required',
        ], [
            'extrait_naissance.mimes' => 'L\'extrait de naissance doit être un fichier de type pdf.',
            'certificat_de_perte.mimes' => 'Le certificat de perte doit être un fichier de type pdf.',
            'ancienne_carte.mimes' => 'L\'ancienne carte doit être un fichier de type pdf.',
            'id.required' => 'L\'identifiant est obligatoire.',
        ]);


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

    public function reset_password_users_account(Request $request){
        $request->validate([
            'emailOrTel'=>'required',
            'password'=>'required|min:4',
            'password_confirm'=>'required|min:4',
        ],[
            'emailOrTel.required'=> 'Identifiant est requis !',
            'password.required'=> 'Le mot de passe est requis !',
            'password_confirm.required'=> 'La confirmation du mot de passe est requis !',
            'password_confirm.min'=> 'Le mot de passe de confirmation minimun 4 caractère !',
            'password.min'=> 'Le mot de passe de  minimun 4 caractère !',

        ]);

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


        return view('demandeur.messages',compact('users','messages'));
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
    $request->validate([
        'nom'=>'required',
        'prenom'=>'required',
        'email'=>'required|email',
        'tel'=>'required',
        'age'=>'required',
        'password'=>'nullable',
        'password_confirm'=>'nullable',
        'id'=>'required'
    ],[
        'nom.required'=>'Le nom est requis',
        'prenom'=>'Le prénom est requis',
        'email.email'=>'L email n est pas du bon format',
        'email.required'=>'L email est requis ',
        'tel'=>'Le numéro de téléphone est requis',
        'age'=>'L age est resquis'
    ]);

    $user=Demandeur::find($request->id);

    $user->nom=$request->nom;
    $user->prenom=$request->prenom;
    $user->email=$request->email;
    $user->tel=$request->tel;
    $user->age=$request->age;

    if($request->password){

        if($request->password != $request->password_confirm){
               toastr()->error('Les mots de passes sont différents');
               return back();
        }
        $user->password=Hash::make($request->password);
    }


    session()->forget('users');
    session()->put('users',[$user]);
    
    $user->save();
    toastr()->info('Informations modifier avec succès !');
    return back();
}

}

