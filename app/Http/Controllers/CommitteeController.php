<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Committee;
use Illuminate\Http\Request;

class CommitteeController extends Controller
{
    // ==============================
    // 🔹 FRONTEND PAGES
    // ==============================
    public function steering($event_name, $event_year)
    {
        $event = Event::where('name', $event_name)
                      ->where('year', $event_year)
                      ->firstOrFail();

        $committees = Committee::with('event')
            ->where('event_id', $event->id)
            ->where('type', 'steering')
            ->get();

        return view('committees.SteeringCommittes', compact('committees', 'event'));
    }

    public function technical($event_name, $event_year)
    {
        $event = Event::where('name', $event_name)
                      ->where('year', $event_year)
                      ->firstOrFail();

        $committees = Committee::with('event')
            ->where('event_id', $event->id)
            ->where('type', 'technical program')
            ->get();

        return view('committees.TechnicalProgramCommittee', compact('committees', 'event'));
    }

    public function organizing($event_name, $event_year)
    {
        $event = Event::where('name', $event_name)
                      ->where('year', $event_year)
                      ->firstOrFail();

        $committees = Committee::with('event')
            ->where('event_id', $event->id)
            ->where('type', 'organizing')
            ->get();

        return view('committees.OrganizingCommittees', compact('committees', 'event'));
    }

    // ==============================
    // 🔹 ADMIN LIST PER TYPE
    // ==============================
    public function listSteering(Request $request)
    {
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            $latestEvent = Event::latest('year')->first();
            if (!$latestEvent) {
                return back()->with('error', 'No event found.');
            }
            $selectedEventId = $latestEvent->id;
            session(['selected_event_id' => $selectedEventId]);
        }

        $event = Event::find($selectedEventId);

        $query = Committee::where('event_id', $selectedEventId)
            ->where('type', 'steering');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('university', 'like', "%{$search}%");
            });
        }

        $committees = $query->orderBy('name', 'asc')->paginate(10);
        $committees->appends($request->all());

        return view('admin.committees.list_committees', [
            'committees' => $committees,
            'title' => 'Steering Committee - ' . $event->name . ' (' . $event->year . ')',
            'type' => 'steering',
            'event' => $event,
        ]);
    }

    public function listTechnical(Request $request)
    {
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            $latestEvent = Event::latest('year')->first();
            if (!$latestEvent) {
                return back()->with('error', 'No event found.');
            }
            $selectedEventId = $latestEvent->id;
            session(['selected_event_id' => $selectedEventId]);
        }

        $event = Event::find($selectedEventId);

        $query = Committee::where('event_id', $selectedEventId)
            ->where('type', 'technical program');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('university', 'like', "%{$search}%");
            });
        }

        $committees = $query->orderBy('name', 'asc')->paginate(10);
        $committees->appends($request->all());

        return view('admin.committees.list_committees', [
            'committees' => $committees,
            'title' => 'Technical Program Committee - ' . $event->name . ' (' . $event->year . ')',
            'type' => 'technical program',
            'event' => $event,
        ]);
    }

    public function listOrganizing(Request $request)
    {
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            $latestEvent = Event::latest('year')->first();
            if (!$latestEvent) {
                return back()->with('error', 'No event found.');
            }
            $selectedEventId = $latestEvent->id;
            session(['selected_event_id' => $selectedEventId]);
        }

        $event = Event::find($selectedEventId);

        $query = Committee::where('event_id', $selectedEventId)
            ->where('type', 'organizing');

        if ($request->filled('search')) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                    ->orWhere('university', 'like', "%{$search}%");
            });
        }

        $committees = $query->orderBy('name', 'asc')->paginate(10);
        $committees->appends($request->all());

        return view('admin.committees.list_committees', [
            'committees' => $committees,
            'title' => 'Organizing Committee - ' . $event->name . ' (' . $event->year . ')',
            'type' => 'organizing',
            'event' => $event,
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
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            return back()->with('error', 'Please select an event first.');
        }

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'role'       => 'required|string|max:255',
            'university' => 'nullable|string|max:255',
            'country'    => 'nullable|string|max:255',
            'type'       => 'required|in:steering,technical program,organizing',
        ]);

        $validated['event_id'] = $selectedEventId;

        Committee::create($validated);

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
