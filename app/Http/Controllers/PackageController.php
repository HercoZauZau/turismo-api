<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PackageModel;
class PackageController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title'=> 'Required',
            'id_province' => 'Required',
            'image_url'=> 'Required'

        ]);
        return PackageModel::create($request->all());
    }
}
