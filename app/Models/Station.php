<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Station extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'station_name',
        'location_name',
        'location'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getLongitudeAttribute()
    {
        return explode(',', $this->location)[0];
    }

    public function getLatitudeAttribute()
    {
        return explode(',', $this->location)[1];
    }
}
