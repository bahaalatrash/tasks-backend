<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Model;
    
#[Fillable  (['title', 'details', 'status', 'priority', 'due_date', 'project_id'])]
class Task extends Model
{
    //
}
