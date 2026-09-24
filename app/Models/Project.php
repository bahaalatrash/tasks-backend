<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
#[Fillable(['title', 'description', 'start_date', 'end_date', 'status'])]
class Project extends Model
{
    protected function casts():array{

    return ['status' =>'boolean',


    ];}


function tasks(){

return $this->hasMany(Task::class);


}




}
