<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellier;
use App\Models\Bouteille;
use App\Models\ListeBouteille;
use App\Models\Note;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;


class VinController extends Controller
{



    public function create(){
        $celliers= Cellier::select()->where('user_id', Auth::user()->id)->get();

        return view("bouteille.create", ['celliers'=>$celliers]);
    }



    public function store(Request $request){
        $filename= null;

        $request->validate([
            'nom' => 'required',
            'image'=> 'mimes:jpg, png',
            'qte'=>'numeric|gt:0',
            'format'=>'numeric|gt:0',
            'prix'=>'numeric|gt:0',
            'cellier'=>'required'

        ]);

        if ($request->file){

            $file = $request->file('file');
            $filename = $file->getClientOriginalName();
            $file->storeAs('public/uploads', $filename);
        }

        if(!$request->code_saq){

            $bouteille = Bouteille::create([
                'nom'=>$request->nom,
                'image'=>$filename,
                'description'=>$request->description,
                'pays'=>$request->pays,
                'type'=>$request->type,
                'format'=>$request->format,
                'prix'=>$request->prix,
            ]);
            $bouteille_id = $bouteille->id;
        } else{
            $bouteille_id = $request->id_saq;
        }

        ListeBouteille::create([
            'bouteille_id'=>$bouteille_id,
            'cellier_id'=>$request->cellier,
            'qte'=>$request->qte
        ]);

        return redirect(route('dashboard'))->withSuccess('Nouvelle bouteille créé');
    }


    public function show(Cellier $cellier, Bouteille $bouteille ){

        $notes = Note::select()
                    ->where('user_id', Auth::user()->id)
                    ->where('bouteille_id', $bouteille->id)
                    ->get();
        if(count($notes) == 0){
            $note = 0;
        } else {
            $note = $notes[0]->note;
        }

        $qte = ListeBouteille::select('qte')
                            ->where('cellier_id', $cellier->id)
                            ->where('bouteille_id', $bouteille->id)
                            ->get();
        
        return view("bouteille.show", ['bouteille' => $bouteille, 'cellier'=>$cellier, 'qte'=>$qte[0], 'note' => $note]);
    }
    
    
    public function edit( Bouteille $bouteille){
        // return $this->cellier_actif;

        return view("bouteille.edit", ['bouteille' => $bouteille]);

    }

    public function update(Request $request, Bouteille $bouteille){

        // $file = $request->file('file');
        // $filename = $file->getClientOriginalName();
        // $file->storeAs('public/uploads', $filename);


        $request->validate([
            'nom' => 'required',
            // 'image'=> 'mimes:jpg, png',
            'qte'=>'numeric|gt:0',
            'format'=>'numeric|gt:0',
            'prix'=>'numeric|gt:0',
        ]);

        $bouteille->update([
            'nom'=>$request->nom,
            // 'image'=>$filename,
            'description'=>$request->description,
            'pays'=>$request->pays,
            'type'=>$request->type,
            'format'=>$request->format.' ml',
            'prix'=>$request->prix.' $'
        ]);
        return redirect()->back();

      }



      public function destroy(  Bouteille $bouteille)
      {
          $bouteille->delete();
  
          return redirect(route('dashboard'));
      }

    /**
     * Route::put('cellier/{cellier}/fiche-bouteille/{bouteille}', [VinController::class, 'changeNote']);
     * Réponse du FETCH de la même page en GET
     * @param {object} $request: note, bouteille_id
     */
    public function changeNote(Request $request){
        if($request->note >= 0 && $request->note <= 5){
            $id = Auth::user()->id;
            DB::statement(
                "INSERT INTO `notes`(`note`, `bouteille_id`, `user_id`, `created_at`, `updated_at`) 
                VALUES ('$request->note','$request->bouteille_id','$id', now(), now())
                ON DUPLICATE KEY UPDATE `note` = '$request->note', `updated_at` = now();"
            );
        }
    }
}