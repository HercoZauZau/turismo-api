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
        $fields = $request->validate([
            'id_province' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'base_price' => 'required',
        ]);

        $user_id = auth()->id();
        $image_path = 'package_default.jpg';

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }

        $packageData = [
            'id_guide' => $user_id,
            'id_province' => $fields['id_province'],
            'added_on' => now(),
            'image' => $image_path,
            'title' => $fields['title'],
            'description' => $fields['description'],
            //base price
            'base_price' => $fields['base_price'],
        ];

        Package::create($packageData);

        // You can return a response or redirect as needed.
        return response('Package created successfully', 201);
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

    //index
    public function index2(Request $request)
    {
        return Package::all();
    }
}