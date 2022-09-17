<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    protected $fillable = [
        'image',
        'date_of_birth',
        'gender',
        'user_id',
        'city'
    ];
    protected $table = "user_info";

    public function City()
    {
        return $this->belongsTo(City::class);
    }
    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
