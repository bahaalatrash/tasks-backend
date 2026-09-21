<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function index()
    {

        return DB::table('products')->get();
    }


    public function store(Request $request)
    {

        DB::table('products')->insert([

            "name" => $request->name,
            "price" => $request->price,
            "in_stock" => $request->in_stock,
            "quantity" => $request->quantity,
            "description" => $request->description,
            "category_id" => $request->category_id
        ]);
    }


    public function update(Request $request, int $id)
    {


        DB::table('products')->where('id', $id)->update([



            "name" => $request->name,
            "price" => $request->price,
            "in_stock" => $request->in_stock,
            "quantity" => $request->quantity,
            "description" => $request->description,
            "category_id" => $request->category_id


        ]);
    }


    public function destroy(int $id)
    {
        DB::table('products')->where('id', $id)->delete();
    }
}
