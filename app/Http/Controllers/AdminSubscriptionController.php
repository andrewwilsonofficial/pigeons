<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\PlanSubscriptionRequest;
use App\Models\SubscriptionLog;
use App\Models\User;
use Illuminate\Http\Request;

class AdminSubscriptionController extends Controller
{
    public function subscriptions()
    {
        $subscription_requests = PlanSubscriptionRequest::where('status', 'pending')->get();
        $subscription_logs = SubscriptionLog::orderBy('id', 'desc')->get();
        $users = User::where('role', 'user')->get();
        $plans = Plan::all();

        return view('admin.subscriptions.index', compact('subscription_requests', 'subscription_logs', 'users', 'plans'));
    }

    public function storeSubscription(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'plan_id' => 'required',
            'price' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        SubscriptionLog::create([
            'user_id' => $request->user_id,
            'plan_id' => $request->plan_id,
            'price' => $request->price,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
        ]);

        return redirect()->back()->with('success', __('Subscription added successfully'));
    }

    public function destroySubscription(SubscriptionLog $subscriptionLog)
    {
        $subscriptionLog->delete();

        return redirect()->back()->with('success', __('Subscription deleted successfully'));
    }

    public function destroySubscriptionRequest(PlanSubscriptionRequest $planSubscriptionRequest)
    {
        $planSubscriptionRequest->delete();

        return redirect()->back()->with('success', __('Subscription request deleted successfully'));
    }

    public function viewSubscriptionRequest(PlanSubscriptionRequest $planSubscriptionRequest)
    {
        return view('admin.subscriptions.view', compact('planSubscriptionRequest'));
    }

    public function approveSubscriptionRequest(PlanSubscriptionRequest $planSubscriptionRequest, Request $request)
    {
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        $planSubscriptionRequest->update([
            'status' => 'approved',
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);

        SubscriptionLog::create([
            'user_id' => $planSubscriptionRequest->user_id,
            'plan_id' => $planSubscriptionRequest->plan_id,
            'price' => $planSubscriptionRequest->price,
            'start_date' => $start_date,
            'end_date' => $end_date,
        ]);

        return redirect()->route('admin.subscriptions')->with('success', __('Subscription request approved successfully'));
    }

    public function rejectSubscriptionRequest(PlanSubscriptionRequest $planSubscriptionRequest)
    {
        $planSubscriptionRequest->update([
            'status' => 'rejected',
        ]);

        return redirect()->route('admin.subscriptions')->with('success', __('Subscription request rejected successfully'));
    }
}
