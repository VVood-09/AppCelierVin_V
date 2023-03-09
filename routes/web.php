<?php

use Illuminate\Support\Facades\Route;
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

Route::get('dashboard', [CellierController::class, 'index'])->name('dashboard');
Route::get('ajouter-bouteille', [VinController::class, 'ajouterBtl'])->name('ajouter-bouteille');
Route::get('fiche-bouteille', [VinController::class, 'showBtl'])->name('fiche-bouteille');
Route::get('modifier-bouteille', [VinController::class, 'editBtl'])->name('modifier-bouteille');
require __DIR__.'/auth.php';
