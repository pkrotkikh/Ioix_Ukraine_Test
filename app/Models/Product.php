<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    public function categories () : BelongsTo
    {
//        return $this->belongsTo("ProductCategory")
        return $this->belongsTo('App\Models\ProductCategory', 'category_id', 'id');
    }
}
