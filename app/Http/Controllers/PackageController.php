<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageModel;
use App\Models\User;
use AuthController;
class PackageController extends Controller
{
    public function store(Request $request)
    {

        
        $fields =  $request->validate([
            'title'=> 'Required',
            'description'=> 'Required',
            'id_province' => 'Required',
            'id_guide'=> 'Required'

        ]);
        $package = PackageModel::create ([
            'title'=> $fields['title'],
            'description' => $fields['description'],
            'user_type' => $fields['user_type'],
           'id_province' => $fields['provincia_id'],
            'id_guide' => bcrypt($fields['id_guide'])
        ]);
        return PackageModel::create($request->all());
    }
}
