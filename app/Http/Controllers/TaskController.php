<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

function index(){
    return Task::query()->get();
}
function store(Request $request){

    $data=$request->validate([
        "title"=>['required','string','max:255'],
        "description"=>['required','string'],
        "status"=>['required','string','in:pending,completed,in-progress'],
        "due_date"=>['required','date'],
    ]);

    Task::query()->create(
        $data
    );}

function update(Request $request,int $id){

    $data=$request->validate([
        "title"=>['required','string','max:255'],
        "description"=>['required','string'],
        "status"=>['required','string','in:pending,completed,in-progress'],
        "due_date"=>['required','date'],
    ]);

    Task::query()->where('id',$id)->update(
        $data
    );}
    function destroy(int $id){
        Task::query()->where('id',$id)->delete();
    }




}
