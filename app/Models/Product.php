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
        'SubCategory_id',
        "offer_id",
        'regular_price',
        'sale_price',
        'active',
        'quantity',
        'images'
    ];

    public $timestamps = false;
      public function offer(){
    return $this->belongsTo(Offer::class,'offer_id');
  }
}
