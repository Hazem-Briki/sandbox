<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'category',
        'exam',
        'question_number',
        'question',
        'type',
        'option_a',
        'option_b',
        'option_c',
        'option_d',
        'option_e',
        'option_f',
        'answer',
    ];
}
