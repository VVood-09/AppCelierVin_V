<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellier;
use App\Models\Bouteille;
use App\Models\Commentaire;
use App\Models\ListeBouteille;
use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use App\Rules\NoBacktick;


class CommentaireController extends Controller{

    /**
    *Stocke un nouveau commentaire dans la base de données.
    *@param \Illuminate\Http\Request $request
    *@return \Illuminate\Http\JsonResponse
    */
    public function store(Request $request){

        $request->validate([
            'commentaire' => ['required', new NoBacktick]
        ]);
        
        $comment = Commentaire::create([
            'commentaire'=>$request->commentaire,
            'user_id'=> Auth::user()->id,
            'bouteille_id'=> $request->bouteille_id
        ]);
        
        return response()->json(['data' => $comment,'success' => true, 'message' => 'Commentaire ajouté']);
   
    }


}