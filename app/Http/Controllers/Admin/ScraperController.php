<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bouteille;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Goutte\Client;

class ScraperController extends Controller
{
    /**
     * Gestion du Scraper avec Weidner\Goutte
     * 
     * Faire la commande:   composer require weidner/goutte
     * 
     * Le Git officiel      https://github.com/FriendsOfPHP/Goutte
     * Tutoriel vidéo       https://www.youtube.com/watch?v=IVXG9gj6R6E
     * Méthode du Crawler   https://symfony.com/doc/current/components/dom_crawler.html#node-filtering
     * 
     * La classe Client de Goutte permet "d'ouvrir" 
     * un navigateur pour en lire le DOM et récupérer
     * les information
     */
    public $resultas = [];

    public function pages(){
        $client = new Client();

        // Pour allez chercher la quantité de page à Crawl
        $url = 'https://www.saq.com/fr/produits/vin';
        $page = $client->request('GET', $url);
        $qteVin = explode(' ', $page->filter('.toolbar-amount')->text()); // Allez chercher la quantité de bouteille de vin de la SAQ
        $qteVin = end($qteVin);
        $nbParPage = 96; // Pour la quantité de bouteille par page
        $nbPage = ceil($qteVin / $nbParPage); // Nombre de page de bouteille de vin
        return ['pages' => $nbPage, 'qte_Vins' => $qteVin];
    }

    public function scraper(Request $request){
        ini_set('max_execution_time', '0');

        $debut = date('H:i:s');

        $client = new Client();

        // Récupération des bouteilles de vin
            $url = 'https://www.saq.com/fr/produits/vin?p='.$request[0].'&product_list_limit=96&product_list_order=name_asc';
            $page = $client->request('GET', $url);
            $page->filter('.product-item-info')->each(function ($item) {
                $info = explode(' | ', $item->filter('.product-item-identity-format')->text());
                $this->resultas[] = [
                    'nom' => $item->filter('.product-item-name')->text(),
                    'image' => $item->filter("img[class='product-image-photo']")->attr('src'),
                    'code_saq' => explode(' ', $item->filter('.saq-code')->text())[2],
                    'type' => $info[0],
                    'format' => explode(' ', $info[1])[0],
                    'pays' => $info[2],
                    'description' => $item->filter('img')->first()->attr('alt'),
                    'prix' => substr($item->filter('.price')->text(), 0, -3),
                    'url_saq' => $item->filter('.product.photo.product-item-photo')->attr('href'),
                ];
            });
        // }

        $data = $this->resultas;

        // Pour ajouter les bouteilles dans la DB
        $liste = [];
        foreach($data as $bouteille){
            $query = Bouteille::Select()->where('code_saq', '=', $bouteille['code_saq'])->get();
            if(count($query) == 0){ // Si la bouteille n'est pas dans la DB, elle est ajouté
                Bouteille::create([
                    'nom' => $bouteille['nom'],
                    'image' => $bouteille['image'],
                    'code_saq' => $bouteille['code_saq'],
                    'type' => $bouteille['type'],
                    'format' => $bouteille['format'],
                    'pays' => $bouteille['pays'],
                    'description' => $bouteille['description'],
                    'prix' => $bouteille['prix'],
                    'url_saq' => $bouteille['url_saq'],
                ]);
                $liste[] = ['nom' => $bouteille['nom'], 'code_saq' => $bouteille['code_saq']];
            } else { // Sinon mise à jour
                $query->update([
                    'nom' => $bouteille['nom'],
                    'image' => $bouteille['image'],
                    'type' => $bouteille['type'],
                    'format' => $bouteille['format'],
                    'pays' => $bouteille['pays'],
                    'description' => $bouteille['description'],
                    'prix' => $bouteille['prix'],
                    'url_saq' => $bouteille['url_saq'],
                ]);
            }
        }

        $fin = date('H:i:s');

        return ['data' => count($data), 'liste' => count($liste), 'page' => $request[0]];
    }

    public function index(){
        return view('scraper.index');
    }
}