<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellier;
use App\Models\ListeBouteille;
use App\Models\Bouteille;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class CellierController extends Controller
{
    
    /**
    *Récupère les celliers associés à l'utilisateur actuel et les informations utilisateur
    *@return \Illuminate\View\View
    **/
    public function index(){

        $celliers = Cellier::select()->where('user_id', Auth::user()->id)->get();
        $utilisateur = Auth::user();
      
        return view("dashboard", ['celliers'=>$celliers, 'utilisateur'=>$utilisateur]);
    }


    /**
     * Affiche le formulaire de création d'un nouveau cellier.
     *
     * @return \Illuminate\View\View
     */
    public function create(){
 
        return view('cellier.create');
    }


    /**
     * Stocke un nouveau cellier dans la base de données.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request){
       
        $request->validate([
            'nom' => 'required|max:8',
        ]);

        $cellier = Cellier::create([
            'nom'=>$request->nom,
            'user_id'=> Auth::user()->id
        ]);
        $nom = $cellier->nom;

        return redirect(route('cellier.show', ['cellier'=>$cellier]))->withSuccess("Nouveau cellier {$nom} créé"); 
    }


     /**
     * Affiche les bouteilles contenues dans le cellier spécifié, en les récupérant depuis la base de données.
     * Vérifie également que l'utilisateur actuel est le propriétaire du cellier avant d'afficher les informations.
     * Requête Eloquent pour leftJoin( on()) https://kirschbaumdevelopment.com/insights/power-joins
     * @param \App\Models\Cellier $cellier
     * @return \Illuminate\View\View
     */
    public function show(Cellier $cellier){

        if(Auth::user()->id != $cellier->user_id){
            return $this->index();
        }

        session(['cellier_actif' => $cellier->id]);

        $bouteilles = ListeBouteille::
                join('bouteilles', 'liste_bouteilles.bouteille_id', '=', 'bouteilles.id')
                ->leftJoin('notes', function($join){
                    $join
                    ->on('bouteilles.id', '=', 'notes.bouteille_id')
                    ->where('notes.user_id', '=', Auth::user()->id);
                })
                ->where('cellier_id', $cellier->id)
                ->select('bouteilles.*', 'liste_bouteilles.qte', 'notes.note')
                ->get();
  
        $bouteilles = json_encode($bouteilles);

        return view('cellier.show', ['bouteilles' => $bouteilles, 'cellier'=>$cellier]);
    }


    /**
    *Affiche le formulaire de modification du cellier spécifié.
    *Récupère également le nombre total de celliers de l'utilisateur actuel.
    *@param \App\Models\Cellier $cellier
    *@return \Illuminate\View\View
    **/
    public function edit( Cellier $cellier){

        $celliersTotal = DB::table('celliers')
                        ->where('user_id', Auth::user()->id)
                        ->count();
   
        return view("cellier.edit", ['cellier' => $cellier, 'celliersTotal'=>$celliersTotal]);
    }


    /**
    *Met à jour le nom du cellier spécifié dans la base de données.
    *@param \Illuminate\Http\Request $request
    *@param \App\Models\Cellier $cellier
    *@return \Illuminate\Http\RedirectResponse
    **/
    public function update(Request $request, Cellier $cellier){

        $request->validate([
            'nom' => 'required|max:8',
        ]);

        $cellier->update([
            'nom'=>$request->nom,
        ]);
        
        return redirect(route('cellier.show', ['cellier'=>$cellier]))->withSuccess('Cellier modifié');
    }


    /** 
    *Supprime le cellier spécifié de la base de données, à condition que l'utilisateur actuel ait au moins un autre cellier.
    *Redirige vers le tableau de bord après la suppression.
    *@param \App\Models\Cellier $cellier
    *@return \Illuminate\Http\RedirectResponse
    **/
    public function destroy( Cellier $cellier){
        $celliersTotal = DB::table('celliers')
                        ->where('user_id', Auth::user()->id)
                        ->count();

        if($celliersTotal > 1){
            $cellier->delete();
        }

        return redirect(route('dashboard'))->withSuccess('Cellier supprimé'); 
    }


    /**
    *Modifie la quantité de bouteilles dans le cellier spécifié pour la bouteille spécifiée.
    *@param \Illuminate\Http\Request $request
    *@return array
    **/
    public function changeQte(Request $request){
   
        DB::statement("UPDATE liste_bouteilles SET qte = $request->qte, updated_at = now() WHERE bouteille_id = $request->bouteille AND cellier_id = $request->cellier;");

        $qteChange = ListeBouteille::select('qte')
                            ->where('cellier_id', $request->cellier)
                            ->where('bouteille_id', $request->bouteille)
                            ->get();
                          
        $data = [
                'qte' => $qteChange[0]["qte"],
                'cellier' => $request->cellier,
                'bouteille' => $request->bouteille,
                ];

        return $data;
    }

 }