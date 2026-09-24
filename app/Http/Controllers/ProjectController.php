<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {

        return Project::query()->get();

    }

    public function store(Request $request)
    {
        $data = $request->validate([

            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after:start_date',
            'status' => 'required|boolean',

        ]);
        Project::query()->create($data);
    }
}
