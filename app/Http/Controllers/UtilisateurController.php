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
        return view('utilisateur.show', compact('utilisateur'));
    }

    public function edit(  User $utilisateur){
        return view("utilisateur.edit", ['utilisateur' => $utilisateur]);
    }




    public function update(Request $request, User $utilisateur){

     

        $request->validate([
            'nom' => 'required',
            'email'=>'email|required',
        ]);

        $utilisateur->update([
            'nom'=>$request->nom,
            'email'=>$request->email,
          
        ]);
        return redirect()->back();
      }

      
      public function destroy( User $utilisateur)
      {
          $utilisateur->delete();
          return redirect(route('dashboard'));
      }

}
