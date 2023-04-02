<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellier;
use App\Models\ListeBouteille;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;

class CellierController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){

        $celliers = Cellier::select()->where('user_id', Auth::user()->id)->get();
        $utilisateur = Auth::user();
      
        return view("dashboard", ['celliers'=>$celliers, 'utilisateur'=>$utilisateur]);
    }



  /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
 
        return view('cellier.create');
    }


    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
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
     * Display the specified resource.
     * Requête Eloquent pour leftJoin( on()) https://kirschbaumdevelopment.com/insights/power-joins
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
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
  
            // $data = json_encode($bouteilles);
            // return view('your_view', compact('data'));
        $bouteilles = json_encode($bouteilles);
        return view('cellier.show', ['bouteilles' => $bouteilles, 'cellier'=>$cellier]);
    }


    
    public function edit( Cellier $cellier){
        $celliersTotal = DB::table('celliers')
                        ->where('user_id', Auth::user()->id)
                        ->count();
   
        return view("cellier.edit", ['cellier' => $cellier, 'celliersTotal'=>$celliersTotal]);
    }



    public function update(Request $request, Cellier $cellier){

        $request->validate([
            'nom' => 'required|max:8',
        ]);

        $cellier->update([
            'nom'=>$request->nom,
        ]);
        
        return redirect(route('cellier.show', ['cellier'=>$cellier]))->withSuccess('Cellier modifié');
    }




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
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function changeQte(Request $request){
        DB::statement("UPDATE liste_bouteilles SET qte = $request->qte, updated_at = now() WHERE bouteille_id = $request->bouteille AND cellier_id = $request->cellier ;");
        
    }



 }