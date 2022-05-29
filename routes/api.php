<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Products
Route::controller(ProductController::class)->group(function () {
    // show all products
    Route::get('/v1/products', 'getAllProducts');
    // create a product
    Route::post('/v1/product', 'create');
    // update a product
    Route::put('/v1/product/{id}', 'edit');
    // show a product
    Route::get('/v1/product/{id}', 'show');
    // delete a product
    Route::delete('/v1/product/{id}', 'destroy');
});