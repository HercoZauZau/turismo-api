<?php
use App\Http\Controllers\DestinoController;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use function Laravel\Prompts\search;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('/destinos/search/{nome}',[DestinoController::class, 'search']);
Route::resource('destinos',DestinoController::class);
// //Rota para listar todos destinos - Retorna o controller index
// Route::get('/destinos',[DestinoController::class,'index']);
// //Rota Para acrescentar destinos
// Route::post('/destinos',[DestinoController::class, 'store']);
// //Rota para listar um destino
// Route::get('/destino',[DestinoController::class,'show']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
