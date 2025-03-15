<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if ((request()->user() == null || request()->user()->cannot('search', Product::class)) && request('search') != null) {
            return redirect()->route('products.index')->with('error', 'You do not have permission to search.');
        }

        if (request()->user() == null || request()->user()->cannot('paginate', Product::class)) {
            $products = Product::all();
        } else {
            $products = Product::search(request('search'))->paginate(12);
        }



        return view('products.index', ['products' => $products]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', ['product' => $product]);
    }
}