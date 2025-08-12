<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Habit extends Model
{
    protected $fillable = [
        'name',
        'description',
        'start_date',
        'is_completed',
        'category',
    ];
}
