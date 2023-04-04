<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Cellier;
use App\Models\User;
use App\Models\Bouteille;
use App\Models\Commentaire;
use App\Models\ListeBouteille;
use App\Models\Note;
use App\Models\Stats;

use Carbon\Carbon;

class AdminController extends Controller
{
    public function index(){

        return view('admin.index');
    }

    
    public function stats(){
  
        $date = Carbon::now();
        $stats = new Stats();


        $stats->nbCellier = Cellier::all()
                        ->count();

        
        $stats->nbUtilisateurs = User::all()
                        ->count();
        

        $stats->nbBouteilles = Bouteille::all()
                        ->count();  
                        
                        
        $stats->nbListeB = ListeBouteille::all()
                        ->count();


        $stats->nbNotes = Note::all()
                        ->count();
        

        $stats->nbCommentaires = Commentaire::all()
                        ->count();
        

        $stats->celliersUtilisateurs = $stats->nbCellier / $stats->nbUtilisateurs;
        $stats->celliersUtilisateurs = round($stats->celliersUtilisateurs, 2);


        $stats->bouteillesUtilisateurs = $stats->nbListeB / $stats->nbUtilisateurs;
        $stats->bouteillesUtilisateurs = round($stats->bouteillesUtilisateurs, 2);


        $stats->commentairesUtilisateurs = $stats->nbCommentaires / $stats->nbUtilisateurs;
        $stats->commentairesUtilisateurs = round($stats->commentairesUtilisateurs, 2);

        $stats->notesUtilisateurs = $stats->nbNotes / $stats->nbUtilisateurs;
        $stats->notesUtilisateurs = round($stats->notesUtilisateurs, 2);

        $dateUnMois = $date->subMonth(1);
        $stats->utilisateursUnMois = User::all()
                            ->where('created_at', '>=', $dateUnMois)
                            ->count();


        $dateSixMois = $date->subMonth(6);
        $stats->utilisateursSixMois = User::all()
                            ->where('created_at', '>=', $dateSixMois)
                            ->count();

  
        // $pourcentageVins = DB::table('bouteilles')
        //                     ->select('type', DB::raw('COUNT(*) * 100 / (SELECT COUNT(*) FROM bouteilles) AS pourcentage'))
        //                     ->groupBy('type')
        //                     ->get();

        // $pourcentageNb = DB::table('liste_bouteilles')
        //                 ->join('bouteilles', 'liste_bouteilles.bouteille_id', '=', 'bouteilles.id')
        //                 ->select('bouteilles.type', DB::raw('COUNT( liste_bouteilles.bouteille_id) as count'), DB::raw('COUNT( liste_bouteilles.bouteille_id) * 100 / (SELECT COUNT( bouteille_id) FROM liste_bouteilles) AS pourcentage'))
        //                 ->groupBy('bouteilles.type')
        //                 ->get();


        $pourcentageType = DB::table('liste_bouteilles')
                        ->join('bouteilles', 'liste_bouteilles.bouteille_id', '=', 'bouteilles.id')
                        // ->select('bouteilles.type', DB::raw('SUM(liste_bouteilles.qte) * 100 / (SELECT SUM(qte) FROM liste_bouteilles) AS percentage'))
                        ->select('bouteilles.type', DB::raw('SUM(liste_bouteilles.qte) as qte_somme'), DB::raw('COUNT(*) as count'), DB::raw('ROUND(SUM(liste_bouteilles.qte) * 100 / (SELECT SUM(qte) FROM liste_bouteilles), 2) AS pourcentage'))
                        ->groupBy('bouteilles.type')
                        ->get();



        $bouteillePlusComment = DB::table('bouteilles')
                        ->join('commentaires', 'bouteilles.id', '=', 'commentaires.bouteille_id')
                        ->select('bouteilles.nom', DB::raw('COUNT(commentaires.id) as total'))
                        ->groupBy('bouteilles.nom')
                        ->orderBy('total', 'DESC')
                        ->first();

                           

        $topBouteilles = DB::table('bouteilles')
                        ->leftJoin('notes', 'bouteilles.id', '=', 'notes.bouteille_id')
                        ->select('bouteilles.nom', DB::raw('COUNT(notes.bouteille_id) as total'), DB::raw('ROUND(AVG(notes.note), 2) as average'))
                        ->groupBy('bouteilles.id', 'bouteilles.nom')
                        ->having('total', '>', 0)
                        ->orderBy('average', 'DESC')
                        ->limit(5)
                        ->get();

        return view('admin.stats', ['stats'=>$stats, 'pourcentage'=>$pourcentageType, 'bouteilleComment'=>$bouteillePlusComment, 'topBouteilles'=>$topBouteilles]);
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
