<?php

namespace App\Http\Controllers;

use App\Models\MedicationLog;
use App\Models\Pigeon;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    public function medications()
    {
        $medication_logs = MedicationLog::where('user_id', auth()->id())->get();

        return view('medications.index', compact('medication_logs'));
    }

    public function createMedication()
    {
        $pigeons = Pigeon::where('user_id', auth()->id())->get();

        return view('medications.create', compact('pigeons'));
    }

    public function storeMedication(Request $request)
    {
        $request->validate([
            'medication_name' => 'required',
            'dosage' => 'required',
            'date' => 'required',
            'pigeons' => 'required|array',
        ]);

        MedicationLog::create([
            'user_id' => auth()->id(),
            'medication_name' => $request->medication_name,
            'dosage' => $request->dosage,
            'date' => $request->date,
            'comments' => $request->comments,
            'pigeons' => json_encode($request->pigeons),
        ]);

        return redirect()->route('medications')->with('success', __('Medication log created successfully.'));
    }
}
