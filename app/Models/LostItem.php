<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LostItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'image',
        'description',
        'location',
        'is_found',
        'date_lost',
        'user_id',
        'user',
    ];
    public function user()
{
    return $this->belongsTo(User::class);
}

}
