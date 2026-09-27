<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['title', 'body'])]

class Note extends Model
{
    protected function title(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => strtoupper($value));

    }
}
