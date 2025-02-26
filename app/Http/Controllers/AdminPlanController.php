<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use Illuminate\Http\Request;

class AdminPlanController extends Controller
{
    public function plans()
    {
        $plans = Plan::where('id', '>', 1)->get();

        return view('admin.plans.index', compact('plans'));
    }

    public function editPlan(Plan $plan)
    {
        return view('admin.plans.edit', compact('plan'));
    }

    public function updatePlan(Request $request, Plan $plan)
    {
        $plan->update($request->all());

        return redirect()->route('admin.plans')->with('success', __('Plan updated successfully'));
    }
}
