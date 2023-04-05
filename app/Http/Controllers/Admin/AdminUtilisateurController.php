<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\User;
use Illuminate\Validation\Rule;
use App\Rules\NoBacktick;

class AdminUtilisateurController extends Controller{

    /**
    * Affiche une liste paginée de tous les utilisateurs enregistrés dans le système, avec la date de leur création formatée.
    * @return \Illuminate\Contracts\View\View
    */
    public function index(){
        $utilisateurs = User::paginate(10);
         
        foreach($utilisateurs as $utilisateur){

            $date = $utilisateur->created_at;
            
            $datetime = new \DateTime($date);
            
            $date_formate = $datetime->format('d/m/Y');
            
            $utilisateur->created_at_format = $date_formate;
        }
               
        return view('admin.membres.index', ['utilisateurs'=>$utilisateurs]);
    }


    /**
    *Affiche les détails d'un utilisateur avec la liste des permissions disponibles.
    *@param User $utilisateur 
    *@return \Illuminate\View\View La vue "admin.membres.show" avec l'utilisateur et la liste des permissions.
    **/
    public function show(User $utilisateur){
        $permissions = Permission::all();

        return view('admin.membres.show', ['utilisateur' => $utilisateur, 'permissions' => $permissions]);
    }


    /**
    *Met à jour les informations de l'utilisateur spécifié dans la base de données
    *@param \Illuminate\Http\Request $request 
    *@param \App\Models\User $utilisateur
    *@return \Illuminate\Http\RedirectResponse Redirige vers la page d'index des utilisateurs après la modification réussie
    */
    public function update(Request $request, User $utilisateur){
      
        $request->validate([
            'nom' => ['required', new NoBacktick],
            // Pour valider le courriel unique de l'utilisateur à modifier
            // https://laravel.com/docs/master/validation#rule-unique
            'email'=> ['required', 'email', Rule::unique('users')->ignore($utilisateur->id)],
            'permission_id' => 'required|exists:permissions,id'
        ]);

        $utilisateur->update([
            'name'=>$request->nom,
            'email'=>$request->email,
            'permission_id'=>$request->permission_id
        ]);

        $utilisateurs = User::all();
      
        return redirect()->action([self::class, 'index']);
    }


    /**
    *Supprime l'utilisateur donné de la base de données.
    *@param User $utilisateur 
    *@return \Illuminate\Http\RedirectResponse Redirige vers la méthode 'index' .
    */
    public function destroy( User $utilisateur){
        
        $utilisateur->delete();

        return redirect()->action([self::class, 'index']);
    }
}
