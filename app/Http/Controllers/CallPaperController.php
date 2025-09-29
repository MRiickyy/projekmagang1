<?php

namespace App\Http\Controllers;

use App\Models\CallPaper;
use Illuminate\Http\Request;

class CallPaperController extends Controller
{
    // --- FRONTEND ---
    public function index()
    {
        $callPapers = CallPaper::all();
        return view('callpaper', compact('callPapers'));
    }

    // --- ADMIN ---
    public function adminIndex()
    {
        $callPapers = CallPaper::orderBy('section')->orderBy('id')->get();
        return view('admin.call_papers', compact('callPapers'));
    }

    public function create()
    {
        return view('admin.call_papers.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required|string',
            'title' => 'nullable|string',
            'content' => 'required|string'
        ]);

        CallPaper::create([
            'section' => $request->section,
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('admin.call_papers')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(CallPaper $callPaper)
    {
        return view('admin.call_papers.edit', compact('callPaper'));
    }

    public function update(Request $request, CallPaper $callPaper)
    {
        $request->validate([
            'section' => 'required|string',
            'title' => 'nullable|string',
            'content' => 'required|string'
        ]);

        $callPaper->update([
            'section' => $request->section,
            'title' => $request->title,
            'content' => $request->content
        ]);

        return redirect()->route('admin.call_papers')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(CallPaper $callPaper)
    {
        $callPaper->delete();
        return redirect()->route('admin.call_papers')->with('success', 'Data berhasil dihapus.');
    }
}