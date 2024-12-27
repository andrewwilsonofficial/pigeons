<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MyLoftLog extends Model
{
    protected $fillable = ['user_id', 'location'];
}
