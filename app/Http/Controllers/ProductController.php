<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProdcutStoreRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $data = Product::query()->get();

        return response()->json([
            'message' => 'all product in database',
            'data' => $data,
        ]);

    }

    public function show(int $id)
    {

        $product = Product::findOrFail($id);

        return response()->json([
            'in_stock' => $product->in_stock,
        ]);

    }

    public function showCategory($id)
    {

        $product = Product::find($id);

        return $product->category;

    }

    public function store(ProdcutStoreRequest $request)
    {

        Product::query()->create(
            $request->validated()

        );

        return response()->json([
            'message' => 'product created successfully',

        ], 201);

    }

    public function update(ProdcutStoreRequest $request, int $id)
    {

        Product::query()->where('id', $id)->update(
            $request->validated()
        );

        return response()->json([
            'message' => 'product updated successfully',

        ], 201);
    }

    public function destroy(int $id)
    {
        Product::query()->where('id', $id)->delete();

        return response()->json([
            'message' => 'product deleted successfully',

        ]);
    }
}
