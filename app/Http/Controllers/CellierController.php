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

        return redirect(route('cellier.show', ['cellier'=>$cellier]))->withSuccess('Nouveau cellier créé'); 
    }



     /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Cellier $cellier){

        $bouteilles = ListeBouteille::with('bouteilles')
             ->join('bouteilles', 'liste_bouteilles.bouteille_id', '=', 'bouteilles.id')
             ->select('bouteilles.*', 'liste_bouteilles.qte')
             ->where('cellier_id', $cellier->id)
             ->get();
  
        return view('cellier.show', ['bouteilles' => $bouteilles, 'cellier'=>$cellier]);
    }


    
    public function edit( Cellier $cellier){
      
        return view("cellier.edit", ['cellier' => $cellier]);
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




    public function destroy( Cellier $cellier)
    {
        $cellier->delete();
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