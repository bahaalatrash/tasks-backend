<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;

class NotesController extends Controller
{
    public function index()
    {

        return Note::query()->get();
    }

    public function store(Request $request)
    {

        $data = $request->validate([

            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],

        ]);

        Note::query()->create(
            $data
        );
    }

    public function update(Request $request, int $id)
    {
        $data = $request->validate([

            'title' => ['required', 'string', 'max:255'],
            'body' => ['required', 'string'],

        ]);

        Note::query()->where('id', $id)->update(
            $data
        );
    }

    public function destroy(int $id)
    {

        Note::query()->where('id', $id)->delete();
    }
}
