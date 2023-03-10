<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Controller;
Use App\Http\Controllers\CellierController;
Use App\Http\Controllers\VinController;
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

Route::get('accueil', [Controller::class, 'index']);
Route::get('/', [Controller::class, 'index']);
Route::get('dashboard', [CellierController::class, 'index'])->name('dashboard');


Route::get('cellier/create', [CellierController::class, 'create'])->name('cellier.create');
Route::post('cellier/create', [CellierController::class, 'store'])->name('cellier.store');
Route::get('cellier/{cellier}', [CellierController::class, 'show'])->name('cellier.show');

Route::get('ajouter-bouteille', [VinController::class, 'ajouterBtl'])->name('ajouter-bouteille');
Route::get('fiche-bouteille', [VinController::class, 'showBtl'])->name('fiche-bouteille');
Route::get('modifier-bouteille', [VinController::class, 'editBtl'])->name('modifier-bouteille');


require __DIR__.'/auth.php';


use App\Http\Controllers\ScraperController;

Route::get('/scraper', [ScraperController::class, 'scraper'])->name('scraper.index');