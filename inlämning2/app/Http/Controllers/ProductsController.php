<?php
namespace App\Http\Controllers;

use App\Product;
use App\Store;
use App\Review;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function products()
    {
        $product = Product::all();
        return response()->json($product);
    }

    public function create(Request $request)
    {
        //Check if anything is missing
        if($request->input('title') == null) {
            return "Missing title";
        } elseif($request->input('brand') == null) {
            return "Missing brand";
        } elseif($request->input('price') == null) {
            return "Missing price";
        } elseif($request->input('image') == null) {
            return "Missing image";
        } elseif($request->input('description') == null) {
            return "Missing description";
        }

        $id = Product::insertGetId(
            ['title' => $request->input('title'),
            'brand' => $request->input('brand'),
            'price' => $request->input('price'),
            'image' => $request->input('image'),
            'description' => $request->input('description')
            ]
        );

        foreach ($request->get("stores") as $store) { 
            $product = Product::find($id);
            $product->stores()->attach($store);
        }

        $success = array();
        $success['success'] = true;
        return response()->json($success);
    }

    public function product($id)
    {
        $product = Product::find($id);
        $product->stores = $product->stores;
        $product->reviews = $product->reviews;
        return response()->json($product);
    }

    public function stores()
    {
        $stores = Store::all();
        return response()->json($stores);
    }

    public function reviews()
    {
        $reviews = Review::all();
        return response()->json($reviews);
    }
}