<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactInfo extends Model
{
    use HasFactory;

    protected $table = 'contact_info';

    protected $fillable = [
        'email',
        'phone',
        'address',
        'facebook_link',
        'instagram_link',
        'twitter_link',
        'linkedin_link',
        'tiktok_link',
    ];

    public static function getFirst()
    {
        return self::first();
    }
}