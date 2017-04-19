<?php
namespace App\Http\Controllers;

use App\Product;

class ProductsController extends Controller
{
    public function index()
    {
        $product = Product::all();
        return response()->json($product);
    }

    public function show($id)
    {
        $product = Product::find($id);
        $product->stores = $product->stores;
        $product->reviews = $product->reviews;
        return response()->json($product);
    }
}