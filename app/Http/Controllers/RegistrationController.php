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
        // Ambil semua section registration dan ubah ke bentuk keyBy('section')
        $registration = RegistrationModel::all()->keyBy('section');
        $fees = RegistrationFee::all();
        $paymentMethods = PaymentMethod::all();

        // Grouping untuk tampilan user (khusus PayPal)
        $paypalGroup = $paymentMethods->where('method_name', 'PayPal');
        $otherMethods = $paymentMethods->where('method_name', '!=', 'PayPal');

        if ($paypalGroup->count() > 0) {
            $emails = $paypalGroup->pluck('paypal_email')->filter()->unique()->values();
            $infos  = $paypalGroup->pluck('additional_info')->filter()->unique()->values();

            // list PayPal email
            $emailList = '<ul class="list-disc pl-5 space-y-1">';
            foreach ($emails as $email) {
                $emailList .= '<li>' . e($email) . '</li>';
            }
            $emailList .= '</ul>';

            // list additional information
            $infoList = '';
            if ($infos->isNotEmpty()) {
                $infoList = '<ul class="list-disc pl-5 space-y-1">';
                foreach ($infos as $info) {
                    $infoList .= '<li>' . e($info) . '</li>';
                }
                $infoList .= '</ul>';
            }

            // Buat satu objek gabungan untuk PayPal
            $paypalItem = new \stdClass();
            $paypalItem->id = null;
            $paypalItem->method_name = 'PayPal';
            $paypalItem->bank_name = null;
            $paypalItem->account_name = null;
            $paypalItem->virtual_account_number = null;
            $paypalItem->important_notes = null;
            $paypalItem->paypal_email = $emailList;
            $paypalItem->additional_info = $infoList;

            // Gabungkan PayPal dengan metode lainnya
            $groupedMethods = $otherMethods->values()->push($paypalItem);
        } else {
            $groupedMethods = $paymentMethods;
        }

        return view('registration', [
            'registration' => $registration,
            'fees' => $fees,
            'paymentMethods' => $groupedMethods,
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

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required|string',
            'content' => 'required|string',
        ]);

        RegistrationModel::create($request->only('section', 'content'));

        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Data saved successfully!');
    }


    public function edit($id)
    {
        $registration = RegistrationModel::findOrFail($id);
        return view('admin.forauthor.edit_registrations_admin', compact('registration'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $registration = RegistrationModel::findOrFail($id);
        $registration->update($request->only('content'));

        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Content updated successfully!');
    }

    public function show($id)
    {
        $registration = RegistrationModel::findOrFail($id);
        return view('admin.forauthor.detail_registrations_admin', compact('registration'))->with('isDetail', true);
    }

    public function destroy(RegistrationModel $registration)
    {
        $registration->delete();
        return redirect()->route('admin.forauthor.list_registrations_admin')->with('success', 'Content deleted successfully!');
    }
}
