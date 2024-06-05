<?php

namespace App\Http\Controllers;

use App\DataTables\ColorDataTable;
use App\Models\Color;
use Illuminate\Http\Request;

class ColorController extends Controller
{
    




    public function index(ColorDataTable $dataTable)
    {
        return $dataTable->render('admin.colors.color');
    }


    public function create()
    {
        return view('admin.colors.add_color');
    }

    public function store(Request $request)
    {
        // dd($request);
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Create the color using validated data
        Color::create([
            'name' => $request->name,
            // Add other fields as needed
        ]);

        return redirect()->route('color.index')->with('success', 'Color created successfully.');
    }


    // Display the specified resource.
    public function show($id)
    {
        // Your code here
    }

    // Show the form for editing the specified resource.
    public function edit($id)
    {
        // Fetch the color by ID from the database
        $color = Color::findOrFail($id);


        // Pass the color data to the view for editing
        return view('admin.colors.edit', compact('color'));
    }

    // Update the specified resource in storage.
    public function update(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        // Find the color by ID
        $color = Color::findOrFail($id);

        // Update the color with the new data
        $color->update([
            'name' => $request->name,
        ]);

        return redirect()->route('color.index')->with('success', 'Color updated successfully.');
    }


    // Remove the specified resource from storage.
    public function destroy($id)
    {
        // Find the color by ID and delete it
        $color = Color::findOrFail($id);
        $color->delete();
        
        // Redirect to a success page or somewhere else
        // return redirect()->route('color.index')->with('success', 'Color deleted successfully.');
        return 1;
    }
    
}
