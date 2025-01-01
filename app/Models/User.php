<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    protected static function booted()
    {
        static::created(function ($user) {
            SubscriptionLog::create([
                'user_id' => $user->id,
                'plan_id' => 1,
                'price' => 0,
                'start_date' => now(),
                'end_date' => now()->addDays(3),
            ]);
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

    public function myLoft()
    {
        $log = MyLoftLog::where('user_id', $this->id)->latest()->first();

        if ($log) {
            return $log->location;
        } else {
            return null;
        }
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
}
