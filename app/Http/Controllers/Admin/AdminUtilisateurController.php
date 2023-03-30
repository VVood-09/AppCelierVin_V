<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Validation\Rule;

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

    public function update(Request $request, User $utilisateur){
        
        $request->validate([
            'name' => 'required',
            // Pour valider le courriel unique de l'utilisateur à modifier
            // https://laravel.com/docs/master/validation#rule-unique
            'email'=> ['required', 'email', Rule::unique('users')->ignore($utilisateur->id)],
            'permission_id' => 'required|exists:permissions,id'
        ]);

        $utilisateur->update([
            'name'=>$request->name,
            'email'=>$request->email,
            'permission_id'=>$request->permission_id
        ]);

        $utilisateurs = User::all();
      
        return view('admin.membre.index', ['utilisateurs'=>$utilisateurs]);
    }

     public function destroy( User $utilisateur){
        
        $utilisateur->delete();

        return redirect()->action([self::class, 'index']);
      }
}
