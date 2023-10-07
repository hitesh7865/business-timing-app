<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branch extends Model
{
    use HasFactory;

    protected $fillable = [
        'business_id',
        'name',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];

    public function business()
    {
        return $this->belongsTo(Business::class, 'business_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(BranchImage::class, 'branch_id');
    }

    public function WorkingHours()
    {
        return $this->hasMany(WorkingHour::class, 'branch_id');
    }

    public function BranchUnavailableDates()
    {
        return $this->hasMany(BranchUnavailableDate::class, 'branch_id');
    }
}
