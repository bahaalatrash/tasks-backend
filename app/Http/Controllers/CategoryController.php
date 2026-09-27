<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryStoreRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        return Category::query()->get();

    }

    public function store(CategoryStoreRequest $request)
    {


        Category::query()->create($request->validated()
        );

    }

    public function products($id)
    {

        $category = Category::find($id);

        return $category->products;

    }

    public function update(CategoryStoreRequest $request, int $id)
    {
        Category::query()->where('id', $id)->update(
            $request->validated());

    }

    public function destroy(int $id)
    {
        Category::query()->where('id', $id)->delete();
    }
}
