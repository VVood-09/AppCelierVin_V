<?php

use App\Http\Controllers\CellierController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controlers\UtilisateurController;
use App\Http\Controlers\VinController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::delete('modifier-cellier/{cellier}', [CellierController::class, 'delete'])->name('cellier.delete');
Route::delete('modifier-utilisateur/{id}', [UtilisateurController::class, 'delete'])->name('utilisateur.delete');
Route::delete('modifier-bouteille/{bouteille}', [VinController::class, 'destroy'])->name('bouteille.delete');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::put('changeQte', [CellierController::class, 'changeQte']);