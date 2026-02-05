<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResponse
    {
        $products = Product::withCustomFields()->latest()->get();

        return response()->json(['data' => $products]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request): JsonResponse
    {
        $product = DB::transaction(function () use ($request) {
            $product = Product::create($request->validated());
            $product->saveCustomFields($request->validated());

            return $product->load('customFieldValues');
        });

        return response()->json([
            'message' => 'Product created successfully.',
            'data' => $product,
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): JsonResponse
    {
        $product = Product::withCustomFields()->findOrFail($id);

        return response()->json(['data' => $product]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, string $id): JsonResponse
    {
        $product = Product::findOrFail($id);

        $product = DB::transaction(function () use ($request, $product) {
            $product->update($request->safe()->except(array_keys(Product::getCustomFieldRules())));
            $product->updateCustomFields($request->validated());

            return $product->load('customFieldValues');
        });

        return response()->json([
            'message' => 'Product updated successfully.',
            'data' => $product,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id): JsonResponse
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json([
            'message' => 'Product deleted successfully.',
        ]);
    }
}
