@extends('layouts.admin')

@section('title', 'Add Home')

@section('content')

<main class="flex-1 px-6 py-10 flex justify-center">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">Content Information</h2>

        <form action="{{ route('admin.store_home_contents_admin') }}" method="POST" enctype="multipart/form-data"
            class="space-y-5">
            @csrf

            {{-- SECTION --}}
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Section</label>
                <select id="sectionSelect" name="section"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" required>
                    <option value="">-- Choose Section --</option>

                    <div>
                        <label class="block text-sm font-bold text-slate-900 mb-2">Section</label>
                        <select name="section"
                            class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                            <option value="">-- Choose Section --</option>
                            <option value="hero_title">hero_title</option>
                            <option value="hero_year">hero_year</option>
                            <option value="hero_location_date">hero_location_date</option>
                            <option value="hero_subtitle">hero_subtitle</option>
                            <option value="banner_text">banner_text</option>
                            <option value="welcome_title">welcome_title</option>
                            <option value="welcome_text">welcome_text</option>
                            <option value="welcome_tracks_intro">welcome_tracks_intro</option>
                            <option value="welcome_tracks">welcome_tracks</option>
                            <option value="welcome_tracks_footer">welcome_tracks_footer</option>
                            <option value="welcome_prev_title">welcome_prev_title</option>
                            <option value="welcome_isbn_title">welcome_isbn_title</option>
                            <option value="speakers_keynote_title">speakers_keynote_title</option>
                            <option value="speakers_keynote_text">speakers_keynote_text</option>
                            <option value="speakers_tutorial_title">speakers_tutorial_title</option>
                            <option value="speakers_tutorial_text">speakers_tutorial_text</option>
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
                            class="btn-cancel px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
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