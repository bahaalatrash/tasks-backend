<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentsController extends Controller
{
  public function show ( int $task_id){

   return DB::table('comments')->where('task_id',$task_id
  )->get();
  }



public function store(Request $request){

DB::table('comments')->insert([[

"task_id"=>$request->task_id,
"comment_text"=>$request->comment_text,
"author"=>$request->author


]])
;

}


public function destroy(int $id){

DB::table('comments')->where('id',$id)->delete();

}





}
