<?php
use App\Http\Controllers\DestinoController;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
//use App\Http\Controllers\PackageController;
use App\Http\Controllers\PacoteController;
use App\Http\Controllers\TripController;
use function Laravel\Prompts\search;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ReviewController;
use App\Mail\SampleMail;
use Illuminate\Support\Facades\Mail;
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
//Route::get('/destinos/{id}',[DestinoController::class,'show']);
Route::post('/send-email', function () {
  $recipientEmail = 'recipient@example.com'; // Replace this with the recipient's email

  // Send the email
  Mail::to($recipientEmail)->send(new SampleMail());

  return response()->json(['message' => 'Email sent successfully']);
});

Route::put('/destinos/{id}',[DestinoController::class,'update']);
Route::get('/destinos',[DestinoController::class,'index']);
Route::get('/destinos/search/{nome}',[DestinoController::class, 'search']);

Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);
Route::post('/destinos',[DestinoController::class, 'store']);
route::get('/users',[AuthController::class, 'users']);
Route::get('/user/{id}',[AuthController::class,'show']);
Route::get('/reviews/{id}',[ReviewController::class,'getReviews']);
// //Rota Para acrescentar destinos




//packages
Route::get('/packages',[PacoteController::class, 'index']);
//Route::get('/send-mail', [SendMailController::class, 'index']);
Route::get('sendbasicemail',[MailController::class,'basic_email']);
Route::get('sendhtmlemail','MailController@html_email');
Route::get('sendattachmentemail','MailController@attachment_email');














/**  */

//trips routes
Route::post('/addtrip/{id_package}',[TripController::class, 'store']);
  
Route::get('/trips/{id}',[TripController::class, 'show']);
Route::get('/destinos/{id}',[DestinoController::class,'show']);
Route::delete('/destinos/{id}',[DestinoController::class,'destroy']);
Route::post('/logout',[AuthController::class, 'logout']);
//Pacotes
Route::put('/destinos/{id}',[DestinoController::class,'update']);
//get user image
Route::get('/user-image/{id}',[AuthController::class,'userImage']);
Route::get('/pack-image/{id}',[PacoteController::class,'PackageImage']);
Route::put('/update-user/{id}',[AuthController::class,'update']);
Route::post('/addpacote',[PacoteController::class, 'store']);
// return packages that belong to the guide
Route::get('/packages-guide',[PacoteController::class, 'guidePackages']);
// return trips that belong to the guide
Route::get('/trips-guide/{id}',[TripController::class, 'guideTrips']);
//return trips that belong to the tourist
Route::get('/trips-tourist/{id}',[TripController::class, 'touristTrips']);
//accept trip
Route::put('/accept-trip/{id}',[TripController::class, 'acceptTrip']);
//deny trip
Route::put('/deny-trip/{id}',[TripController::class, 'denyTrip']);
Route::get('/index',[PacoteController::class, 'index']);
//  Route::get('/user_id',[AuthController::class, 'user_id']);

Route::post('/reviews/{id}',[ReviewController::class,'ReviewGuide']);
Route::post('/review-destiny/{id}',[ReviewController::class,'ReviewDestiny']);
/** */
//Rotas protegidas
Route::group(['middleware' => ['auth:sanctum']], function () {
 

});
