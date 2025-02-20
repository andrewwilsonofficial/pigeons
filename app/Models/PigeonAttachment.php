<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PigeonAttachment extends Model
{
    protected $fillable = ['pigeon_id', 'filename'];

    public function pigeon()
    {
        return $this->belongsTo(Pigeon::class);
    }
}
