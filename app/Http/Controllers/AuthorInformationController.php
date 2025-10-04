<?php

namespace App\Http\Controllers;

use App\Models\AuthorInformation;
use Illuminate\Http\Request;

class AuthorInformationController extends Controller
{
    // Untuk user (lihat informasi author)
    public function index()
    {
        $authorInfo = AuthorInformation::first();
        return view('author', compact('authorInfo'));
    }

    // Untuk admin (tampilan form edit)
    public function adminIndex()
    {
        $authorInfo = AuthorInformation::first();
        return view('admin.authorinformationAdmin', compact('authorInfo'));
    }

    // Untuk admin (simpan data)
    public function update(Request $request)
    {
        $validated = $request->validate([
            'title' => 'nullable|string|max:255',
            'cta_text' => 'nullable|string|max:255',
            'cta_button' => 'nullable|string|max:255',
            'cta_link' => 'nullable|string|max:255',
            'intro_paragraph' => 'nullable|string',
            'submission_link' => 'nullable|string',
            'selection_process' => 'nullable|string',
            'preparation_of_contributions' => 'nullable|string',
            'non_presented_policy' => 'nullable|string',
        ]);

        AuthorInformation::updateOrCreate(
            ['id' => 1], // pastikan hanya ada 1 data
            $validated
        );

        return redirect()->route('admin.authorinformationAdmin.tambah')->with('success', 'Author Information saved successfully!');
    }
}
