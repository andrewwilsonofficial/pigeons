<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicationLog extends Model
{
    protected $fillable = [
        'user_id',
        'medication_name',
        'dosage',
        'comments',
        'date',
        'pigeons',
    ];

    public function pigeons()
    {
        return Pigeon::whereIn('id', json_decode($this->pigeons))->get();
    }
}
