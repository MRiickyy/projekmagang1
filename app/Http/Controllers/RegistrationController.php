<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrationModel;
use App\Models\RegistrationFee;
use App\Models\PaymentMethod;

class RegistrationController extends Controller
{
    //==== USER ====\\
    public function index()
    {
        $registration = RegistrationModel::all()->keyBy('section');
        $fees = RegistrationFee::all();
        $paymentMethods = PaymentMethod::all();

        return view('registration', [
            'registration' => $registration,
            'fees' => $fees,
            'paymentMethods' => $paymentMethods,
        ]);
    }

    //==== ADMIN ====\\
    public function adminIndex()
    {
        $registrations = RegistrationModel::all();
        $fees = RegistrationFee::all();
        $paymentMethods = PaymentMethod::all();

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
        $request->validate([
            'section' => 'required|string',
            'content' => 'required|string',
        ]);

        RegistrationModel::create($request->only('section', 'content'));

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
        $request->validate([
            'category' => 'required|string|max:255',
            'usd_physical' => 'required|numeric',
            'idr_physical' => 'required|numeric',
            'usd_online' => 'required|numeric',
            'idr_online' => 'required|numeric',
        ]);

        RegistrationFee::create([
            'category' => $request->category,
            'usd_physical' => $request->usd_physical,
            'idr_physical' => $request->idr_physical,
            'usd_online' => $request->usd_online,
            'idr_online' => $request->idr_online,
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
            'usd_physical' => 'required|numeric',
            'idr_physical' => 'required|numeric',
            'usd_online' => 'required|numeric',
            'idr_online' => 'required|numeric',
        ]);

        $fee = RegistrationFee::findOrFail($id);
        $fee->update([
            'category' => $request->category,
            'usd_physical' => $request->usd_physical,
            'idr_physical' => $request->idr_physical,
            'usd_online' => $request->usd_online,
            'idr_online' => $request->idr_online,
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
        $request->validate([
            'method_name' => 'required|string|in:Virtual Account,PayPal',
        ]);
        if ($request->method_name === 'Virtual Account') {
            $request->validate([
                'bank_name' => 'nullable|string|max:255',
                'account_name' => 'nullable|string|max:255',
                'virtual_account_number' => 'nullable|string|max:50',
                'important_notes' => 'nullable|string',
            ]);
        } elseif ($request->method_name === 'PayPal') {
            $request->validate([
                'paypal_email' => 'nullable|email|max:255',
                'additional_info' => 'nullable|string',
            ]);
        }

        PaymentMethod::create($request->only([
            'method_name',
            'bank_name',
            'account_name',
            'virtual_account_number',
            'important_notes',
            'paypal_email',
            'additional_info'
        ]));

        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Payment Method added successfully!');
    }
}
