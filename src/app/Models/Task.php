<?php

namespace App\Models;

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

    public static function scopeTasks($query)
    {
        return $query->where('user_id', '=', Auth::id());
    }
}