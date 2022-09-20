<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['id','content','key','userID'];
    public $incrementing = false;

    public function items () {
        return $this->hasMany('App\Models\CartItem', 'cart_id');
    }
}
