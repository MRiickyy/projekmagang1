<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RegistrationModel;
use App\Models\RegistrationFee;
use App\Models\PaymentMethod;

class RegistrationController extends Controller
{
    //====USER====\\
    public function index()
    {
        $registration = RegistrationModel::first();
        $fees = RegistrationFee::all();

        $paymentMethods = PaymentMethod::all();
        $groupedMethods = $paymentMethods->groupBy('method_name')->map(function ($group) {
            $item = $group->first();

            if ($group->count() > 1 && $item->method_name === 'PayPal') {
                $emails = $group->pluck('paypal_email')->filter()->unique()->values();
                $infos  = $group->pluck('additional_info')->filter()->unique()->values();
                // list paypal email
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
                $item->paypal_email = $emailList;
                $item->additional_info = $infoList;
            }

            return $item;
        });

        return view('registration', [
            'registration' => $registration,
            'fees' => $fees,
            'paymentMethods' => $groupedMethods,
        ]);
    }

    //====ADMIN====\\
    // admin: displays the registration
    public function adminIndex()
    {
        $registrations = RegistrationModel::all();
        $fees = RegistrationFee::all();
        $paymentMethods = PaymentMethod::all();

        $groupedMethods = $paymentMethods->groupBy('method_name')->map(function ($group) {
            $item = $group->first();

            if ($group->count() > 1 && $item->method_name === 'PayPal') {
                $emails = $group->pluck('paypal_email')->filter()->unique()->values();
                $infos  = $group->pluck('additional_info')->filter()->unique()->values();
                // list paypal email
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
                $item->paypal_email = $emailList;
                $item->additional_info = $infoList;
            }
            return $item;
        });

        return view('admin.forauthor.registrationsAdmin', [
            'registrations' => $registrations,
            'fees' => $fees,
            'paymentMethods' => $groupedMethods,
        ]);
    }

    // admin: add
    public function adminRegisAdd()
    {
        return view('admin.forauthor.add_registrationsAdmin');
    }

    // admin: store
    public function store(Request $request)
    {
        $section = $request->input('section');

        if ($section === 'registrations') {
            RegistrationModel::create([
                'cta_title' => $request->cta_title,
                'cta_button' => $request->cta_button,
                'cta_link' => $request->cta_link,
                'notes' => $request->notes,
                'conference_fee_include' => $request->conference_fee_include,
                'registrations_procedures' => $request->registrations_procedures,
            ]);
        } 
        elseif ($section === 'registration_fee') {
            RegistrationFee::create([
                'category' => $request->category,
                'usd_physical' => $request->usd_physical,
                'idr_physical' => $request->idr_physical,
                'usd_online' => $request->usd_online,
                'idr_online' => $request->idr_online,
            ]);
        } 
        elseif ($section === 'payment_method') {
            PaymentMethod::create([
                'method_name' => $request->method_name,
                'bank_name' => $request->bank_name,
                'account_name' => $request->account_name,
                'virtual_account_number' => $request->virtual_account_number,
                'important_notes' => $request->important_notes,
                'paypal_email' => $request->paypal_email,
                'additional_info' => $request->additional_info,
            ]);
        }

        return redirect()->route('admin.forauthor.registrationsAdmin')->with('success', 'Data saved successfully!');
    }
}
