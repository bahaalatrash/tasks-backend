<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

#[Fillable(['name', 'price', 'in_stock', 'quantity', 'description', 'category_id'])]

class Product extends Model
{
    protected function name(): Attribute
    {

        return Attribute::make(
            get: fn ($value) => ucfirst($value));

    }

    protected function casts(): array
    {

        return [
            'price' => 'float',
            'in_stock' => 'boolean',
            'quantity' => 'integer',
        ];
    }

    public function category()
    {

        return $this->belongsTo(Category::class);
    }
}
