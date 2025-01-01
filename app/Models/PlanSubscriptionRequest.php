<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PlanSubscriptionRequest extends Model
{
    protected $fillable = [
        'user_id',
        'plan_id',
        'payment_method_id',
        'price',
        'start_date',
        'end_date',
        'notes',
        'attachments',
        'status',
        'approved_by',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }
}
