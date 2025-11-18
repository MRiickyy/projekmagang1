<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FooterSection;


class FooterSectionController extends Controller
{
    public function footer()
    {
        $sections = \App\Models\FooterSection::all();
        return view('footer', compact('sections'));
    }

    public function listFooter()
    {
        $sections = FooterSection::all();
        return view('admin.footer.list_footer', compact('sections'));
    }

    public function add()
    {
        return view('admin.footer.add_footer');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'subtitle' => 'nullable',
            'items' => 'nullable|array',
            'image' => 'nullable|image',
            'image_alt' => 'nullable|string',
        ]);

        $data = $request->all();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('images'), $filename);
            $data['image'] = $filename;
        }

        if (isset($data['items'])) {
            $data['items'] = json_encode($data['items']);
        }

        FooterSection::create($data);

        return redirect()->route('admin.footer.list')->with('success', 'Footer section added successfully!');
    }

    public function editHostAndPartners($id) {
        $section = FooterSection::findOrFail($id);
        return view('admin.footer.edit_hostAndPartners', compact('section'));
    }
    
    public function editHosted($id) {
        $section = FooterSection::findOrFail($id);
        return view('admin.footer.edit_hosted', compact('section'));
    }
    
    public function editVisitors($id) {
        $section = FooterSection::findOrFail($id);
        return view('admin.footer.edit_visitors', compact('section'));
    }
    

    public function update(Request $request, $id)
    {
        $section = FooterSection::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'items' => 'nullable|array',
        ]);

        $data = [
            'title' => $request->title,
            'subtitle' => $request->subtitle ?? $section->subtitle,
        ];

        // Ambil items lama
        $oldItems = is_array($section->items) ? $section->items : json_decode($section->items, true) ?? [];

        $newItems = [];

        if ($request->has('items')) {
            // Cek jenis section: gambar (host & partners) atau teks/array (hosted/visitors)
            if (isset($oldItems[0]['img'])) {
                // Section gambar (host & partners)
                foreach ($request->items as $index => $item) {
                    $img = $oldItems[$index]['img'] ?? null;
                    $alt = $item['alt'] ?? $oldItems[$index]['alt'] ?? '';

                    // Upload file baru jika ada
                    if (isset($item['img']) && $item['img'] instanceof \Illuminate\Http\UploadedFile) {
                        $file = $item['img'];
                        $filename = time() . '_' . $file->getClientOriginalName();
                        $file->move(public_path('images'), $filename);
                        $img = $filename;
                    } elseif (isset($item['img']) && is_string($item['img'])) {
                        $img = $item['img'];
                    }

                    if ($img) {
                        $newItems[] = [
                            'img' => $img,
                            'alt' => $alt,
                        ];
                    }
                }
            } else {
                // Section teks (hosted) atau visitors (array)
                foreach ($request->items as $item) {
                    if (is_array($item)) {
                        // Visitors section: simpan array langsung
                        $newItems[] = $item;
                    } else {
                        // Hosted section: simpan string
                        $newItems[] = trim($item);
                    }
                }
            }
        } else {
            $newItems = $oldItems; // jika tidak ada items dikirim
        }

        $data['items'] = $newItems;

        $section->update($data);

        return redirect()->route('admin.footer.list')->with('success', 'Footer section updated successfully!');
    }   



    public function destroy($id)
    {
        $section = FooterSection::findOrFail($id);
        $section->delete();

        return redirect()->route('admin.footer.list')->with('success', 'Footer section deleted successfully!');
    }

    public function show($id)
    {
        $section = FooterSection::findOrFail($id);
        return view('admin.footer.detail_footer', compact('section'));
    }
}