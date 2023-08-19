<?php
use App\Http\Controllers\DestinoController;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
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

//Rotas publicas


//Route::resource('destinos',DestinoController::class);
//Rota para listar todos destinos - Retorna o controller index
Route::get('/destinos',[DestinoController::class,'index']);
// //Rota para listar um destino
Route::get('/destinos/{id}',[DestinoController::class,'show']);
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

//sssss
// //Rota Para acrescentar destinos




//Rotas protegidas
Route::group(['middleware' => ['auth:sanctum']], function () {
 Route::get('/destinos/search/{nome}',[DestinoController::class, 'search']);
  Route::post('/destinos',[DestinoController::class, 'store']);
  Route::delete('/destinos/{id}',[DestinoController::class,'destroy']);
  Route::put('/destinos/{id}',[DestinoController::class,'update']);
  Route::post('/logout',[AuthController::class, 'logout']);

});
