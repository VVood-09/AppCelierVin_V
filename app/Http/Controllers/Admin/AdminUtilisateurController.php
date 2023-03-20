<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;

class AdminUtilisateurController extends Controller
{
    public function index(){
        $utilisateurs = User::all();
      
        return view('admin.membre.index', ['utilisateurs'=>$utilisateurs]);
    }
}
