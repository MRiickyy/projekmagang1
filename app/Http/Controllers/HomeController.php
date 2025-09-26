<?php

namespace App\Http\Controllers;

use App\Models\Timeline;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Ambil hanya beberapa timeline (misalnya 3 terbaru)
        $timelines1 = Timeline::orderBy('date', 'asc')->where('timeline_number', '=', 1)->get();
        $timelines2 = Timeline::orderBy('date', 'asc')->where('timeline_number', '=', 2)->get();

        return view('home', ['timelines1' => $timelines1,
                            'timelines2' => $timelines2]);
    }
}
