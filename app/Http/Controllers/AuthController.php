<?php

namespace App\Http\Controllers;
use App\Models\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    //Cadastro de usuario    
    public function Register(Request $request){
        $fields = $request->validate([
            'name' =>'required|string',
            'user_type' =>'required|string',
            'birth_day' =>'nullable|date', // Allow null or valid date
            'provincia_id' =>'nullable|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
        $user = User::create ([
            'name'=> $fields['name'],
            'email' => $fields['email'],
            'user_type' => $fields['user_type'],
           'provincia_id' => $fields['provincia_id'],
           'birth_day' => $fields['birth_day'],
            'password' => bcrypt($fields['password'])
        ]);
        $token = $user->createToken('myAppToken')-> plainTextToken;
        $response =[
            'user' =>$user,
            'token' => $token,

        ];
        return response($response, 201);
    }
    //Login de usuario    
    public function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
      //check email
      $user = User::where('email',$fields['email'])->first();
      //check password
      if(!$user || !Hash::check($fields['password'], $user->password)){
          return response([
              'message' => 'Wrong credentials'
          ],401);
      }

      //If credentials are valid, retrieve the user_type from the database
      $userType = $user->user_type;
      //$guideID = $user->id;
      
      return response([
          'message' => 'Authentication successful',
          'user_type' => $userType,
          //
          'user_id' => $userType

      ], 200);


      
        $token = $user->createToken('myapptoken')->plainTextToken;
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response ($response, 201);
    } 


  
    public function logout(Request $request){
     auth()->user()->tokens()->delete();
     return ['message'=>  'Logged out'
 
        ];
    }
    
}
