<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'details',
        'main_image',
        'category_id',
        'regular_price',
        'sale_price',
        'active',
        'quantity',
        'images'
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }
}
