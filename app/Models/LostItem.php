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
        'date_found',
        'user_id',
        'user',
    ];
}
