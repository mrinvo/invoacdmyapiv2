<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'month',
        'year',
        'status',
        'category_id',
        'user_id'
    ];
}
