<?php


use App\Http\Controllers\accueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\listeDemandeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\UsersController;

Route::get('/',[AdminController::class, 'index'])->name('home');

Route::get('/contact', [contactController::class, 'contactez']);


Route::get('/demand',[listeDemandeController::class, 'demander']);

Route::get('/serve',[serviceController::class, 'servir']);

Route::get('/adminDashboard',[AdminController::class,'home']);

Route::post('/registerDemande',[AdminController::class,'registerDemande'])->name('registerDemande.users');

Route::post('/loginDemande',[AdminController::class,'login'])->name('login.users');



Route::get('users/dashboard',[UsersController::class,'index'])->name('users.dashboard');
Route::get('users/logout',[UsersController::class,'logoutUsers'])->name('users.logout');
Route::post('users/demande-carte',[UsersController::class,'demande_carte'])->name('demande.carte');
