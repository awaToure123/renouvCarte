<?php

namespace App\Http\Controllers;

use App\Http\Requests\DemandeRequest;
use App\Http\Requests\UsersRequest;
use App\Models\Demande_carte;
use App\Models\Demandeur;
use App\Models\Message;
use App\Models\PertesCartesUser;
use App\Models\Renouvellement_carte;
use App\Models\User;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //

    public function home(){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        $noumbreDemande=Demande_carte::where('status','En-cours')->count();
        $noumbreRenouve=Renouvellement_carte::where('status','En-cours')->count();
        $noumbrePertes=PertesCartesUser::where('status','En-cours')->count();

        return view("Admin.index",[
            'noumbreDemande'=>$noumbreDemande,
            'noumbreRenouve'=>$noumbreRenouve,
            'noumbrePertes'=>$noumbrePertes
        ]);
    }

    public function reset_password(){

        return view("Admin.reset_password");
    }

    public function update_account(){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        return view("Admin.update");
    }



    public function message(Request $request){

        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
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
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        $demandeAll=Demande_carte::paginate(10);
        return view('Admin.Demande.listes',compact('demandeAll'));
    }


    // Partie des traitement de renouvellement de carte
    public function listesRenouveau(){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        $demandeAll=Renouvellement_carte::paginate(10);

        return view('Admin.Renouve.listes',compact('demandeAll'));
    }

    public function detailsRenouveCarte($id){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        $demande=Renouvellement_carte::find($id);
        if(!$demande){
            toastr()->error('Demande inexistante ou supprimer !');
            return back();
        }
        return view('Admin.Renouve.details',compact('demande'));

    }

    public function valider_renouve_carte($id){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        $demande=Renouvellement_carte::find($id);
        if(!$demande){
            toastr()->error('Demande n est plus d actualité ');
            return back();
        }
        $demande->status='Valider';
        $message=new Message();
        $message->texte='Votre demande à été valider avec succèss';
        $message->demandeur_id=$demande->demandeur->id;
        $demande->save();
        toastr()->info('Demande valider avec succèss !');
        return back();
    }

    public function valider_perte_carte($id){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        $demande=PertesCartesUser::find($id);
        if(!$demande){
            toastr()->error('Demande n est plus d actualité ');
            return back();
        }
        $demande->status='Valider';
        $message=new Message();
        $message->texte='Votre demande à été valider avec succèss';
        $message->demandeur_id=$demande->demandeur->id;
        $demande->save();
        toastr()->info('Demande valider avec succèss !');
        return back();
    }
    //
    // Partie des traitement de demande de carte

    public function detailsDemande($id){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        $demande=Demande_carte::find($id);
        if(!$demande){
            toastr()->error('Demande inexistante ou supprimer !');
            return back();
        }
        return view('Admin.Demande.details',compact('demande'));

    }

    public function detailsPerteCarte($id){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        $demande=PertesCartesUser::find($id);
        if(!$demande){
            toastr()->error('Demande inexistante ou supprimer !');
            return back();
        }
        return view('Admin.Pertes.details',compact('demande'));

    }

    public function valider_demande_carte($id){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
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


    public function listesUsers(){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        $usersAll=User::paginate(5);
        return view('Admin.users',[
            'usersAll'=>$usersAll
        ]);
    }
    //
    public function listesPertesCarte(){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        $demandeAll=PertesCartesUser::paginate(10);

        return view('Admin.Pertes.listes',compact('demandeAll'));
    }

    public function detailsPertesCarte($id){
        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
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



    public function addAccount(UsersRequest $usersRequest){

        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }
        if($usersRequest->password != $usersRequest->password_confirm){
            flash()->error('Les mots de passes ne doivent pas etre différents ');
            return back();
        }

        $user= new User();
        $imagePath='';
        $user->email=$usersRequest->email ?:'';
        $user->password=Hash::make($usersRequest->password);
        $user->nom=$usersRequest->nom;
        $user->prenom=$usersRequest->prenom;
        $user->tel=$usersRequest->tel;
        $user->role='';
        if($usersRequest->hasFile('profile')){
            $imagePath = $usersRequest->file('profile')->store('users','public');
        }
        $user->profile=$imagePath;
        $user->save();
        flash()->info('Utilisateur crée avec succèss ! ');

        return back();

    }


    public function login_admin(){



        return view('Admin.login');
    }

    public function doLogin(Request $request){

        $request->validate([
            'emailOrTel'=>'required',
            'password'=>'required',
        ]);

        if(!Auth::attempt(['email'=>$request->emailOrTel,'password'=>$request->password])  && !Auth::attempt(['tel'=>$request->emailOrTel,'password'=>$request->password])){
            flash()->error('Informations invalide veuillez rentrer les bonnes informations');
            return back();
        }

        $users =Auth::user();
        flash()->info('Bienvenu à vous '.$users->nom);

        return redirect()->route('home.admin.dashboard');
    }

    public function logoutUsers(){


        Auth::logout();
        return redirect()->route('login_admin.admin');
    }


    public function updateAccountUsers(Request $usersRequest){

        if(!Auth::check()){
            toastr()->error('Veuilez vous connecté');

            return redirect()->route("login_admin.admin");

        }

        $usersRequest->validate([
            'nom'=>'required',
            'prenom'=>'required',
            'profile'=>'nullable|image:png,jpg,jpeg',
            'email'=>'nullable|email',
            'tel'=>'nullable',
            'id'=>'required'
        ]);

        $user= User::find($usersRequest->id);
        if(!$user){
            toastr()->error('Veuilez vous connecté');

            return back();

        }
        $user->email=$usersRequest->email ?:'';

        $user->nom=$usersRequest->nom;
        $user->prenom=$usersRequest->prenom;
        $user->tel=$usersRequest->tel;
        $user->role='';
        if($usersRequest->hasFile('profile')){
            $user->profile= $usersRequest->file('profile')->store('users','public');
        }

        $user->save();
        flash()->info('Utilisateur crée avec succèss ! ');

        return back();

    }


    public function reset_password_admin(Request $request){

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




        $users = User::where('email',$request->emailOrTel)->orWhere('tel',$request->emailOrTel)->first();
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
           return redirect()->route('login_admin.admin');

    }

}
