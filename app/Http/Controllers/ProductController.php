<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::withCustomFields()->latest()->get();

        return view('products.index', compact('products'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(StoreProductRequest $request)
    {
        \Illuminate\Support\Facades\DB::transaction(function () use ($request) {
            $product = Product::create($request->validated());
            $product->saveCustomFields($request->validated());
        });

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(UpdateProductRequest $request, Product $product)
    {
        \Illuminate\Support\Facades\DB::transaction(function () use ($request, $product) {
            $product->update($request->safe()->except(array_keys(Product::getCustomFieldRules())));
            $product->updateCustomFields($request->validated());
        });

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
