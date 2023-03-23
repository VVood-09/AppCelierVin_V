<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class UtilisateurController extends Controller
{ 
    public function show()
    {
        $utilisateur = Auth::user();
        return view('utilisateur.show', ['utilisateur' => $utilisateur]);
    }


    public function edit(){
        $utilisateur = Auth::user();
    
        return view("utilisateur.edit", ['utilisateur' => $utilisateur]);
    }


    public function update(Request $request){

        $utilisateur = Auth::user();
        $request->validate([
            'nom' => 'required',
            'email'=>'email',
        ]);

        $utilisateur->update([
            'name'=>$request->nom,
            'email'=>$request->email,
        ]);

        return redirect(route('utilisateur.show', ['id'=> $utilisateur->id, 'utilisateur' => $utilisateur]))->withSuccess('Compte modifié');
      }

      
      public function destroy()
      {
        $utilisateur = Auth::user();

        $utilisateur->delete();

          return redirect(route('login'))->withSuccess('Compte supprimé');
      }

}
