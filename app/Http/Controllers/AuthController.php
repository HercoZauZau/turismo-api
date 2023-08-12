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
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
        $user = User::create ([
            'name'=> $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
        ]);
        $token = $user->createToken('myAppToken')-> plainTextToken;
        $response =[
            'user' =>$user,
            'token' => $token,

        ];
        return response($response, 201);
    }
}
