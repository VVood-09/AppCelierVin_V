<?php

namespace App\Http\Controllers;

use App\Models\Bouteille;
use Illuminate\Http\Request;

use Goutte\Client;
use GuzzleHttp\Client as Guzzleclient;
use Symfony\Component\HttpClient\HttpClient;

class ScraperController extends Controller
{
    public $resultas = [];

    public function scraper(){

        ini_set('max_execution_time', '0');

        $client = new Client();
        for($i = 1; $i <= 2; $i++){ // Vrai nombre de page 318.20
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
            // echo $bouteille['nom']."<br>";
            // echo count($bouteille)."<br>";
            // echo count($query)."<br>";
            // var_dump($query);
            // echo "<br>";
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

        // $newPost = BlogPost::create([
        //     'title' => $request->title,
        //     'body'  => $request->body,
        //     'title_fr' => $request->title_fr,
        //     'body_fr'  => $request->body_fr,
        //     'user_id' => Auth::user()->id,
        // ]);

        // return $data;
        // return view('scraper', compact('data'));    
    }
}
