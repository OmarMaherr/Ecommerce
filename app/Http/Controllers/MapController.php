<?php

namespace App\Http\Controllers;

use App\Models\Map;
use Illuminate\Http\Request;

class MapController extends Controller
{
    public function index()
    {
        $map = Map::findOrFail(1);
        return view('admin.maps.map', compact('map'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'latitude' => 'required',
            'longitude' => 'required',
        ]);

        // Find the map record by ID
        $map = Map::findOrFail($id);

        // Update the map record with the validated data
        $map->update($validatedData);

        // Redirect back with a success message
        return redirect()->back()->with('success', 'Map coordinates updated successfully.');
    }


    public function destroy($id)
    {
    }
}
