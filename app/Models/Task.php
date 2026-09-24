<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;

#[Fillable  (['title', 'details', 'status', 'priority', 'due_date', 'project_id'])]
class Task extends Model
{

public function casts():array{
    return [
        'status' => 'boolean',
        'priority' => 'integer',
        
    ];
}

    public function project(){
return $this->belongsTo(Project::class );

    }



    public function comments(){

    return $this->hasMany(Comment::class);
    }

}
