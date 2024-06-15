<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //


    public function index(){

        $users=session()->get('users');
        return view('demandeur.dashboard',compact('users'));
    }
}
