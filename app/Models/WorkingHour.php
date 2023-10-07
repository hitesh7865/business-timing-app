<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WorkingHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'branch_id',
        'day',
        'start_time',
        'end_time',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];
}
