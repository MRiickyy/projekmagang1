<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Models\PaymentMethod;
use App\Models\RegistrationFee;
use App\Models\RegistrationModel;

class RegistrationController extends Controller
{
    //==== USER ====\\
    public function index($event_name, $event_year)
    {
        $event = Event::where('name', $event_name)
                      ->where('year', $event_year)
                      ->firstOrFail();

        $registration = RegistrationModel::with('event')->get()->keyBy('section')
            ->where('event_id', $event->id);
        $fees = RegistrationFee::with('event')->get()
            ->where('event_id', $event->id);
        $paymentMethods = PaymentMethod::with('event')->get()
            ->where('event_id', $event->id);

        return view('registration', [
            'registration' => $registration,
            'fees' => $fees,
            'paymentMethods' => $paymentMethods,
            'event' => $event,
        ]);
    }

    //==== ADMIN ====\\
    public function adminIndex()
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
        
        $registrations = RegistrationModel::where('event_id', $selectedEventId)->get();
        $fees = RegistrationFee::where('event_id', $selectedEventId)->get();
        $paymentMethods = PaymentMethod::where('event_id', $selectedEventId)->get();

        return view('admin.forauthor.list_registrations_admin', [
            'registrations' => $registrations,
            'fees' => $fees,
            'paymentMethods' => $paymentMethods,
        ]);
    }

    public function adminRegisAdd()
    {
        return view('admin.forauthor.add_registrations_admin');
    }

    public function adminRegisStore(Request $request)
    {
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            return back()->with('error', 'Please select an event first.');
        }

        $validated = $request->validate([
            'section' => 'required|string',
            'content' => 'required|string',
        ]);

        $validated['event_id'] = $selectedEventId;
        
        RegistrationModel::create($validated);

        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Data added successfully!');
    }


    public function adminRegisEdit($id)
    {
        $registration = RegistrationModel::findOrFail($id);
        return view('admin.forauthor.edit_registrations_admin', compact('registration'));
    }

    public function adminRegisUpdate(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $registration = RegistrationModel::findOrFail($id);
        $registration->update($request->only('content'));

        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Content updated successfully!');
    }

    public function adminRegisShow($id)
    {
        $registration = RegistrationModel::findOrFail($id);
        return view('admin.forauthor.detail_registrations_admin', compact('registration'))->with('isDetail', true);
    }

    public function adminRegisDestroy(RegistrationModel $registration)
    {
        $registration->delete();
        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Content deleted successfully!');
    }

    public function adminRegisFeeAdd()
    {
        return view('admin.forauthor.add_registrationsfee_admin');
    }

    public function adminRegisFeeStore(Request $request)
    {
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            return back()->with('error', 'Please select an event first.');
        }

        $request->validate([
            'category' => 'required|string|max:255',
            'usd_early_bird' => 'required|numeric',
            'usd_reguler' => 'required|numeric',
        ]);

        RegistrationFee::create([
            'category' => $request->category,
            'usd_early_bird' => $request->usd_early_bird,
            'usd_reguler' => $request->usd_reguler,
            'event_id' => $selectedEventId,  // <<< WAJIB
        ]);

        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Data added successfully!');
    }

    public function adminRegisFeeEdit($id)
    {
        $fee = RegistrationFee::findOrFail($id);
        return view('admin.forauthor.edit_registrationsfee_admin', compact('fee'));
    }

    public function adminRegisFeeUpdate(Request $request, $id)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'usd_early_bird' => 'required|numeric',
            'usd_reguler' => 'required|numeric',
        ]);

        $fee = RegistrationFee::findOrFail($id);
        $fee->update([
            'category' => $request->category,
            'usd_early_bird' => $request->usd_early_bird,
            'usd_reguler' => $request->usd_reguler,
        ]);

        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Registration Fee updated successfully!');
    }

    public function adminRegisFeeDestroy(RegistrationFee $fee)
    {
        $fee->delete();
        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Registration Fee deleted successfully!');
    }

    public function adminRegisFeeShow($id)
    {
        $fee = RegistrationFee::findOrFail($id);
        return view('admin.forauthor.detail_registrationsfee_admin', compact('fee'))->with('isDetail', true);
    }

    public function adminPaymentMethodAdd()
    {
        return view('admin.forauthor.add_paymentmethod_admin');
    }

    public function adminPaymentMethodStore(Request $request)
    {
        $selectedEventId = session('selected_event_id');

        if (!$selectedEventId) {
            return back()->with('error', 'Please select an event first.');
        }

        $validated = $request->validate([
            'method_name' => 'required|string|in:Bank Transfer,PayPal',
        ]);
        if ($request->method_name === 'Bank Transfer') {
            $request->validate([
                'bank_name' => 'nullable|string|max:255',
                'account_name' => 'nullable|string|max:255',
                'bank_number' => 'nullable|string|max:50',
                'important_notes' => 'nullable|string',
            ]);
        } elseif ($request->method_name === 'PayPal') {
            $request->validate([
                'paypal_email' => 'nullable|email|max:255',
                'additional_info' => 'nullable|string',
            ]);
        }

        $data = array_merge($validated, ['event_id' => $selectedEventId]);

        PaymentMethod::create($data);

        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Payment Method added successfully!');
    }

    public function adminPaymentMethodEdit($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('admin.forauthor.edit_paymentmethod_admin', compact('paymentMethod'));
    }

    public function adminPaymentMethodUpdate(Request $request, $id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);

        $request->validate([
            'method_name' => 'required|string|in:Bank Transfer,PayPal',
        ]);

        if ($request->method_name === 'Bank Transfer') {
            $request->validate([
                'bank_name' => 'nullable|string|max:255',
                'account_name' => 'nullable|string|max:255',
                'bank_number' => 'nullable|string|max:50',
                'important_notes' => 'nullable|string',
            ]);
        } elseif ($request->method_name === 'PayPal') {
            $request->validate([
                'paypal_email' => 'nullable|email|max:255',
                'additional_info' => 'nullable|string',
            ]);
        }

        $paymentMethod->update($request->only([
            'method_name',
            'bank_name',
            'account_name',
            'bank_number',
            'important_notes',
            'paypal_email',
            'additional_info',
        ]));

        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Payment Method updated successfully!');
    }

    public function adminPaymentMethodDestroy(PaymentMethod $paymentMethod)
    {
        $paymentMethod->delete();
        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Registration Fee deleted successfully!');
    }

    public function adminPaymentMethodShow($id)
    {
        $paymentMethod = PaymentMethod::findOrFail($id);
        return view('admin.forauthor.detail_paymentmethod_admin', compact('paymentMethod'))->with('isDetail', true);
    }
}