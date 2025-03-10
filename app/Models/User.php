<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements MustVerifyEmail
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected static function booted()
    {
        static::created(function ($user) {
            // if($user->role === 'user') {
                SubscriptionLog::create([
                    'user_id' => $user->id,
                    'plan_id' => 1,
                    'price' => 0,
                    'start_date' => now(),
                    'end_date' => now()->addDays(3),
                ]);
            // }
        });
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function subscription()
    {
        return $this->hasOne(SubscriptionLog::class, 'user_id', 'id')
                    ->where('end_date', '>', now())
                    ->latest('end_date');
    }

    public function isSubscribed()
    {
        return $this->subscription()->exists();
    }

    public function getPlanAttribute()
    {
        return $this->subscription ? $this->subscription->plan->name : __('No Plan');
    }

    public function getMyLoftAttribute()
    {
        $log = MyLoftLog::where('user_id', $this->id)->latest()->first();

        if ($log) {
            return [
                'latitude' => explode(',', $log->location)[0],
                'longitude' => explode(',', $log->location)[1],
            ];
        } else {
            return null;
        }
    }
}
