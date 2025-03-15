<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Http\Response;
use App\Models\Product;
use App\Models\Validators\ProductValidator;
use function Pest\Laravel\getJson;

class ProductPost extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        //Add a product
        try {
            $data = $request->all();
            $validatedData = ProductValidator::validate($data, 'post');
            $product = Product::create($validatedData);

            return response()->json(['product' => $product], Response::HTTP_OK);
        } catch (\Exception $e) {
            // report error with validation error
            //return response()->json(['message' => 'Error creating product. Please check you are sending correct data. Error: ' . $e->getMessage()], Response::HTTP_BAD_REQUEST);
            
            // report generic error for all errors
            return response()->json(['message' => 'Error creating product. Please check you are sending correct data'], Response::HTTP_BAD_REQUEST);
        }
    }
}
