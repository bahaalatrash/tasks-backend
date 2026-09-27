<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskStoreRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $data = Task::query()->get();

        return response()->json([
            'message' => 'all  tasks in database',
            'tasks' => $data,
        ]);

    }

    public function store(TaskStoreRequest $request)
    {

        Task::query()->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'task created successfully',
        ]);
    }

    public function update(TaskStoreRequest $request, int $id)
    {

        Task::query()->where('id', $id)->update(
            $request->validated()
        );

        return response()->json([
            'message' => 'task updated successfully',
        ]);

    }

    public function destroy(int $id)
    {
        Task::query()->where('id', $id)->delete();

        return response()->json([
            'message' => 'task deleted successfully',
        ]);
    }
}
