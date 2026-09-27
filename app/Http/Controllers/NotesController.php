<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoteStoreRequest;
use App\Models\Note;

class NotesController extends Controller
{
    public function index()
    {

        $data = Note::query()->get();

        return response()->json([
            'message' => 'all notes in database',
            'data' => $data,
        ]);
    }

    public function store(NoteStoreRequest $request)
    {
        Note::query()->create(
            $request->validated()
        );

        return response()->json([
            'message' => 'note created successfully',
        ], 200);
    }

    public function update(NoteStoreRequest $request, int $id)
    {
        Note::query()->where('id', $id)->update(
            $request->validated()
        );

        return response()->json([
            'message' => 'note updated successfully',
        ], 201);
    }

    public function destroy(int $id)
    {

        Note::query()->where('id', $id)->delete();

        return response()->json([
            'message' => 'note deleted successfully',
        ]);
    }
}
