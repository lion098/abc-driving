<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'timing',
        'contact',
        'email',
        'fb_url',
        'insta_url',
        'youtube_url',
        'google_map'
    ];
}
