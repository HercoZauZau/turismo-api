<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;
class TripController extends Controller
{
    //
    //store
    public function store(Request $request, $id_package)
    {
        $fields = $request->validate([
            'id_guide' => 'required',
            'id_package' => 'required',
            'date' => 'required',
            'number_people' => 'required',
        ]);

        $tripData = [
            'id_guide' => $fields['id_guide'],
            'id_package' => $fields['id_package'],
            'date' => $fields['date'],
            'number_people' => $fields['number_people'],
        ];

        Trip::create($tripData);

        // You can return a response or redirect as needed.
        return response('Trip created successfully', 201);
    }
}
