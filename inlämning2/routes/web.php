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

$app->get('/products', 'ProductsController@products');

$app->post('/products', 'ProductsController@create');

$app->get('/products/{id}', 'ProductsController@product');

$app->get('/stores', 'ProductsController@stores');

$app->get('/reviews', 'ProductsController@reviews');
