<?php

namespace App\Http\Controllers;

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

        return view('registration', compact('registration', 'fees', 'paymentMethods'));
    }
    //====ADMIN====\\
    public function adminIndex()
    {
        $registrations = RegistrationModel::all();
        $fees = RegistrationFee::all();
        $paymentMethods = PaymentMethod::all();

        return view('admin.forauthor.registrationsAdmin', compact('registrations', 'fees', 'paymentMethods'));
    }
}
