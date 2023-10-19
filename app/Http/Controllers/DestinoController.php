<?php

namespace App\Http\Controllers;
use App\Models\Destinos;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;

class DestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return Destinos::all();
    }

    /**
     * Store a newly created resource in storage.
     */
   
    public function store(Request $request)
    {
        $request->validate([
            'name'=> 'Required',
            'province_id' => 'Required',
            'image_url'=> 'Required'

        ]);
        return Destinos::create($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Destinos::find($id);
      
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $destino = Destinos::find($id);
        $destino->update($request->all());
        return $destino;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return Destinos::destroy($id);
    }
    /**
     * Search for a name
     */
    public function search(string $name)
    {
      
        return Destinos::where('name', 'like', '%'.$name.'%' )->get();
    }
    
}
