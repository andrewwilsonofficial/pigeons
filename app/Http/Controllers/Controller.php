<?php

namespace App\Http\Controllers;

use App\Models\PlanSubscriptionRequest;
use Illuminate\Support\Facades\Auth;

abstract class Controller
{
    public function __construct()
    {
        if (auth()->check()) {
            if (Auth::user()->role == 'admin') {
                $subscription_requests_count = PlanSubscriptionRequest::where('status', 'pending')->count();

                view()->share('subscription_requests_count', $subscription_requests_count);
            }
        }
    }
}
