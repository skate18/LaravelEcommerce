<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get("/", [HomeController::class, "index"]);
/* 
// if we do not user controller
Route::get('/', function () {
    return view('welcome')
            ->with('products', \App\Models\Product::all());
});
*/



Route::get('/products/{id}', function ($id) {
    return view('detail');
})->whereNumber("id");
