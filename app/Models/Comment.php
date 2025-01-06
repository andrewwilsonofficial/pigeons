<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'type', 'type_id', 'comment'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function commentable()
    {
        return $this->morphTo('type', 'type_id');
    }

    public function getCommenatbleNameAttribute()
    {
        if ($this->type == 'pigeon') {
            return Pigeon::find($this->type_id)->band;
        } elseif ($this->type == 'pair') {
            return Pair::find($this->type_id)->name;
        } elseif ($this->type == 'team') {
            return Team::find($this->type_id)->name;
        } else {
            return 'Unknown';
        }
    }

    public function getCommentableLinkAttribute()
    {
        if ($this->type == 'pigeon') {
            return route('pigeons.view', $this->type_id);
        } elseif ($this->type == 'pair') {
            return route('pair', $this->type_id);
        } elseif ($this->type == 'team') {
            return route('team', $this->type_id);
        } else {
            return '#';
        }
    }
}
