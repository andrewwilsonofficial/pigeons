<?php

namespace App\Http\Controllers;

use App\Models\MedicationLog;
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
        return view('medications.create');
    }

    public function storeMedication(Request $request)
    {
        $request->validate([
            'medication' => 'required',
            'dosage' => 'required',
            'date' => 'required',
        ]);

        MedicationLog::create([
            'user_id' => auth()->id(),
            'medication' => $request->medication,
            'dosage' => $request->dosage,
            'date' => $request->date,
        ]);

        return redirect()->route('medications.index');
    }
}
