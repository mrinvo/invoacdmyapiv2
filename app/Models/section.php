<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'type',
        'exam_id',
        'user_id',
        'active'


    ];
}
