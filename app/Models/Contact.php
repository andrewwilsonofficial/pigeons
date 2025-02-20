<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'street',
        'city',
        'state',
        'country',
        'postal_code',
        'phone',
        'email',
        'website',
        'relationship',
        'notes',
    ];

    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    public function getAddressAttribute()
    {
        return "{$this->street}, {$this->city}, {$this->state}, {$this->country}, {$this->postal_code}";
    }
}
