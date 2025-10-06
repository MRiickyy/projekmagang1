<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    public function steering()
    {
        $committees = Committee::where('type', 'steering')->get();
        return view('committees.SteeringCommittes', compact('committees'));
    }

    public function technical()
    {
        $committees = Committee::where('type', 'technical program')->get();
        return view('committees.TechnicalProgramCommittee', compact('committees'));
    }

    public function organizing()
    {
        $committees = Committee::where('type', 'organizing')->get();
        return view('committees.OrganizingCommittees', compact('committees'));
    }

    public function listCommittees(Request $request)
    {
        $query = Committee::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                    ->orWhere('university', 'like', '%' . $request->search . '%');
            });
        }

        if ($request->filled('type')) {
            $query->where('type', $request->type);
        }

        $committees = $query->orderBy('name', 'asc')->paginate(10);

        return view('admin.committees.list_committees', compact('committees'));
    }

    public function addForm()
    {
        return view('admin.committees.add_committee');
    }

    public function addCommittee(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'role'       => 'required|string|max:255',
            'university' => 'nullable|string|max:255',
            'country'    => 'nullable|string|max:255',
            'type'       => 'required|in:steering,technical program,organizing',
        ]);

        Committee::create($validated);

        return redirect()->route('admin.committees')->with('success', 'Committee has been added successfully!');
    }

    public function editForm($id)
    {
        $committee = Committee::findOrFail($id);
        return view('admin.committees.edit_committee', compact('committee'));
    }

    public function updateCommittee(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'university' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'type' => 'required|in:steering,technical program,organizing',
        ]);

        $committee = Committee::findOrFail($id);
        $committee->update($validated);

        return redirect()->route('admin.committees')->with('success', 'Committee updated successfully!');
    }

    public function deleteCommittee($id)
    {
        $committee = Committee::findOrFail($id);
        $committee->delete();

        return redirect()->route('admin.committees')->with('success', 'Committee deleted successfully!');
    }

    public function adminDetail($id)
    {
        $committee = Committee::findOrFail($id);
        return view('admin.committees.detail_committee', compact('committee'));
    }
}
