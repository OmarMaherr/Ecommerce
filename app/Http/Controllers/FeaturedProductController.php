<?php

namespace App\Http\Controllers;

use App\DataTables\FeaturedProductDataTable;
use Illuminate\Http\Request;

class FeaturedProductController extends Controller
{
    // public function index(ProductDataTable $dataTable)
    // {
    //     return $dataTable->render('admin.products.product');
    // }FeaturedProductDataTable
    public function index(FeaturedProductDataTable $dataTable)
    {
        return $dataTable->render('admin.featuredProducts.featuredProduct');

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
    }


    public function destroy($id)
    {
    }
}
