<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    use HasFactory;

    protected $table = 'alumni'; // 👈 tell Laravel the correct table

    protected $fillable = [
        'name',
        'passout_year',
        'email',
        'phone',
        'photo'
    ];
}
