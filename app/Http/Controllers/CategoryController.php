<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {

        return Category::query()->get();

    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Category::query()->create($data
        );

    }

    public function products($id)
    {

        $category = Category::find($id);

        return $category->products;

    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        Category::query()->where('id', $id)->update($data);

    }

    public function destroy(int $id)
    {
        Category::query()->where('id', $id)->delete();
    }
}
