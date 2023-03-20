<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;

class AdminUtilisateurController extends Controller
{
    public function index(){
        $utilisateurs = User::all();
      
        return view('admin.membre.index', ['utilisateurs'=>$utilisateurs]);
    }

    public function show(User $utilisateur){
        $permissions = Permission::all();

        return view('admin.membre.show', ['utilisateur' => $utilisateur, 'permissions' => $permissions]);
    }

    public function update(Request $request){
        return $request;
    }
}
