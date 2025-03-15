<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Product;

class SearchProductsGet extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //Return a list of products based on query
        try {
            $sortBy = $request->query('sortBy') ?? 'id';
            $direction = $request->query('direction') ?? 'asc';
            //$search = $request->query('q') ?? '';
            if(!$request->query('q')) {
                return response()->json(['message' => 'Error retrieving products. Please check you are using correct field names'], Response::HTTP_BAD_REQUEST);
            }
            $search = $request->query('q');

            $products = Product::search($search)->orderBy($sortBy, $direction)->get();

            return response()->json(['products' => $products],  Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving products. Please check you are using correct field names'], Response::HTTP_BAD_REQUEST);
        }
    }
}
