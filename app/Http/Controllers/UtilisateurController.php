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

    public function edit( ){
        $utilisateur = Auth::user();
    
        return view("utilisateur.edit", ['utilisateur' => $utilisateur]);
    }




    public function update(Request $request){
   //return $request;
        $utilisateur = Auth::user();
        $request->validate([
            'nom' => 'required',
            'email'=>'email',
        ]);

        // $utilisateur->update([
        //     'name'=>$request->nom,
        //     'email'=>$request->email,
        // ]);

        return redirect()->back();
      }

      
      public function destroy( User $utilisateur)
      {
          $utilisateur->delete();
          return redirect(route('dashboard'));
      }

}
