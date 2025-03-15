<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Models\Validators\ProductValidator;
use \App\Models\Product;

class ProductPut extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        // Update a product
        try {
            $data = $request->all();
            $validatedData = ProductValidator::validate($data, 'put');

            $product = Product::find($validatedData['id']);

            if (!$product) {
                return response()->json(['message' => 'Product not found'], Response::HTTP_NOT_FOUND);
            }

            $product->update($validatedData);
            return response()->json(['product' => $product], Response::HTTP_OK);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Error updating product. Please check you are sending correct data'], Response::HTTP_BAD_REQUEST);
        }
    }
}
