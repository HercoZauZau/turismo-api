<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\User;
use AuthController;
use Illuminate\Support\Facades\Storage;

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

       // $user_id = auth()->id();
       // $image_path = 'package_default.jpg';
       $path = $request->file('image')->store('images');

        if ($request->hasFile('image')) {
            $image_path = $request->file('image')->store('image', 'public');
        }

        $packageData = [
            'id_guide' => $fields['id_guide'],
            'id_province' => $fields['id_province'],
            'added_on' => now(),
            'image' => $path,
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

    public function PackageImage(Request $request,$id){
        // Retrieve image path/URL associated with the user from the database
     //find by auth id
       $user = auth()->user();
      
      
   
        $user = User::find($id); 

        if ($user) {
          $imagePath = $user->image;

          if ($imagePath) {
              $imageUrl = Storage::url($imagePath);

              return response()->json(['image_url' => $imageUrl]);
          }
      }

      return response()->json(['message' => 'No image found for the user'], 404);
  }
    //guide packages
    public function guidePackages(Request $request)

    {
       
            $id = auth()->id();
        
        return Package::where('id_guide', $id)->get();
    }
    
}
    
      
       

   


