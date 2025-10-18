<?php

namespace App\Http\Controllers;

use App\Models\AuthorInformation;
use Illuminate\Http\Request;

class AuthorInformationController extends Controller
{
    public function index()
    {
        $authorInfos = AuthorInformation::with('event')
            ->get()
            ->groupBy('section');

        return view('author', compact('authorInfos'));
    }

    public function listAuthor()
    {
        $authorInfos = AuthorInformation::all();
        return view('admin.forauthor.list_authorinformation_admin', compact('authorInfos'));
    }

    public function addAuthor()
    {
        return view('admin.forauthor.add_authorinformation_admin');
    }

    public function store(Request $request)
    {
        $request->validate([
            'section' => 'required|string',
            'content' => 'required|string',
        ]);

        AuthorInformation::create($request->only('section', 'content'));

        return redirect()->route('admin.forauthor.list_authorinformation_admin')->with('success', 'Content added successfully!');
    }

    public function edit($id)
    {
        $authorInfo = AuthorInformation::findOrFail($id);
        return view('admin.forauthor.edit_authorinformation_admin', compact('authorInfo'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $authorInfo = AuthorInformation::findOrFail($id);
        $authorInfo->update($request->only('content'));

        return redirect()->route('admin.forauthor.list_authorinformation_admin')->with('success', 'Content updated successfully!');
    }

    public function show($id)
    {
        $authorInfo = AuthorInformation::findOrFail($id);
        return view('admin.forauthor.detail_authorinformation_admin', compact('authorInfo'))->with('isDetail', true);
    }

    public function destroy(AuthorInformation $authorInfo)
    {
        $authorInfo->delete();
        return redirect()->route('admin.forauthor.list_authorinformation_admin')->with('success', 'Content deleted successfully!');
    }
}
