<?php
use App\Http\Controllers\DestinoController;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PacoteController;

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

// //Rota para listar um destino
Route::get('/destinos/{id}',[DestinoController::class,'show']);
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::post('/destinos',[DestinoController::class, 'store']);
route::get('/users',[AuthController::class, 'users']);
Route::get('/user/{id}',[AuthController::class,'show']);
//sssss
// //Rota Para acrescentar destinos




//Rotas protegidas
Route::group(['middleware' => ['auth:sanctum']], function () {
  Route::put('/destinos/{id}',[DestinoController::class,'update']);
  Route::get('/destinos',[DestinoController::class,'index']);
 Route::get('/destinos/search/{nome}',[DestinoController::class, 'search']);
 
  Route::delete('/destinos/{id}',[DestinoController::class,'destroy']);
  Route::post('/logout',[AuthController::class, 'logout']);
  //Pacotes
  Route::post('/addpackage',[PackageController::class, 'store']);
  Route::post('/addpacote',[PacoteController::class, 'store']);
  Route::get('/packages',[PacoteController::class, 'index']);

  Route::get('/index',[PacoteController::class, 'index']);
//  Route::get('/user_id',[AuthController::class, 'user_id']);
});
