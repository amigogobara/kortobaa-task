<?php

namespace App\Services\Admin;

use App\Models\Product as ProductModel;

class Product
{
    public function index()
    {
        return ProductModel::where('tenant_id',auth()->user()->tenant_id)->get();
    }

    public function show($id)
    {
        return ProductModel::where('id',$id)->where('tenant_id',auth()->user()->tenant_id)->first();
    }

    public function store($request)
    {
        return ProductModel::create(array_merge($request->all(),[
            'tenant_id' => auth()->user()->tenant_id
        ]));
    }

    public function update($request,$id)
    {
        $product = ProductModel::where('id',$id)->where('tenant_id',auth()->user()->tenant_id)->first();
        if($product != null){
            $product->update($request->all());
        }

        return $product;
    }

    public function destroy($id)
    {
        $product = ProductModel::where('id',$id)->where('tenant_id',auth()->user()->tenant_id)->first();
        if($product != null){
            $product->delete();
        }
    }
}
