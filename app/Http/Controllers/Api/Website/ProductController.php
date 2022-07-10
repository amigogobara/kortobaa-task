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

    public function show()
    {
        $product = Product::show();

        if(is_null($product)){
            throw new NotFoundResourceException('This product not found',404);
        }

        return response()->json($product);
    }
}
