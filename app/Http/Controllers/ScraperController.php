<?php

namespace App\Http\Controllers;

use App\Models\Bouteille;
use Illuminate\Http\Request;

use Goutte\Client;
use GuzzleHttp\Client as Guzzleclient;
use Symfony\Component\HttpClient\HttpClient;

class ScraperController extends Controller
{
    /**
     * Gestion du Scraper avec Weidner\Goutte
     * Le Git officiel      https://github.com/FriendsOfPHP/Goutte
     * Tutoriel vidéo       https://www.youtube.com/watch?v=IVXG9gj6R6E
     * Méthode du Crawler   https://symfony.com/doc/current/components/dom_crawler.html#node-filtering
     * 
     * La classe Client de Goutte permet "d'ouvrir" 
     * un navigateur pour en lire le DOM et récupérer
     * les information
     */
    public $resultas = [];

    public function scraper(){

        ini_set('max_execution_time', '0');

        $client = new Client();
        for($i = 1; $i <= 320; $i++){ // Vrai nombre de page 318.20
            $url = 'https://www.saq.com/fr/produits/vin?p='.$i;
            $page = $client->request('GET', $url);
            $page->filter('.product-item-info')->each(function ($item) {
                $info = explode(' | ', $item->filter('.product-item-identity-format')->text());
                $this->resultas[] = [
                    'nom' => $item->filter('.product-item-name')->text(),
                    'image' => $item->filter("img[class='product-image-photo']")->attr('src'),
                    'code_saq' => explode(' ', $item->filter('.saq-code')->text())[2],
                    'type' => $info[0],
                    'format' => $info[1],
                    'pays' => $info[2],
                    'description' => $item->filter('img')->first()->attr('alt'),
                    'prix_saq' => $item->filter('.price')->text(),
                    'url_saq' => $item->filter('.product.photo.product-item-photo')->attr('href'),
                ];
            });
        }

        $data = $this->resultas;

        
        foreach($data as $bouteille){
            $query = Bouteille::Select()->where('code_saq', '=', $bouteille['code_saq'])->get();
            if(count($query) == 0){
                Bouteille::create([
                    'nom' => $bouteille['nom'],
                    'image' => $bouteille['image'],
                    'code_saq' => $bouteille['code_saq'],
                    'type' => $bouteille['type'],
                    'format' => $bouteille['format'],
                    'pays' => $bouteille['pays'],
                    'description' => $bouteille['description'],
                    'prix_saq' => $bouteille['prix_saq'],
                    'url_saq' => $bouteille['url_saq'],
                ]);
            }
        }

        return "<h1>Récupération de la SAQ complet!</h1><br>".$data;
        // return view('scraper', compact('data'));    
    }
}
