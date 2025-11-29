@extends('layouts.admin')

@section('title', 'Add Call For Papers')

@section('content')

<!-- Main Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Call for Papers</h2>

        <!-- Form -->
        <form action="{{ route('admin.store_callpaper_Admin') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Section -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="section">Section</label>
                <select id="section" name="section"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" required>
                    <option value="" disabled selected>Choose Section</option>

                    <!-- Call for Papers (always enabled, multi allowed) -->
                    <option value="call_for_papers">call_for_papers</option>

                    <!-- Intro Call (single) -->
                    <option value="intro_call"
                        @isset($existingSections) @disabled(in_array('intro_call', $existingSections)) @endisset>
                        intro_call
                    </option>

                    <!-- Submission (title / intro / guidelines) -->
                    <option value="submission_title"
                        @isset($existingSections) @disabled(in_array('submission_title', $existingSections)) @endisset>
                        submission_title
                    </option>

                    <option value="submission_intro"
                        @isset($existingSections) @disabled(in_array('submission_intro', $existingSections)) @endisset>
                        submission_intro
                    </option>

                    <option value="submission_guidelines"
                        @isset($existingSections) @disabled(in_array('submission_guidelines', $existingSections)) @endisset>
                        submission_guidelines
                    </option>

                    <!-- Important dates (can have multiple entries in seeder, but you may want single) -->
                    <option value="important_dates"
                        @isset($existingSections) @disabled(in_array('important_dates', $existingSections)) @endisset>
                        important_dates
                    </option>

                    <!-- Join section -->
                    <option value="join_section"
                        @isset($existingSections) @disabled(in_array('join_section', $existingSections)) @endisset>
                        join_section
                    </option>
                </select>
            </div>

            <!-- Title -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="title">Title</label>
                <input type="text" id="title" name="title" placeholder="Enter title (optional)"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="content">Content</label>
                <textarea id="content" name="content" rows="5" placeholder="Enter content here..."
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" required></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.list_callpaper_Admin') }}"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700 transition">
                    Cancel
                </a>
                <button type="submit"
                    class="px-7 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md hover:scale-[1.02] transition-transform">
                    Save
                </button>
            </div>

        </form>
    </div>
</main>

<!-- Placeholder Switcher -->
<script>
const sectionSelect = document.getElementById('section');
const contentTextarea = document.getElementById('content');

sectionSelect.addEventListener('change', function () {
    if (this.value === 'call_for_papers') {
        contentTextarea.placeholder =
            'e.g : ["Big Data Analytics","Statistical Methods","Text Mining","Recommender Systems","Business Intelligence","Computational Statistics"]';
    } else if (this.value === 'important_dates') {
        contentTextarea.placeholder = 'e.g : January 15, 2025';
    } else if (this.value === 'submission_guidelines') {
        contentTextarea.placeholder = 'Paste guidelines text here or line breaks';
    } else {
        contentTextarea.placeholder = 'Enter content here...';
    }
});
</script>

<style>
    option:disabled {
        background-color: #e2e8f0;
        color: #94a3b8;
        font-style: normal;
    }
</style>

@endsection
