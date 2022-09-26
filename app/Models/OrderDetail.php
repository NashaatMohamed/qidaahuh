<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
    'order_id',
           'product_id',
          'price',
         'quantity',
          'total_price'];
          public function products()
          {
            return $this->belongsTo(Product::class,'product_id');
          }
}

