<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioSection extends Model
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
                'label' => 'Recent Works',
                'title' => 'Selected Portfolio',
            ]
        );
    }
}
