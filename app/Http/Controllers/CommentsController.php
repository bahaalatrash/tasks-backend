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

  public function showTask(int $id){

  $comment=  Comment::query()->find($id);
return $comment->task;

  }


public function store(Request $request){


$data = $request->validate([
"task_id"=>'required|exists:tasks,id',
"comment_text"=>'required|string',
"author"=>'required|string|max:255'
]);



Comment::query()->create($data)
;

}


public function destroy(int $id){


Comment::query()->where('id',$id)->delete();

}


}
