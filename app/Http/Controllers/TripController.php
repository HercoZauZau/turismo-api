<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Trip;
use App\Models\Package;
class TripController extends Controller
{
    //
    //store
    
    public function store(Request $request, $id_package)
    {
        $fields = $request->validate([
            'date' => 'required',
            'number_people' => 'required',
            'id_tourist' => 'required',
          
        ]);
    
        // Fetch the package with the given $id_package
        $package = Package::find($id_package);
    
        if (!$package) {
            return response('Package not found', 404);
        }
    
        // Extract user id from the package
        $guide_id = $package->id_guide;
        #add log guide id
  
        #return id guide
      
        if($guide_id){

        
        $trip = Trip::create ([
            'id_package' => $id_package,
            'id_guide' => $guide_id,
            'id_tourist' => $fields['id_tourist'],
            'date' => $fields['date'],
            'number_people' => $fields['number_people'],
            'price' => $package->base_price * $fields['number_people'],
        ]);
 

        // You can return a response or redirect as needed.
        return response('Trip created successfully', 201);
        }
        else{
            return response('Trip not created', 404);
        }
    }
    //return trips that belong to the guide
    public function guideTrips($id)
    {
       
        $trips = Trip::where('id_guide', $id)->get();
        return $trips;
    }
    //return trips that belong to the tourist
    public function touristTrips($id)
    {
        $trips = Trip::where('id_tourist', $id)->get();
        return $trips;
    }
    //change trip status to accepted
    public function acceptTrip($id)
    {
        $trip = Trip::find($id);
      
        $trip->is_accepted = 'aceite';
        $trip->save();
        //send email notifying the user

        return $trip;
    }
    // deny trip
    public function denyTrip($id)
    {
        $trip = Trip::find($id);
      
        $trip->is_accepted = 'negado';
        $trip->save();
        //send email notifying the user
        

        return $trip;
    }
    public function index()
    {
        return "Hello World";
    }
}
