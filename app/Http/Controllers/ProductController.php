<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($id)
    {
        return view('detail')
            ->with('product', \App\Models\Product::find($id));
    }
}
