<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\NotesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use Dom\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('categories')->group(function () {

    Route::get('/', [CategoryController::class, 'index']);
    Route::get('/products/{id}', [CategoryController::class, 'products']);
    Route::post('/', [CategoryController::class, 'store']);
    Route::put('/{id}', [CategoryController::class, 'update']);
    Route::delete('/{id}', [CategoryController::class, 'destroy']);
});



////bahaa for traninig :)
Route::prefix('notes')->group(function () {

    Route::get('/', [NotesController::class, 'index']);
    Route::post('/', [NotesController::class, 'store']);
    Route::put('/{id}', [NotesController::class, 'update']);
    Route::delete('/{id}', [NotesController::class, 'destroy']);
});



Route::prefix('products')->group(function () {

    Route::get('/', [ProductController::class, 'index']);
    Route::get('/{id}', [ProductController::class, 'show']);
    Route::get('/category/{id}', [ProductController::class, 'showCategory']);
    Route::post('/', [ProductController::class, 'store']);
    Route::put('/{id}', [ProductController::class, 'update']);
    Route::delete('/{id}', [ProductController::class, 'destroy']);
});


Route::prefix('tasks')->group(function () {

    Route::get('/', [TaskController::class, 'index']);
    Route::post('/', [TaskController::class, 'store']);
    Route::put('/{id}', [TaskController::class, 'update']);
    Route::delete('/{id}', [TaskController::class, 'destroy']);
});


///projects routes over here :)
Route::prefix('projects')->group(function () {

    Route::get('/', [ProjectController::class, 'index']);
    Route::post('/', [ProjectController::class, 'store']);
});

//// comments routes over here :)

Route::prefix('comments')->group(function () {

    Route::get('/{task_id}', [CommentsController::class, 'show']);
    Route::post('/', [CommentsController::class, 'store']);
    Route::delete('/{id}', [CommentsController::class, 'destroy']);
});

