<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {

        $data = Category::query()->get();

        return response()->json([
            'message' => 'all categories in database ',
            'data' => $data,
        ]);

    }

    public function store(CategoryStoreRequest $request)
    {

        Category::query()->create($request->validated()
        );

        return response()->json([
            'message' => 'category created successfuly',
        ]);

    }

    public function products($id)
    {

        $products = Category::find($id)->products;

        return response()->json([
            'message' => 'all products to this category',
            'products' => $products,
        ]);

    }

    public function update(CategoryStoreRequest $request, int $id)
    {
        Category::query()->where('id', $id)->update(
            $request->validated());

            return response()->json([
            'message' => 'category updated successfuly',
        ]);
    }

    public function destroy(int $id)
    {
        Category::query()->where('id', $id)->delete();
        return response()->json([
            'message' => 'category deleted successfuly',
        ]);
    }
}
