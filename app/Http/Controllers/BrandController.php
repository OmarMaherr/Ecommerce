<?php

namespace App\Http\Controllers;

use App\DataTables\BrandDataTable;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{





    public function index(BrandDataTable $dataTable)
    {
        return $dataTable->render('admin.brands.brand');
    }


    public function create()
    {
        return view('admin.brands.add_brand');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Brand::create([
            'name' => $request->name,
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand created successfully.');
    }


    public function show($id)
    {
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);
        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $brand = Brand::findOrFail($id);

        $brand->update([
            'name' => $request->name,
        ]);

        return redirect()->route('brand.index')->with('success', 'Brand updated successfully.');
    }


    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);
        $brand->delete();
        return 1;
    }

}
