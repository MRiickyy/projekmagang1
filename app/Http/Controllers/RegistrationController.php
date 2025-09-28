<?php

namespace App\Http\Controllers;

use App\Models\RegistrationModel;
use App\Models\RegistrationFee;

class RegistrationController extends Controller
{
    public function index()
    {
        $registration = RegistrationModel::first();
        $fees = RegistrationFee::all();

        return view('registration', compact('registration', 'fees'));
    }
}
