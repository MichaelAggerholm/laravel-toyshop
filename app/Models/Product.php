<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // When none is guarded, all is fillable (opposite of guarded) / workaround instead of defining every fillable field
    protected $guarded = [];

    // Has one category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Can have many colors
    public function colors()
    {
        return $this->belongsToMany(Color::class);
    }

}