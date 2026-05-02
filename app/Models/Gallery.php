<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;

    protected $table = 'galleries';

    protected $fillable = [
        'category',
        'name',
        'age',
        'heading',
        'media_type',
        'media',
        'status'
    ];

    /**
     * Optional: default values
     */
    protected $attributes = [
        'status' => 0,
    ];

    /**
     * Optional: scope for approved data
     */
    public function scopeApproved($query)
    {
        return $query->where('status', 1);
    }

    /**
     * Optional: scope for teachers
     */
    public function scopeTeacher($query)
    {
        return $query->where('category', 'teacher');
    }

    /**
     * Optional: scope for events
     */
    public function scopeEvent($query)
    {
        return $query->where('category', 'event');
    }
}