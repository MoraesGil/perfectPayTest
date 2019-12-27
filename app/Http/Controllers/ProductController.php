<?php

namespace App\Http\Controllers;

use App\Entities\Product;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    public function index()
    {
        return Product::all();
    }

    public function update($id, ProductRequest $request)
    {
        return Product::findOrFail($id)->update($request->all());
    }
}
