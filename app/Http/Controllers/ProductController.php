<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($id)
    {
        return view('detail')
            ->with('product', \App\Models\Product::find($id));
    }

    public function getAllProducts()
    {
        return response(Product::all());
    }

    public function create(Request $request)
    {
     
       $product = new Product();
       $product->name = $request->name;
       $product->description = $request->description;

       $product->save();

       return response($product);

    }

    public function edit (Request $request, $id)
    {
        $product= Product::findOrFail($id);

        $name = $request->name;
        if(!empty($name)){
           $product->name = $name ;
        }
        $description = $request->description;
        if(!empty($description)){
           $product->description = $description ;
        }

        $product->save();
       return response($product);
    }

    public function show (Request $request, $id){
        $product= Product::find($id);
        return response($product);
    }

    public function destroy ($id){
        $product= Product::find($id);
        $product->delete();
       return response(["deleted" => true]);
    }
}
