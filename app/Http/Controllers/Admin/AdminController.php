<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\cellier;
use App\Models\Bouteille;
use App\Models\Commentaire;
use App\Models\ListeBouteille;
use App\Models\Note;

class AdminController extends Controller
{
    public function index(){

        return view('admin.index');
    }

    
    public function stats(){

        return view('admin.stats');
    }

     public function vins(){

        $bouteilles= Bouteille::orderBy('nom', 'ASC')
                        ->paginate(50);
        
        foreach($bouteilles as $bouteille){
            //Format date
            $date = $bouteille->created_at;
            $datetime = new \DateTime($date);
            $date_formate = $datetime->format('d/m/Y');
            $bouteille->created_at_format = $date_formate;

            //Note, arrondie à 2 décimales, gestion si note == null
            $bouteille->notes = Note::select()
                    ->where('bouteille_id', $bouteille->id)
                    ->avg('note');
            $bouteille->moyenne = round($bouteille->notes, 2);

            if($bouteille->moyenne == null){
                $bouteille->moyenne = 0;
            }

            //nombre de commentaires
            $bouteille->nbComments = Commentaire::select()
                    ->where('bouteille_id', $bouteille->id)
                    ->count();
            
            //nombre de commentaires
            $bouteille->nbCelliers = ListeBouteille::select()
                    ->where('bouteille_id', $bouteille->id)
                    ->count();
        }
// return $bouteilles;
        return view('admin.vins.index', ['vins'=> $bouteilles]);
    }
}
