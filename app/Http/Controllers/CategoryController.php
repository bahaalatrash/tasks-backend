<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

function index(){

return Category::query()->get();


}
function store(Request $request){

     Category::query()->create([
        "name" => $request->name,
        "description" => $request->description
    ]);

}



function update(Request $request ,int $id){

Category::query()->where('id',$id)->update([
        "name" => $request->name,
        "description" => $request->description
    ]);

}



function destroy(int $id){
    Category::query()->where('id',$id)->delete();
}




}
