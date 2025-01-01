<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicationLog extends Model
{
    protected $fillable = [
        'medication_name',
        'dosage',
        'comments',
        'date',
        'pigeons',
    ];

    public function pigeons()
    {
        return $this->belongsToMany(Pigeon::class);
    }
}
