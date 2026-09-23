<?php

    namespace App\Models;
    use Illuminate\Database\Eloquent\Attributes\Fillable;

    use Illuminate\Database\Eloquent\Model;

    #[Fillable(['name','price','in_stock','quantity','description','category_id'])]

    class Product extends Model
    {

    }
