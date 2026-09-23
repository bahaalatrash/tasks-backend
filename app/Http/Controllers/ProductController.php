<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        return Product::query()->get();
    }

    public function store(Request $request)
    {

        $data = $request->validate([

            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'max:99999999', 'min:0.01'],
            'in_stock' => ['required', 'boolean'],
            'quantity' => ['required', 'integer', 'min:0'],
            'description' => ['required', 'string'],
            'category_id' => ['required', 'integer', 'exists:categories,id'],

        ]);

        Product::query()->create(
            $data

        );
    }

    public function update(Request $request, int $id)
    {

        $data = $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'price' => ['required', 'integer', 'max:99999999', 'min:0.01'],
                'in_stock' => ['required', 'boolean'],
                'quantity' => ['required', 'integer', 'min:0'],
                'description' => ['required', 'string'],
                'category_id' => ['required', 'integer', 'exists:categories,id'],
            ]
        );

        Product::query()->where('id', $id)->update(
            $data
        );
    }

    public function destroy(int $id)
    {
        Product::query()->where('id', $id)->delete();
    }
}
