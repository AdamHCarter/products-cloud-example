<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Models\Product;
use PhpParser\Node\Stmt\Catch_;

class ProductsGet extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //Return a list of products
        try {
            $sortBy = $request->query('sortBy') ?? 'id';
            $direction = $request->query('direction') ?? 'asc';
            $products = Product::orderBy($sortBy, $direction)->get();
            return response()->json(['products' => $products],  Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving products. Please check you are using correct field names'], Response::HTTP_BAD_REQUEST);
        }
    }
}
