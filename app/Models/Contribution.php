<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contribution extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumni_id',
        'amount',
        'payment_method',
        'amount',
        'payment_date',
        'payment_photo',
    ];

    /**
     * Each contribution belongs to one alumni
     */
    public function alumni()
    {
        return $this->belongsTo(Alumni::class, 'alumni_id','id');
    }
}
