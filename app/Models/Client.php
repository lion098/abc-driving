<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_name',
        'client_address',
        'phone',
        'email',
        'image',
        'course_id',
        'completed_days',
        'from_time',
        'to_time',
        'slug'
    ];

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
}
