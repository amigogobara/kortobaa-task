<?php

namespace App\Services\Website;

use Symfony\Component\Translation\Exception\NotFoundResourceException;

class Product
{
    public function index()
    {
        $tenant = resolve('tenant');
        return  \App\Models\Product::where('tenant_id',$tenant->id)->get();
    }

    public function show($id)
    {
        $tenant = resolve('tenant');
        $product = \App\Models\Product::where('id',$id)->where('tenant_id',$tenant->id)->first();

        return $product;
    }
}
