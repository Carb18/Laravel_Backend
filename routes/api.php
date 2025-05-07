<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('products', function(){
    // Return products as json format
    $categories = [
        "Fideos" => [
            'Moñitos',
            'Fideos largos',
            'Cabello de angel',
        ],
        "Verduras" => [
            'Tomates',
            'Lechuga',
            'Cebolla',
        ],
    ];

    $products = [];
    foreach($categories as $categoryArray) {
        foreach ($categoryArray as $product) {
            $products[] = $product;
        }
    }

    return \Illuminate\Support\Facades\Response::json($products);


});
