<?php

namespace App\Http\Controllers\Api\Website;

use App\Http\Controllers\Controller;
use Facades\App\Services\Website\Product;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

class ProductController extends Controller
{
    public function index()
    {
        return response()->json(Product::index());
    }

    public function show($id)
    {
        $product = Product::show($id);

        if(is_null($product)){
            return response()->json(['message' => 'This product is not found'],404);
        }

        return response()->json($product);
    }
}
