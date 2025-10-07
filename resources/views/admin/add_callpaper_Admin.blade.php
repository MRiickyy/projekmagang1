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
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                    <option value="" disabled selected>Choose Section</option>
                    <option value="call_for_papers">call_for_papers</option>
                    <option value="submission_guidelines">submission_guidelines
                    </option>
                    <option value="important_dates">important_dates</option>
                    <option value="join_section">join_section</option>
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
                <textarea id="content" name="content" rows="5" placeholder='Enter content here...'
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"></textarea>
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.list_callpaper_Admin') }}"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Cancel
                </a>
                <button type="submit"
                    class="px-7 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                    Save
                </button>
            </div>
        </form>
    </div>
</main>

<script>
const sectionSelect = document.getElementById('section');
const contentTextarea = document.getElementById('content');

sectionSelect.addEventListener('change', function() {
    if (this.value === 'call_for_papers') {
        contentTextarea.placeholder =
            'e.g : ["Big Data Analytics","Statistical Methods","Text Mining","Recommender Systems","Business Intelligence","Computational Statistics"]';
    } else if (this.value === 'important_dates') {
        contentTextarea.placeholder = 'e.g :  January 15, 2025';
    } else {
        contentTextarea.placeholder = 'Enter content here...';
    }
});
</script>
@endsection