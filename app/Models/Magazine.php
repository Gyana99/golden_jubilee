<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Magazine extends Model
{
    use HasFactory;
    protected $fillable = [
    'title', 'alumni_id', 'image', 'details', 'type', 'publish', 'updated_by'
];

public function alumni()
{
    return $this->belongsTo(Alumni::class);
}
}
