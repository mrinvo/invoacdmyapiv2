<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class section_config extends Model
{
    use HasFactory;

    protected $fillable = [
        'section_id',
        'time',
        'available_for',
        'available_when',
        'show_answers',
        'show_questions',
        'language',
        'numbers_of_questions',
        'alpha_type',
    ];
}
