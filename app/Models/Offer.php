<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = ["offer_price","text"];

    public function products(){
        return $this->hasMany(Product::class,'offer_id');
    }

    
}
