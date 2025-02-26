<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use App\Models\Plan;
use App\Models\PlanSubscriptionRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    public function subscribe(Plan $plan)
    {
        $payment_methods = PaymentMethod::all();

        return view('plans.subscribe', compact('plan', 'payment_methods'));
    }

    public function processSubscription(Request $request, Plan $plan)
    {
        $request->validate([
            'payment_method_id' => 'required|exists:payment_methods,id',
            'payment_date' => 'required|date',
            'notes' => 'nullable|string',
            'attachments.*' => 'nullable|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $attachments = [];
        if ($request->hasFile('attachments')) {
            foreach ($request->file('attachments') as $attachment) {
                $attachments[] = $attachment->store('attachments', 'public');
            }
        }

        $planSubscriptionRequest = PlanSubscriptionRequest::create([
            'user_id' => auth()->id(),
            'plan_id' => $plan->id,
            'payment_method_id' => $request->payment_method_id,
            'price' => $plan->price,
            'start_date' => $request->payment_date,
            'end_date' => Carbon::parse($request->payment_date)->addDays($plan->duration),
            'notes' => $request->notes,
            'attachments' => json_encode($attachments),
        ]);

        return redirect()->route('plans.thankYou', $planSubscriptionRequest)->with('success', __('Subscription request has been sent successfully.'));
    }

    public function thankYou(PlanSubscriptionRequest $planSubscriptionRequest)
    {
        return view('plans.thank-you', compact('planSubscriptionRequest'));
    }
}
