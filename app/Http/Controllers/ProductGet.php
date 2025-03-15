<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\Product;


class ProductGet extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        //Show one product by id
        try {
            $product = Product::find($id);

            if(!$product){
                return response()->json(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
            }

            return response()->json(['product' => $product], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error retrieving product. Please check you are using the correct id'], Response::HTTP_BAD_REQUEST);
        }
    }
}
