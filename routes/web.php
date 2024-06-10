<?php


use App\Http\Controllers\accueilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\listeDemandeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\contactController;
use App\Http\Controllers\serviceController;
     
Route::get('/',[accueilController::class, 'index']);

Route::get('/contact', [contactController::class, 'contactez']);


Route::get('/demand',[listeDemandeController::class, 'demander']);

Route::get('/serve',[serviceController::class, 'servir']);

Route::get('/adminDashboard',[AdminController::class,'home']);

//Route::get('/',[contact::class,'about']);
//Route::post('/ajouterEtudiant',[demande::class,'addEtudiant']);

