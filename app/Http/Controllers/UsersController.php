<?php

namespace App\Http\Controllers;

use App\Models\Demande_carte;
use App\Models\PertesCartesUser;
use App\Models\Renouvellement_carte;
use Illuminate\Http\Request;

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
           'photo'=> 'required|image:png,jpg,png',
           'acte_naissance'=> 'required|mimes:pdf',
           'certificat_residence'=> 'required|mimes:pdf',
           'piece_pere'=> 'nullable|mimes:pdf',
           'piece_mere'=> 'nullable|mimes:pdf',
           'id'=> 'required',

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


        return view('demandeur.renouveCarte',compact('users','renouveauCarteAll'));
    }

    public function addRenouCarte(Request $request){

        $request->validate([
            'renouveauCarte' => 'required|mimes:pdf',
            'id' => 'required|exists:demandeurs,id',

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
        return view('demandeur.update_renouve',compact('users','demande'));
     }
     public function updateRenouveau(Request $request){

        $request->validate([
           'id'=> 'required',
           'renouveauCarte'=> 'nullable|mimes:pdf',


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
        return view('demandeur.pertesCartes',compact('users','demandeAll'));
    }



    public function addPertes(Request $request){

        $request->validate([
            'extrait_naissance' => 'required|mimes:pdf',
            'certificat_de_perte' => 'required|mimes:pdf',
            'ancienne_carte' => 'required|mimes:pdf',
            'date_perte' => 'required',
            'id'=>'required'

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
        return view('demandeur.pertes_update',compact('users','demande'));
     }

     public function updatePertesCarte(Request $request){

        $request->validate([
            'extrait_naissance' => 'nullable|mimes:pdf',
            'certificat_de_perte' => 'nullable|mimes:pdf',
            'ancienne_carte' => 'nullable|mimes:pdf',
            'date_perte' => 'nullable',
            'id'=>'required'
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

}
