<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function show(int $task_id)
    {

        $data= Comment::query()->where('task_id', $task_id
        )->get();
  return response()->json([
            'message' => 'all comments for this task in database',
            "data"=>$data

        ]);
    }

    public function showTask(int $id)
    {

        $comment = Comment::query()->find($id);

        return $comment->task;

    }

    public function store(CommentStoreRequest $request)
    {



        Comment::query()->create($request->validated());
          return response()->json([
            'message' => 'comment created successfully',

        ], 201);

    }

    public function destroy(int $id)
    {

        Comment::query()->where('id', $id)->delete();
          return response()->json([
            'message' => 'comment deleted successfully',

        ]);

    }
}
