<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PigeonAttachment extends Model
{
    protected $fillable = ['filename', 'original_filename'];

    public function pigeon()
    {
        return $this->belongsTo(Pigeon::class);
    }
}
