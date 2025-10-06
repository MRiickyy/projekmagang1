<?php

namespace App\Http\Controllers;

use App\Models\AuthorInformation;
use Illuminate\Http\Request;

class AuthorInformationController extends Controller
{
    //====USER====\\
    public function index()
    {
        $authorInfo = AuthorInformation::first();
        return view('author', compact('authorInfo'));
    }

    //===ADMIN====\\
    // admin: displays the author information table
    public function adminIndex()
    {
        $authorInfos = AuthorInformation::all(); // ambil semua data
        return view('admin.forauthor.authorinformationAdmin', compact('authorInfos'));
    }

    // Untuk admin: halaman detail
    public function adminAuthorDetail()
    {
        $authorInfo = AuthorInformation::first();
        return view('admin.forauthor.detail_authorinformationAdmin', compact('authorInfo'));
    }


    // admin: form edit
    public function adminAuthorEdit()
    {
        $authorInfo = AuthorInformation::first();
        return view('admin.forauthor.edit_authorinformationAdmin', compact('authorInfo'));
    }

    // admin: update
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
            ['id' => 1],
            $validated
        );

        return redirect()->route('admin.forauthor.authorinformationAdmin')->with('success', 'Author Information saved successfully!');
    }
}
