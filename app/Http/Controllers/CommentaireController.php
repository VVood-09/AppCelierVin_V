<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellier;
use App\Models\Bouteille;
use App\Models\ListeBouteille;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


class CommentaireController extends Controller{

    public function create(Request $request){
        


        //$requete = "INSERT INTO commentaires (utilisateur_id, bouteille_id, commentaire) VALUES ('$utilisateur_id', '$bouteille_id', '$request')";
       
        
   
 
    }



    public function store(Request $request){
        
      
    }


    // public function show(Cellier $cellier, Bouteille $bouteille ){

   
    // }
    
    
    public function edit(  Cellier $cellier,Bouteille $bouteille){
   

    }


    public function update(Request $request, Bouteille $bouteille, Cellier $cellier){

     

      }



      public function destroy(Cellier $cellier,Bouteille $bouteille,)
      {

       
        
      }


}