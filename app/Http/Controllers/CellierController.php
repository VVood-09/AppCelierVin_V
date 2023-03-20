<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cellier;
use App\Models\ListeBouteille;

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


        return redirect(route('dashboard'))->withSuccess('Nouveau cellier créé'); 
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

    



    public function update(Request $request, Cellier $cellier){
        $request->validate([
            'nom' => 'required',
        ]);

        $cellier->update([
            'nom'=>$request->nom,
        ]);
        return redirect()->back();
      }




    public function destroy( Cellier $cellier)
    {
        $cellier->delete();

        return redirect(route('dashboard'));
    }

//      /**
//      * Show the form for editing the specified resource.
//      *
//      * @param  \App\Models\Student  $student
//      * @return \Illuminate\Http\Response
//      */
//     public function edit(Cellier $cellier)
//     {
    //      $pays = Provenance::all();
       // $types = Type::all();
      //  return view('cellier.edit', ['pays'=>$pays, 'types'=>$types, 'cellier'=>'$cellier']);
//        
//     }

    
//     /**
//      * Update the specified resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @param  \App\Models\Student  $student
//      * @return \Illuminate\Http\Response
//      */
//     public function update(Request $request, Student $student)
//     {
//         // update where student->id => select where student->id
//          $request->validate([
//             'name' => 'required',
//             'phone' => 'required',
//             'address' => 'required',
//             'city_id' => 'required|numeric',
//             'birthday' => 'required|date',
//             'email'=> 'required|email',
            
//         ]);
        
//         $student->update([
//             'name'=> $request->name,
//             'email' => $request->email,
//             'phone' => $request->phone,
//             'address' => $request->address,
//             'city_id' => $request->city_id,
//             'birthday' => $request->birthday,
//         ]);


//         return redirect(route('students.show', $student->id))->with('success', 'Modifications effectuées');
//     }


//  /**
//      * Remove the specified resource from storage.
//      *
//      * @param  \App\Models\Student  $student
//      * @return \Illuminate\Http\Response
//      */
//     public function destroy(Student $student)
//     {
//         $student->delete();

//         return redirect(route('students.index'))->withSuccess('Suppression réussite');
//     }


 }