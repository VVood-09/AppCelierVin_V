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
use Illuminate\Support\Str;


class VinController extends Controller{


    /**
     * Affiche le formulaire de création d'une nouvelle bouteille dans le cellier actif de l'utilisateur connecté.
     * @return \Illuminate\View\View La vue de création d'une nouvelle bouteille.
     */
    public function create(){
        $celliers= Cellier::select()->where('user_id', Auth::user()->id)->get();
        $cellier_actif = session('cellier_actif');

        return view("bouteille.create", ['celliers'=>$celliers, 'cellier_actif'=>$cellier_actif]);
    }



    /**
     * Stocke une nouvelle bouteille dans la base de données.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
        $filename= null;

        //Gestion du nom du fichier pour assurer qu'il soit unique
        if ($request->file){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filenameO = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = $filenameO . time() . '_' . Str::random(10) .'.'. $extension;
            $file->storeAs('public/uploads', $filename);
        }

        if(!$request->code_saq){
            $request->validate([
                'nom' => 'required',
                'image'=> 'mimes:jpg, png',
                'qte'=>'numeric|gt:0',
                'format'=>'numeric|gt:0',
                'prix'=>'numeric|gt:0',
                'cellier'=>'required'
            ]);

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
            
            ListeBouteille::create([
                'bouteille_id'=>$bouteille_id,
                'cellier_id'=>$request->cellier,
                'qte'=>$request->qte
            ]);
        } else{
            $request->validate([
                'cellier'=>'required|numeric',
                'id'=>'required|numeric',
                'qte'=>'required|numeric',

            ]);

            $bouteille_id = $request->id;
            $cellier_id = $request->cellier;
           
            $user_id = User::query()
                        ->join('celliers', 'users.id', '=', 'celliers.user_id')
                        ->where('celliers.id', $cellier_id)
                        ->value('users.id');

            if($user_id == Auth::user()->id){
               if (ListeBouteille::query()
                    ->where('cellier_id', $cellier_id)
                    ->where('bouteille_id', $bouteille_id)
                    ->exists()) {
                       $qte = ListeBouteille::where('cellier_id', $cellier_id)
                            ->where('bouteille_id', $bouteille_id)
                            ->value('qte');

                   return back()->with(['bouteille_id' => $bouteille_id, 'cellier_id' => $cellier_id, 'qte' => $qte, 'show_modal' => true]);
                } else {
                    ListeBouteille::create([
                        'bouteille_id'=>$bouteille_id,
                        'cellier_id'=>$request->cellier,
                        'qte'=>$request->qte
                    ]);
                }
            } else{
                return redirect(route('dashboard'));
            }
        }

        return redirect(route('cellier.show', ['cellier'=>$request->cellier]))->withSuccess('Nouvelle bouteille ajoutée');
    }


     /**
     * Affiche une bouteille spécifiée, en récupérant aussi les commentaires associés et la note, selon l'utilisateur
     * @param \App\Models\Cellier $cellier
     * @param \App\Models\Bouteille $bouteille
     * @return \Illuminate\View\View
     */
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

        $bouteille->qte = $qte[0]["qte"];

        $comments = Commentaire::select()
                ->where('user_id', Auth::user()->id)
                ->where('bouteille_id', $bouteille->id)
                ->get();

        foreach($comments as $comment){
            $date = $comment->created_at;
    
            $date = new \DateTime($date);

            $date_format = $date->format('d/m/Y');
                
            $comment->created_at_format = $date_format;
        }

        return view("bouteille.show", ['bouteille' => $bouteille, 'cellier'=>$cellier, 'note' => $note, 'comments' => $comments]);
    }
    
    
    /**
    *Affiche la vue pour modifier une bouteille dans un cellier spécifique.
    *@param Cellier $cellier 
    *@param Bouteille $bouteille 
    *@return \Illuminate\View\View 
    */
    public function edit(Cellier $cellier,Bouteille $bouteille){
  
        return view("bouteille.edit", ['cellier' => $cellier,'bouteille' => $bouteille]);

    }


    /**
     * Met à jour les informations d'une bouteille dans un cellier donné.
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Cellier $cellier
     * @param \App\Models\Bouteille $bouteille
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Cellier $cellier, Bouteille $bouteille){
        
        $filename= null;

       //Gestion du nom du fichier pour assurer qu'il soit unique
        if ($request->file){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filenameO = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $filename = $filenameO . time() . '_' . Str::random(10) .'.'. $extension;
            $file->storeAs('public/uploads', $filename);
        }

        $request->validate([
            'nom' => 'required',
            'image'=> 'mimes:jpg, png',
            'qte'=>'numeric|gt:0',
            'format'=>'numeric|gt:0',
            'prix'=>'numeric|gt:0',
        ]);

        $bouteille->update([
            'nom'=>$request->nom,
            'image'=>$filename,
            'description'=>$request->description,
            'pays'=>$request->pays,
            'type'=>$request->type,
            'format'=>$request->format,
            'prix'=>$request->prix
        ]);
        
        return redirect(route('bouteille.show', ['cellier'=>$cellier, 'bouteille'=>$bouteille]))->withSuccess('Bouteille modifiée');

      }


    /** 
    * Supprime la bouteille spécifiée et redirige vers la page de détails du cellier associé
    * @param Cellier $cellier
    * @param Bouteille $bouteille 
    * @return \Illuminate\Http\RedirectResponse 
    */
    public function delete(Cellier $cellier,Bouteille $bouteille){

        $bouteille->delete();
  
        return redirect(route('cellier.show', ['cellier'=>$cellier]))->withSuccess('Bouteille supprimée');
    }

    
    /**
     * Supprime une bouteille d'un cellier et retire son association de la liste de bouteilles.
     * @param  \App\Models\Cellier $cellier
     * @param  \App\Models\Bouteille $bouteille
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Cellier $cellier, Bouteille $bouteille){
       
        ListeBouteille::where('bouteille_id', $bouteille->id)
                        ->where('cellier_id', $cellier->id)
                        ->delete();
        return redirect(route('cellier.show', ['cellier'=>$cellier]))->withSuccess('Bouteille retirée');
    }


    /**
     * Change la note d'une bouteille pour un utilisateur donné dans la base de données.
     * Route::put('cellier/{cellier}/bouteille/{bouteille}', [VinController::class, 'changeNote']);
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