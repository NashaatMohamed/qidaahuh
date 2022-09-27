<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    

    protected $fillable = ['sub_name','photo','category_id','active'];


    public function Categories(){
        return $this->hasMany(Category::class,'category_id');
    }

}
