<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProjectStoreRequest;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        $data = Project::query()->get();

        return response()->json([
            'message' => 'all projects in database ',
            'data' => $data,
        ]);
    }

    public function store(ProjectStoreRequest $request)
    {

        Project::query()->create($request->validated());

        return response()->json([
            'message' => 'project created successfully',

        ]);
    }
}
