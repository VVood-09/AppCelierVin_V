<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Rules\NoBacktick;
use Illuminate\Validation\Rule;

class UtilisateurController extends Controller
{ 
    /**
    *Affiche la page de profil de l'utilisateur connecté.
    *@return \Illuminate\Contracts\View\View
    */
    public function show(){

        $utilisateur = Auth::user();
        return view('utilisateur.show', ['utilisateur' => $utilisateur]);
    }


    /**
    *Affiche la page d'édition du profil de l'utilisateur connecté.
    *@return \Illuminate\View\View
    */
    public function edit(){
        $utilisateur = Auth::user();
    
        return view("utilisateur.edit", ['utilisateur' => $utilisateur]);
    }


    /**
     * Met à jour les informations du compte utilisateur connecté.
     * @param Request $request Les données de la requête HTTP.
     * @return \Illuminate\Http\RedirectResponse Redirige l'utilisateur vers la page de détails de son compte avec un message de succès.
     */
    public function update(Request $request){

        $utilisateur = Auth::user();
        $request->validate([
            'nom' => ['required', new NoBacktick],
            'email'=> ['required', 'email', Rule::unique('users')->ignore($utilisateur->id)],
        ]);

        $utilisateur->update([
            'name'=>$request->nom,
            'email'=>$request->email,
        ]);

        return redirect(route('utilisateur.show', ['id'=> $utilisateur->id, 'utilisateur' => $utilisateur]))->withSuccess('Compte modifié');
      }

      
    /** Supprime le compte utilisateur connecté.
    * @return \Illuminate\Http\RedirectResponse Redirige l'utilisateur vers la page de connexion avec un message de succès.
    */
      public function destroy(){

        $utilisateur = Auth::user();

        $utilisateur->delete();

          return redirect(route('login'))->withSuccess('Compte supprimé');
      }

}
