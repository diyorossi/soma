<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceSection extends Model
{
    use HasFactory;

    protected $fillable = [
        'label',
        'title',
    ];

    public static function getActive()
    {
        return self::firstOrCreate(
            ['id' => 1],
            [
                'label' => 'Our Services',
                'title' => 'What We Offer',
            ]
        );
    }
}
