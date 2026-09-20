<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('create',function(){

DB::table('categories')->insert([[

"name"=>"frunture",
"description"=>"made from wood"

]]);




});

Route::get('products',function(){
return DB::table('products')->get();

});
Route::get('categories',function(){
return DB::table('categories')->get();

});

// Route::get('products/{id}',function( int $id){
//     return DB::table('products')->where('id',$id)->first();
// });

// Route::post('products',function(Request $request){
//     $data=$request->validate([
//         "name"=>"required|string",
//         "price"=>"required|numeric",
//         "in_stock"=>"required|boolean",
//         "quantity"=>"required|integer",
//         "description"=>"nullable|string",
//         "category_id"=>"required|exists:categories,id"
//     ]);
//     return DB::table('products')->insert($data);
// });

// Route::put('products/{id}',function(Request $request,int $id){
//     $data=$request->validate([
//         "name"=>"required|string",
//         "price"=>"required|numeric",
//         "in_stock"=>"required|boolean",
//         "quantity"=>"required|integer",
//         "description"=>"nullable|string",
//         "category_id"=>"required|exists:categories,id"
//     ]);
//     return DB::table('products')->where('id',$id)->update($data);
// });
// Route::delete('products/{id}',function(int $id){
//     return DB::table('products')->where('id',$id)->delete();
// });


// Route::Get('notes',function(){

//  return DB::table('notes')->get();


// });

// Route::post('create-note',function(Request $request){

// $date=$request->validate([
//     "title"=>'required|string|max:255',
//     "body"=>'required|string    '
// ]);
// DB::table('notes')->insert($date);
// });

// Route::put('update-note/{id}',function(Request $request,int $id){

// $date=$request->validate([
// "title"=>'required|string|max:255',
//     "body"=>'required|string'

// ]);

// DB::table('notes')->where('id',$id)->update($date);


// });


// Route::delete('delete-note/{id}',function(int $id , Request $request){

// DB::table('notes')->where('id',$id)->delete();


// });




Route::prefix('products')->group(function(){

Route::get('/',[ProductController::class,'index']);
Route::post('/',[ProductController::class,'store']);





Route::put( '/{id}',function($id,Request $request){
DB::table('products')->where('id',$id)->update([
    "name"=>$request->name,
    "price"=>$request->price,
    "in_stock"=>$request->in_stock,
    "quantity"=>$request->quantity,
    "description"=>$request->description,
    "category_id"=>$request->category_id
]);
});



Route::delete('/{id}',function($id){
    DB::table('products')->where('id',$id)->delete();

});


});


