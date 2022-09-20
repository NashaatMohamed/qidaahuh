<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['user_info_id',
      'order_status_id',
     'total_price',
      'total_items',
      'name',
      'email',
      'phone' ,
      'mobile' ,
      'country_id' ,
      'city' ,
      'address' ,
      'text'];

}
