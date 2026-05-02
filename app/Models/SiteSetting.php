<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use HasFactory;

    protected $table = 'site_settings';

    protected $fillable = [
        'site_name',
    ];

    public static function getSettings()
    {
        return \Illuminate\Support\Facades\Cache::rememberForever('site_settings_record', function () {
            return self::firstOrCreate(
                ['id' => 1],
                ['site_name' => 'SOMA']
            );
        });
    }

    protected static function booted()
    {
        static::saved(function ($setting) {
            \Illuminate\Support\Facades\Cache::forget('site_settings_record');
        });
    }
}
