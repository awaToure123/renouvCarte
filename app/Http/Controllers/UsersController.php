<?php

namespace App\Http\Controllers;

use App\Models\Demande_carte;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //


    public function index(){


        $users=session()->get('users');
        $auth=session()->get('auth');

        if($auth ==null || $auth !=true){
           toastr()->error('Veuillez vous authentifier');
           return redirect()->route('home');

        }

        return view('demandeur.dashboard',compact('users'));
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
           toastr()->error('Veuillez vous authentifier');
           return redirect()->route('home');

        }

        return view('demandeur.renouveCarte',compact('users'));
    }

    public function perteCarte(){


        $users=session()->get('users');
        $auth=session()->get('auth');

        if($auth ==null || $auth !=true){
           toastr()->error('Veuillez vous authentifier');
           return redirect()->route('home');

        }

        return view('demandeur.pertesCartes',compact('users'));
    }


}
