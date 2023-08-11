<?php
use App\Models\Destinos;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::get('/destinos', function(){
    return Destinos::all();
});
Route::post('/destinos', function() {
    return Destinos::create([
        'nome'=> 'Macaneta',
        'provincia' => 'Mpt Provincia',
        'image_url' => 'https.sads.c',
    ]);
});
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
