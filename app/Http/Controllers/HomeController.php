<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanSubscriptionRequest;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $plans = Plan::where('id', '!=', 1)->get();
        $plan_subscription_requests = PlanSubscriptionRequest::where('user_id', auth()->id())->where('status', 'pending')->get();

        return view('home', compact('plans', 'plan_subscription_requests'));
    }
}
