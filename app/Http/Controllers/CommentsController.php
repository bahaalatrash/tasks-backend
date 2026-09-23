<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
  public function show ( int $task_id){

   return Comment::query()->where('task_id',$task_id
  )->get();

  }



public function store(Request $request){

Comment::query()->create([

"task_id"=>$request->task_id,
"comment_text"=>$request->comment_text,
"author"=>$request->author


])
;

}


public function destroy(int $id){


Comment::query()->where('id',$id)->delete();

}


}
