@extends('layouts.admin')

@section('title', 'Add Home')

@section('content')

<main class="flex-1 px-6 py-10 flex justify-center">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">Content Information</h2>

        <form action="{{ route('admin.store_home_contents_admin') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            {{-- SECTION --}}
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Section</label>
                <select id="sectionSelect" name="section"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" required>

                    <option value="">-- Choose Section --</option>

                    <!-- Semua pilihan section (TEXT) -->
                    <option value="banner_image" data-type="image"> banner image</option>
                    <option value="banner_logo" data-type="image"> banner logo</option>
                    <option value="banner_text" data-type="text">banner text</option>
                    <option value="intro_home" data-type="text">intro home</option>
                    <option value="prev_conf_title" data-type="text">prev conf title</option>

                    <option value="previous_conference" data-type="text">previous conference</option>
                    <option value="scope_title" data-type="text">scope title</option>
                    <option value="scope_intro" data-type="text">scope intro</option>
                    <option value="scope_list" data-type="text">scope list</option>
                    <option value="publications_title" data-type="text">publications title</option>
                    <option value="publications_intro" data-type="text">publications intro</option>
                    <option value="publications_list" data-type="text">publications list</option>

                    <option value="editors_title" data-type="text">editors title</option>
                    <option value="editors" data-type="text">editors</option>
                </select>
            </div>

            {{-- TEXT CONTENT --}}
            <div id="textContentWrapper" class="hidden">
                <label class="block text-sm font-bold text-slate-900 mb-1">Content (Text)</label>
                <textarea name="content" rows="4"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                    placeholder="Fill this for text-based sections"></textarea>
            </div>

            {{-- FILE UPLOAD --}}
            <div id="fileUploadWrapper" class="hidden">
                <label class="block text-sm font-bold text-slate-900 mb-1">Upload Image (Optional)</label>
                <input type="file" name="content_file"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
            </div>

            {{-- BUTTONS --}}
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.list_home_contents_admin') }}"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                    Save
                </button>
            </div>
        </form>
    </div>
</main>

<script>
const sectionSelect = document.getElementById('sectionSelect');
const textContentWrapper = document.getElementById('textContentWrapper');
const fileUploadWrapper = document.getElementById('fileUploadWrapper');

sectionSelect.addEventListener('change', function() {
    const type = this.options[this.selectedIndex].dataset.type;

    if (type === 'text') {
        textContentWrapper.classList.remove('hidden');
        fileUploadWrapper.classList.add('hidden');
    } else if (type === 'image') {
        fileUploadWrapper.classList.remove('hidden');
        textContentWrapper.classList.add('hidden');
    } else {
        textContentWrapper.classList.add('hidden');
        fileUploadWrapper.classList.add('hidden');
    }
});
</script>

@endsection
