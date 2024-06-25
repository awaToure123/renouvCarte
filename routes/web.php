<?php


use App\Http\Controllers\accueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\listeDemandeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\UsersController;

Route::get('/',[AdminController::class, 'index'])->name('home');




Route::get('/adminDashboard',[AdminController::class,'home']);
Route::get('/listesDemande',[AdminController::class,'listeDemande'])->name('listes.demande');
Route::get('/detailsDemande/{id}',[AdminController::class,'detailsDemande'])->name('details.demande');

Route::post('/registerDemande',[AdminController::class,'registerDemande'])->name('registerDemande.users');

Route::post('/loginDemande',[AdminController::class,'login'])->name('login.users');



Route::get('users/dashboard',[UsersController::class,'index'])->name('users.dashboard');
Route::get('users/logout',[UsersController::class,'logoutUsers'])->name('users.logout');
Route::post('users/demande-carte',[UsersController::class,'demande_carte'])->name('demande.carte');
Route::get('users/renouveCarte',[UsersController::class,'renouveCarte'])->name('renouveCarte.listes');
Route::get('users/pertesCarte',[UsersController::class,'perteCarte'])->name('perteCarte.users');
