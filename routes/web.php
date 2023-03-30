<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Controller;
Use App\Http\Controllers\CellierController;
Use App\Http\Controllers\VinController;
Use App\Http\Controllers\UtilisateurController;
Use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUtilisateurController;
use App\Http\Controllers\Admin\ScraperController;
Use App\Http\Controllers\Auth\AuthenticatedSessionController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/', [AuthenticatedSessionController::class, 'create']);
// Route::get('accueil', [Controller::class, 'index']);

// Route de l'utilisateur
Route::group(['middleware' => 'auth'], function(){
    Route::get('dashboard', [CellierController::class, 'index'])->name('dashboard');
   // Route::get('/user/{id}', [UserController::class, 'user.show']);
    Route::get('utilisateur/{id}', [UtilisateurController::class, 'show'])->name('utilisateur.show');
    Route::get('utilisateur/{id}/modif', [UtilisateurController::class, 'edit'])->name('utilisateur.edit');
    Route::put('utilisateur/{id}/modif', [UtilisateurController::class, 'update'])->name('utilisateur.update');
    Route::delete('utilisateur/{id}/modif', [UtilisateurController::class, 'destroy'])->name('utilisateur.delete');

// Route des Celliers
    Route::get('cellier/create', [CellierController::class, 'create'])->name('cellier.create');
    Route::post('cellier/create', [CellierController::class, 'store'])->name('cellier.store');
    Route::get('cellier/{cellier}', [CellierController::class, 'show'])->name('cellier.show');
    //Route::post('cellier/{cellier}', [CellierController::class, 'changeQte']);
    Route::get('cellier/{cellier}/modif', [CellierController::class, 'edit'])->name('cellier.edit');
    Route::put('cellier/{cellier}/modif', [CellierController::class, 'update']);
    Route::delete('cellier/{cellier}/modif', [CellierController::class, 'destroy'])->name('cellier.delete');


    Route::post('changeQte', [CellierController::class, 'changeQte']);
    
// Route des Bouteilles

    Route::get('ajout-bouteille', [VinController::class, 'create'])->name('bouteille.create');
    Route::post('ajout-bouteille', [VinController::class, 'store'])->name('bouteille.store');
    Route::get('cellier/{cellier}/bouteille/{bouteille}', [VinController::class, 'show'])->name('bouteille.show');
    Route::put('cellier/{cellier}/bouteille/{bouteille}', [VinController::class, 'changeNote']);
    //Route::post('cellier/{cellier}/bouteille/{bouteille}', [CellierController::class, 'changeQte']);
    Route::get('cellier/{cellier}/bouteille/{bouteille}/modif', [VinController::class, 'edit'])->name('bouteille.edit');
    Route::put('cellier/{cellier}/bouteille/{bouteille}/modif', [VinController::class, 'update'])->name('bouteille.update');
    Route::delete('cellier/{cellier}/bouteille/{bouteille}/modif', [VinController::class, 'destroy'])->name('bouteille.delete');


// Route des commentaires
    // Route::get('cellier/{cellier}/bouteille/{bouteille}', [CommentaireController::class, 'create'])->name('commentaire.create');
    Route::post('cellier/{cellier}/bouteille/{bouteille}/commentaire', [CommentaireController::class, 'store'])->name('commentaire.store');
    Route::get('cellier/{cellier}/bouteille/{bouteille}/commentaire/{commentaire}/modif', [CommentaireController::class, 'edit'])->name('commentaire.edit');
    Route::put('cellier/{cellier}/bouteille/{bouteille}/commentaire/{commentaire}/modif', [CommentaireController::class, 'update'])->name('commentaire.update');
    Route::delete('cellier/{cellier}/bouteille/{bouteille}/commentaire/{commentaire}/modif', [CommentaireController::class, 'destroy'])->name('commentaire.delete');

});



#AutoComplete
  Route::get('/autocomplete-search', function() {
    $query = request()->get('q');
    $results = DB::table('bouteilles')
        ->where(function ($queryBuilder) use ($query) {
            $queryBuilder->where('nom', 'like', '%' . $query . '%')
                ->orWhere('pays', 'like', '%' . $query . '%')
                ->orWhere('type', 'like', '%' . $query . '%')
                ->orWhere('format', 'like', '%' . $query . '%');
        })
        ->whereNotNull('url_saq')
        ->get()
        ->toArray();
    return $results;
});

require __DIR__.'/auth.php';

/**
 * Gestion des routes administrative
 * Valide une connexion avec Middleware Auth
 * Valide si l'utilisateur est un admin
 * 
 * https://www.youtube.com/watch?v=kZOgH3-0Bko
 */
Route::group(['middleware' => 'auth'], function(){
    Route::group([
        'prefix' => 'admin',
        'middleware' => 'permission',
    ], function(){   
        // Route pour l'administration
        Route::get('', [AdminController::class, 'index'])->name('admin.index');
        Route::get('/scraper', [ScraperController::class, 'index'])->name('scraper.index');
        Route::post('/scraper', [ScraperController::class, 'pages']);
        Route::put('/scraper', [ScraperController::class, 'scraper']);
        Route::get('/membres', [AdminUtilisateurController::class, 'index'])->name('admin.membre.index');
        Route::get('/membres/{utilisateur}', [AdminUtilisateurController::class, 'show'])->name('admin.membre.show');
        Route::put('/membres/{utilisateur}', [AdminUtilisateurController::class, 'update']);
    });
});
