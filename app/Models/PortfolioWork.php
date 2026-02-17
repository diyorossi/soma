<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PortfolioWork extends Model
{
    use HasFactory;

    protected $table = 'portfolio_works';

    protected $fillable = [
        'title',
        'description',
        'image',
        'category',
        'client_name',
        'project_link',
        'order',
        'is_active',
    ];

    protected $casts = [
        'order' => 'integer',
        'is_active' => 'boolean',
    ];

    public static function getActiveOrdered()
    {
        return self::where('is_active', true)
                   ->orderBy('order', 'asc')
                   ->get();
    }

    public static function getCategories()
    {
        return self::where('is_active', true)
                   ->distinct()
                   ->pluck('category');
    }
}