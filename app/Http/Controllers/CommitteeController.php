<?php

namespace App\Http\Controllers;

use App\Models\Committee;

class CommitteeController extends Controller
{
    public function steering()
    {
        $committees = Committee::where('type', 'steering')->get();
        return view('SteeringCommittes', compact('committees'));
    }

    public function technical()
    {
        $committees = Committee::where('type', 'technical program')->get();
        return view('TechnicalProgramCommittee', compact('committees'));
    }

    public function organizing()
    {
        $committees = Committee::where('type', 'organizing')->get();
        return view('OrganizingCommittees', compact('committees'));
    }
}
