<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Validators\ProductValidator;

class AdminProductController extends Controller
{
    // User role checked for "administrator" in route to prevent all actions and shows 403
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::search(request('search'))->paginate(10);
        return view('admin.products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = new Product();
        return view('admin.products.create', ['product' => $product]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // if valid, create a product
        $data = $request->all();
        $validatedData = ProductValidator::validate($data);
        Product::create($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('admin.products.show', ['product' => $product]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', ['product' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Product lookup, validate, update, redirect
        $product = Product::find($id);
        $data = $request->all();
        $validatedData = ProductValidator::validate($data);
        $product->update($validatedData);

        return redirect()->route('admin.products.index')->with('success', 'Product updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Look up product and delete
        $product = Product::find($id);
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }

}
