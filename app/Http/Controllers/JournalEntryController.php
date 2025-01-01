<?php

namespace App\Http\Controllers;

use App\Models\JournalEntry;
use Illuminate\Http\Request;

class JournalEntryController extends Controller
{
    public function journalEntries()
    {
        $journalEntries = JournalEntry::where('user_id', auth()->id())->get();

        return view('journal-entries.index', compact('journalEntries'));
    }

    public function createJournalEntry()
    {
        return view('journal-entries.create');
    }

    public function storeJournalEntry(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'content' => 'required',
        ]);

        JournalEntry::create([
            'user_id' => auth()->id(),
            'date' => $request->date,
            'content' => $request->content,
        ]);

        return redirect()->route('journal-entries')->with('success', __('Journal entry created successfully.'));
    }

    public function editJournalEntry(JournalEntry $journalEntry)
    {
        return view('journal-entries.edit', compact('journalEntry'));
    }

    public function updateJournalEntry(Request $request, JournalEntry $journalEntry)
    {
        $request->validate([
            'date' => 'required|date',
            'content' => 'required',
        ]);

        $journalEntry->update([
            'date' => $request->date,
            'content' => $request->content,
        ]);

        return redirect()->route('journal-entries')->with('success', __('Journal entry updated successfully.'));
    }

    public function destroyJournalEntry(JournalEntry $journalEntry)
    {
        $journalEntry->delete();

        return redirect()->route('journal-entries')->with('success', __('Journal entry deleted successfully.'));
    }
}
