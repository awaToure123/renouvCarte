<?php


use App\Http\Controllers\accueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\listeDemandeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\DemandeursAuthMiddelWare;
use App\Http\Middleware\UsersAuthMiddelWare;

Route::get('/',[AdminController::class, 'index'])->name('home');
Route::post('/loginDemande',[AdminController::class,'login'])->name('login.users');
Route::get('/login-users',[AdminController::class,'login_admin'])->name('login_admin.admin');
Route::post('/authentification-users',[AdminController::class,'doLogin'])->name('login_admin.admin.doLogin');

// Users
Route::get('users/dashboard',[UsersController::class,'index'])->name('users.dashboard');
Route::get('users/logout',[UsersController::class,'logoutUsers'])->name('users.logout');

Route::get('users/logou-admin',[AdminController::class,'logoutUsers'])->name('logout.admin');
Route::get('users/reset-password',[AdminController::class,'reset_password'])->name('reset.password.users');

Route::get('users/update_account',[AdminController::class,'update_account'])->name('update.account.users');
Route::post('/update_account_users',[AdminController::class,'updateAccountUsers'])->name('update.Account.Users.admin');
Route::post('/update_resetPasswordUserss',[AdminController::class,'reset_password_admin'])->name('reset.password.admin.users');


Route::get('/adminDashboard',[AdminController::class,'home'])->name('home.admin.dashboard');
Route::get('/listesDemande',[AdminController::class,'listeDemande'])->name('listes.demande');
Route::get('/detailsDemande/{id}',[AdminController::class,'detailsDemande'])->name('details.demande');
Route::get('/valierDemandeCarte/{id}',[AdminController::class,'valider_demande_carte'])->name('valider.demande.carte');
Route::get('/listesRenouveauCart',[AdminController::class,'listesRenouveau'])->name('listes.Renouveau');
Route::get('/detailsRenouveCarte/{id}',[AdminController::class,'detailsRenouveCarte'])->name('details.renouve.carte');

Route::post('/registerDemande',[AdminController::class,'registerDemande'])->name('registerDemande.users');
Route::get('/listesPertesCarte',[AdminController::class,'listesPertesCarte'])->name('listes.cartes.pertes');

Route::post('/sende-message',[AdminController::class,'message'])->name('message.utilisateurs');
Route::get('/detailsPertesCartes/{id}',[AdminController::class,'detailsPerteCarte'])->name('details.PerteCarte');
Route::get('/validePertes-cartes/{id}',[AdminController::class,'valider_perte_carte'])->name('valider.perte.carte');

Route::get('/valideRenouve-cartes/{id}',[AdminController::class,'valider_renouve_carte'])->name('valider.renouve.carte');
Route::get('/listesUsers',[AdminController::class,'listesUsers'])->name('listesUsers.app');
Route::post('/add-accounteusers',[AdminController::class,'addAccount'])->name('addAccount.users.admin');
Route::get('/update_users-account/{id}',[AdminController::class,'valider_renouve_carte'])->name('valider.renouve.carte');





    Route::post('users/demande-carte',[UsersController::class,'addDemande'])->name('demande.carte.forms');
    Route::get('users/demande-carte_update/{id}',[UsersController::class,'edit'])->name('edit.demande.carte');
    Route::post('users/upate-demande-carte',[UsersController::class,'updateDemande'])->name('update.Demande.carte');

    Route::get('users/renouveCarte',[UsersController::class,'renouveCarte'])->name('renouveCarte.listes');
    Route::post('users/add-demande-renouve',[UsersController::class,'addRenouCarte'])->name('renouveCarte.addRenouCarte');
    Route::get('users/demande-renouveCarte/{id}',[UsersController::class,'edit_renouve'])->name('updateRenouveau.cartes.users');
    Route::post('users/update-renouveCarte',[UsersController::class,'updateRenouveau'])->name('updateRenouveau.cartes.users.renouveau');

    Route::get('users/pertesCarte',[UsersController::class,'perteCarte'])->name('perteCarte.users');
    Route::post('users/add-new-pertesCarte',[UsersController::class,'addPertes'])->name('perteCarte.users.add');
    Route::get('users/pertesCarte-users/{id}',[UsersController::class,'edit_pertes'])->name('users.edit_pertes');
    Route::post('users/add-new-update-pertes',[UsersController::class,'updatePertesCarte'])->name('update.Pertes.Carte');
