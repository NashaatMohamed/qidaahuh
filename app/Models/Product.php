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

<<<<<<< HEAD
    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_details');
    }
=======
    public $timestamps = false;
      public function offer(){
    return $this->belongsTo(Offer::class,'offer_id');
  }
>>>>>>> bf1fab89f86080784816c6a12a3c43f765807557
}
