<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductApiController extends Controller
{
    public function index()
    {
        $products = Product::with('images')
            ->where('is_active', true)
            ->latest()
            ->paginate(10);

        return response()->json([
            'success' => true,
            'message' => 'Products fetched successfully',
            'data'    => $products
        ]);
    }

    public function show(Product $product)
    {
        return response()->json([
            'success' => true,
            'data' => $product->load('images')
        ]);
    }

}
