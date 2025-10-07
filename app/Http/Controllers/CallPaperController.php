<?php

namespace App\Http\Controllers;

use App\Models\CallPaper;
use Illuminate\Http\Request;

class CallPaperController extends Controller
{
    
    public function index()
    {
        $callPapers = CallPaper::all();
        return view('callpaper', compact('callPapers'));
    }

    
    public function listCallPaper()
    {
        $callPapers = CallPaper::orderBy('section')->orderBy('id')->get();
        return view('admin.list_callpaper_Admin', compact('callPapers'));
    }

    public function addCallPaper()
    {
        return view('admin.add_callpaper_Admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        CallPaper::create([
            'section' => $request->section,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.list_callpaper_Admin')->with('success', 'Data added successfully!');
    }

    public function edit(CallPaper $callPaper)
    {
        return view('admin.edit_callpaper_Admin', compact('callPaper'))->with('isDetail', false);
    }


    public function update(Request $request, CallPaper $callPaper)
    {
        $request->validate([
            'section' => 'required|string|max:255',
            'title' => 'nullable|string|max:255',
            'content' => 'required|string',
        ]);

        $callPaper->update([
            'section' => $request->section,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('admin.list_callpaper_Admin')->with('success', 'Data updated successfully!');
    }

    public function destroy(CallPaper $callPaper)
    {
        $callPaper->delete();
        return redirect()->route('admin.list_callpaper_Admin')->with('success', 'Data deleted successfully!');
    }

    public function show(CallPaper $callPaper)
    {
        // kirim flag 'isDetail' ke view untuk membedakan mode
        return view('admin.edit_callpaper_Admin', compact('callPaper'))->with('isDetail', true);
    }

}