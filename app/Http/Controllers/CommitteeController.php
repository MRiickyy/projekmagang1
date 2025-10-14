<?php

namespace App\Http\Controllers;

use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    // ==============================
    // 🔹 FRONTEND PAGES
    // ==============================
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

    // ==============================
    // 🔹 ADMIN LIST PER TYPE
    // ==============================
    public function listSteering(Request $request)
    {
        $query = Committee::where('type', 'steering');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('university', 'like', '%' . $request->search . '%');
            });
        }

        $committees = $query->orderBy('name', 'asc')->paginate(10);

        return view('admin.committees.list_committees', [
            'committees' => $committees,
            'title' => 'Steering Committee',
            'type' => 'steering'
        ]);
    }

    public function listTechnical(Request $request)
    {
        $query = Committee::where('type', 'technical program');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('university', 'like', '%' . $request->search . '%');
            });
        }

        $committees = $query->orderBy('name', 'asc')->paginate(10);

        return view('admin.committees.list_committees', [
            'committees' => $committees,
            'title' => 'Technical Program Committee',
            'type' => 'technical program'
        ]);
    }

    public function listOrganizing(Request $request)
    {
        $query = Committee::where('type', 'organizing');

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('name', 'like', '%' . $request->search . '%')
                  ->orWhere('university', 'like', '%' . $request->search . '%');
            });
        }

        $committees = $query->orderBy('name', 'asc')->paginate(10);

        return view('admin.committees.list_committees', [
            'committees' => $committees,
            'title' => 'Organizing Committee',
            'type' => 'organizing'
        ]);
    }

    // ==============================
    // 🔹 ADMIN CRUD
    // ==============================
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

        // redirect ke list sesuai type
        return redirect()->route('admin.committees.' . str_replace(' ', '_', $validated['type']))
            ->with('success', ucfirst($validated['type']) . ' committee added successfully!');
    }

    public function editForm($id)
    {
        $committee = Committee::findOrFail($id);
        return view('admin.committees.edit_committee', compact('committee'));
    }

    public function updateCommittee(Request $request, $id)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'role'       => 'required|string|max:255',
            'university' => 'nullable|string|max:255',
            'country'    => 'nullable|string|max:255',
            'type'       => 'required|in:steering,technical program,organizing',
        ]);

        $committee = Committee::findOrFail($id);
        $committee->update($validated);

        return redirect()->route('admin.committees.' . str_replace(' ', '_', $validated['type']))
            ->with('success', ucfirst($validated['type']) . ' committee updated successfully!');
    }

    public function deleteCommittee($id)
    {
        $committee = Committee::findOrFail($id);
        $type = $committee->type;

        $committee->delete();

        return redirect()->route('admin.committees.' . str_replace(' ', '_', $type))
            ->with('success', ucfirst($type) . ' committee deleted successfully!');
    }

    public function adminDetail($id)
    {
        $committee = Committee::findOrFail($id);
        return view('admin.committees.detail_committee', compact('committee'));
    }
}
