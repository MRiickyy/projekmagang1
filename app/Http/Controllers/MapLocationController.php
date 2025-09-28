<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MapLocation;
use App\Models\ContactInfo;

class MapLocationController extends Controller
{
    public function index()
    {
        $map = MapLocation::latest()->first(); // ambil link maps terakhir
        $contacts = ContactInfo::all();        // ambil contact info

        return view('contact', compact('map', 'contacts')); // sesuaikan dengan nama file blade
    }
}