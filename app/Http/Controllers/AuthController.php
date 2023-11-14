<?php

namespace App\Http\Controllers;
use App\Models\User;
use Laravel\Sanctum\PersonalAccessToken;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    //Cadastro de usuario    
 public $guideID;
    public function Register(Request $request){
        $fields = $request->validate([
            'name' =>'required|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'user_type' =>'required|string',
            'birth_day' =>'nullable|date', // Allow null or valid date
            'provincia_id' =>'nullable|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
        $image_path = 'default.jpg';

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }
        $user = User::create ([
            'name'=> $fields['name'],
            'email' => $fields['email'],
            'user_type' => $fields['user_type'],
           'provincia_id' => $fields['provincia_id'],
           'birth_day' => $fields['birth_day'],
           'image' => $image_path,
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
      $userToken = $user-> userToken;
      //$guideID = $user->id;
      $idUser = $user->id;

      $token = $user->createToken('myapptoken')->plainTextToken;
      $user_token = $token;
        //added
        
      $token = PersonalAccessToken::findToken($token);
      $user1 = $token->tokenable;
      $this->guideID = $user1->id;
      $user_id = $user1->id;
     
      session()->put('user_id', $user_id);
    
      return response([
          'message' => 'Authentication successful',
          'user_type' => $userType,
          'name' => $user->name,
            'user_id' => session('user_id'), 
            'token' =>  $user_token,
      ], 200);


     
        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response ($response, 201);
    } 

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        $user->update($request->all());
        return $user;

    }
  
    public function logout(Request $request){
     auth()->user()->tokens()->delete();
     return ['message'=>  'Logged out'
 
        ];
    }
    public function users (Request $request){
        return User::all();

    } 
    public function show(string $id)
    {
        return User::find($id);
      
    }
  
    
}
