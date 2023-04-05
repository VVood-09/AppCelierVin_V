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

    /**
    * Affiche la page d'accueil de l'interface d'administration.
    * @return \Illuminate\Contracts\View\View
    */
    public function index(){

        return view('admin.index');
    }

    
    /**
    * La méthode stats() calcule diverses statistiques pour l'application.
    *Les statistiques comprennent le nombre de celliers, d'utilisateurs,
    *de bouteilles, de listes de bouteilles, de notes et de commentaires.
    *De plus, elle calcule la moyenne de celliers, de bouteilles,
    *de commentaires et de notes par utilisateur.
    *Elle calcule également le nombre d'utilisateurs inscrits au cours des
    *derniers mois et les pourcentages de différents types de bouteilles.
    *Enfin, elle récupère les informations sur les bouteilles les plus
    *commentées et les mieux notées.
    *@return \Illuminate\View\View La vue d'affichage des statistiques.
    */  
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
        
        //le nombre de celliers par utilisateur et arrondissent le résultat à deux décimales.
        $stats->celliersUtilisateurs = $stats->nbCellier / $stats->nbUtilisateurs;
        $stats->celliersUtilisateurs = round($stats->celliersUtilisateurs, 2);

        //le nombre de bouteilles par utilisateur et arrondissent le résultat à deux décimales.
        $stats->bouteillesUtilisateurs = $stats->nbListeB / $stats->nbUtilisateurs;
        $stats->bouteillesUtilisateurs = round($stats->bouteillesUtilisateurs, 2);

        //le nombre de commentaires par utilisateur et arrondissent le résultat à deux décimales.
        $stats->commentairesUtilisateurs = $stats->nbCommentaires / $stats->nbUtilisateurs;
        $stats->commentairesUtilisateurs = round($stats->commentairesUtilisateurs, 2);

        //le nombre de notes par utilisateur et arrondissent le résultat à deux décimales.
        $stats->notesUtilisateurs = $stats->nbNotes / $stats->nbUtilisateurs;
        $stats->notesUtilisateurs = round($stats->notesUtilisateurs, 2);

        // le nombre d'utilisateurs qui se sont inscrits au cours du dernier mois
        $dateUnMois = $date->subMonth(1);
        $stats->utilisateursUnMois = User::all()
                            ->where('created_at', '>=', $dateUnMois)
                            ->count();

        // le nombre d'utilisateurs qui se sont inscrits au cours des six derniers mois
        $dateSixMois = $date->subMonth(6);
        $stats->utilisateursSixMois = User::all()
                            ->where('created_at', '>=', $dateSixMois)
                            ->count();

        //le pourcentage de chaque type de bouteille en calculant la somme de la quantité de chaque bouteille pour chaque type 
        $pourcentageType = DB::table('liste_bouteilles')
                        ->join('bouteilles', 'liste_bouteilles.bouteille_id', '=', 'bouteilles.id')
                        ->select('bouteilles.type', DB::raw('SUM(liste_bouteilles.qte) as qte_somme'), DB::raw('COUNT(*) as count'), DB::raw('ROUND(SUM(liste_bouteilles.qte) * 100 / (SELECT SUM(qte) FROM liste_bouteilles), 2) AS pourcentage'))
                        ->groupBy('bouteilles.type')
                        ->get();

        //la bouteille la plus commentée
        $bouteillePlusComment = DB::table('bouteilles')
                        ->join('commentaires', 'bouteilles.id', '=', 'commentaires.bouteille_id')
                        ->select('bouteilles.nom', DB::raw('COUNT(commentaires.id) as total'))
                        ->groupBy('bouteilles.nom')
                        ->orderBy('total', 'DESC')
                        ->first();

        //les 5 meilleures bouteilles notées                    
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



    
    /**

    *Récupère toutes les bouteilles triées par ordre alphabétique et les prépare pour l'affichage dans la vue d'administration des vins.
    *Ajoute pour chaque bouteille le format de sa date de création, la moyenne de ses notes (arrondie à 2 décimales), le nombre de commentaires et le nombre de celliers qui contiennent cette bouteille.
    *La fonction retourne la vue d'administration des vins avec les données préparées.
    *@return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    */
    
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

            //nombre de commentaires pour une bouteille donnée
            $bouteille->nbComments = Commentaire::select()
                    ->where('bouteille_id', $bouteille->id)
                    ->count();
            
            //nombre de celliers qui ont une bouteille donnée
            $bouteille->nbCelliers = ListeBouteille::select()
                    ->where('bouteille_id', $bouteille->id)
                    ->count();
        }

        return view('admin.vins.index', ['vins'=> $bouteilles]);
    }
}
