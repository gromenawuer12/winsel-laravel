<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Task extends Model
{
    use HasFactory;

    public function taskType()
    {
        return $this->belongsTo(TaskType::class);
    }
    public function getStartAttribute($value){
        return Carbon::parse($value)->format('d/m/Y h:i:s');
    }

    public static function scopeTasks($query)
    {
        return $query->where('user_id', '=', Auth::id());
    }
    public static function scopeBetweenDates($query, $date)
    {
        return $query->whereBetween('start', [$date . " 00:00:00", $date . " 23:59:59"]);
    }
    public static function scopeDurationWeather($query, $year, $month)
    {
        return $query->whereYear('start', $year)->whereMonth('start', $month)
            ->where('weather_task_id', 1)->selectRaw('task_type_id,
            SUM(TIME_TO_SEC(duration)) AS time')->groupBy('task_type_id');
    }
}
