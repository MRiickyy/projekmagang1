<?php

namespace App\Http\Controllers;

use App\Models\AuthorInformation;
use Illuminate\Http\Request;

class AuthorInformationController extends Controller
{
    public function index()
    {
        // ambil data pertama (bisa diset hanya ada 1 data saja)
        $authorInfo = AuthorInformation::first();
        return view('author', compact('authorInfo'));
    }
}
