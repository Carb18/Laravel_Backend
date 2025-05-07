<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
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
    $categoriesName = [];
    foreach($categories as $categoryName => $categoryArray) {

        $categoriesName[] = $categoryName;

        foreach($categoryArray as $product) {
            $products[] = $product;
        }
    }

    return view('home', [
        'products' => $products,
        'categories' => $categoryName,
    ]);
});

// Categories

Route::prefix('categories')->group(function () {

    Route::get('/', function(\Illuminate\Http\Request $request) {


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

        // Chequear si existe el parámetro de query "nombre"

        if(!is_null($request->input('name'))) {

            if(array_key_exists($request->input('name'), $categories)) {
                echo 'The category already exists';
            }

        } else {
            foreach($categories as $nameCategory => $category) {
                echo $nameCategory.'<br>';
            }
        }
       // dd($request->input('name'));
    });

    Route::get('{categoryName}', function(){});
});




Route::get('products/{category?}',function() {
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


        //return \Illuminate\Support\Facades\Response::json($products);
        return view('products', ['products' => $products]);


});
//Route::get( 'categories/tech', function (){
//    echo 'tech products';
//});
//Route::get( 'categories/drinks', function (){
//    echo 'drinks products';
//});
//Route::get( 'categories/sports', function (){
//    echo 'sports products';
//});

