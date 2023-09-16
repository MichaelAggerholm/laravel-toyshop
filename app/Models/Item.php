<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $guarded = []; // Allow mass assignment

    public function product() {
        return $this->belongsTo(Product::class);
    }

    public function color() {
        return $this->belongsTo(Color::class);
    }

    public function order() {
        return $this->belongsTo(Order::class);
    }
}
