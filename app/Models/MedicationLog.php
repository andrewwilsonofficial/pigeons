<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicationLog extends Model
{
    use SoftDeletes;

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
