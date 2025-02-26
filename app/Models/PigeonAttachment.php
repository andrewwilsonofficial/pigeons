<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PigeonAttachment extends Model
{
    use SoftDeletes;

    protected $fillable = ['pigeon_id', 'filename'];

    public function pigeon()
    {
        return $this->belongsTo(Pigeon::class);
    }
}
