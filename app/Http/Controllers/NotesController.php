<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NotesController extends Controller
{
    public function index(){


 return DB::table('notes')->get();
    }



public function store(Request $request){


DB::table('notes')->insert([[

"title"=>$request->title ,
"body"=>$request->body

]]);
}


public function update(Request $request ,int $id ){

DB::table('notes')->where('id',$id)->update([
    "title"=>$request->title,
    "body"=>$request->body
]);


}
public function destroy( int $id ){

DB::table('notes')->where('id',$id)->delete();


}


}
