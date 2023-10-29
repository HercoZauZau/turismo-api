<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\User;
use AuthController;
class PacoteController extends Controller
{
    public function store(Request $request)
    {
       
        $request->validate([
            'id_province'=> 'Required',
            'title'=> 'Required',
            'description'=> 'Required',
            

        ]);
        // retrieve user id
        $user_id =auth()->id();
        $packageData = $request->all();
        $packageData['id_guide'] = $user_id;
    
        return Package::create($packageData);
    }
    public function index(Request $request)

    {
       //return "session('user_id')";
      
        //return Package::all();
        $user_id =auth()->id();

        if ($user_id) {
            return "Welcome, User " . $user_id;
        } else {
            return "User ID not found in session.";
        }
    }
}
