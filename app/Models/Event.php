<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    // Fields that can be mass assigned
    protected $fillable = [
        'heading',
        'about',
        'start_datetime',
        'end_datetime',
        'location',
    ];
}
