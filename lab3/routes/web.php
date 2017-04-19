<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Http\Request;

$app->get('/', function () use ($app) {
  
	return "Get /products | /products/{id} \n
    post";
});

$app->get('/products', function () use ($app) {

    $products = json_decode(file_get_contents("../resources/products.json"));   
	return response()->json($products);
});


$app->get('/products/{id}', function ($id) use ($app) {

    $products = json_decode(file_get_contents("../resources/products.json"));   
    foreach($products->products as $product)
    {
        if($product->id == $id){
            return response()->json($product);
        }
    }
});

$app->delete('/products/{id}', function ($id) use ($app) {

    $products = json_decode(file_get_contents("../resources/products.json"), true); 
    $index = 0; 
    foreach($products['products'] as $product)
    {
        if($product['id'] == $id){
            unset($products['products'][$index]);
        }
        $index++;
    }

    file_put_contents("../resources/products.json", json_encode($products));

    return "Succsesfully Removed!";
});

$app->put('/products/{id}', function (Request $response, $id) use ($app) {

$products = json_decode(file_get_contents("../resources/products.json"), true);  
    
    if($response->input('title') == null){
        return "Missing title";
    }
    if($response->input('price') == null){
        return "Missing price";
    }
    $index = 0;
    foreach($products['products'] as $product)
    {
        if($product['id'] == $id){

            $products['products'][$index]['title'] = $response->input('title');
            $products['products'][$index]['price'] = $response->input('price');

            file_put_contents("../resources/products.json", json_encode($products));

            return "Succsesfully modified!";
        }
        $index++;
    }

    return "Failed!";
});

$app->post('/products/create', function (Request $response) {

    $products = json_decode(file_get_contents("../resources/products.json"), true);  
    
    if($response->input('title') == null){
        return "Missing title";
    }
    if($response->input('price') == null){
        return "Missing price";
    }

    $id = 0;
    foreach($products['products'] as $product)
    {
        if($product['id'] > $id){
            $id = $product['id'];
        }
    }

    $id += 1;

    $newProduct = array();
    $newProduct['id'] = $id;
    $newProduct['title'] = $response->input('title');
    $newProduct['price'] = $response->input('price');
    $products['products'][] = $newProduct;

    //echo $products;

    file_put_contents("../resources/products.json", json_encode($products));

    return "Succsesfully added!";
});
