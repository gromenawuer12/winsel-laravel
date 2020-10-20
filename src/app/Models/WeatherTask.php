<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeatherTask extends Model
{
    use HasFactory;

    public static function scopeWeatherId($query, $weather)
    {
        return $query->where('weather', $weather)->value('id');
    }
}
