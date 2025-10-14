@extends('layouts.admin')

@section('title', 'Edit Speaker')

@section('content')
<div class="w-full max-w-3xl bg-[#F2F6F9] mx-auto rounded-lg shadow-xl p-6 text-slate-800">

    <form action="{{ route('update.speakers', $speaker->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Full Name</label>
            <input type="text" name="name" value="{{ old('name', $speaker->name) }}"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Slug -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Slug</label>
            <input type="text" name="slug" value="{{ old('slug', $speaker->slug) }}"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- University -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">University</label>
            <input type="text" name="university" value="{{ old('university', $speaker->university) }}"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Upload Image -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Profile Image</label>
            @if($speaker->image)
            <img src="{{ asset('images/speakers/' . $speaker->image) }}" alt="{{ $speaker->name }}" class="w-32 h-32 object-cover rounded-lg mb-2">
            @endif
            <input type="file" name="image"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm">
            <p class="text-xs text-slate-600 mt-1">Supported formats: JPG, PNG, GIF, WEBP (Max. 5MB)</p>
        </div>

        <!-- Speaker Type -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-2">Speaker Type</label>
            <label class="flex items-center gap-2 text-sm">
                <input type="radio" name="speaker_type" value="keynote" class="focus:ring-0"
                    {{ old('speaker_type', $speaker->speaker_type) == 'keynote' ? 'checked' : '' }}>
                Keynote Speaker
            </label>
            <label class="flex items-center gap-2 text-sm">
                <input type="radio" name="speaker_type" value="tutorial" class="focus:ring-0"
                    {{ old('speaker_type', $speaker->speaker_type) == 'tutorial' ? 'checked' : '' }}>
                Tutorial Speaker
            </label>
        </div>

        <!-- Biodata -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Biodata</label>
            <textarea name="biodata" rows="4"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">{{ old('biodata', $speaker->biodata) }}</textarea>
        </div>

        <!-- Dynamic Descriptions -->
        <h2 class="text-lg font-bold text-slate-900 mb-3">Speaker Descriptions</h2>
        <div id="descriptionContainer" class="space-y-4">
            @if($speaker->descriptions && $speaker->descriptions->count() > 0)
            @foreach($speaker->descriptions as $desc)
            <div class="p-4 border border-gray-300 rounded-lg bg-white space-y-3">
                <!-- Hidden ID -->
                <input type="hidden" name="descriptions[id][]" value="{{ $desc->id }}">

                <div>
                    <label class="block text-sm font-semibold text-slate-900 mb-1">Title</label>
                    <input type="text" name="descriptions[title][]" value="{{ $desc->title }}"
                        class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-900 mb-1">Content</label>
                    <textarea name="descriptions[content][]" rows="3"
                        class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">{{ $desc->content }}</textarea>
                </div>
                <button type="button" class="removeDesc px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600 transition">
                    Remove
                </button>
            </div>
            @endforeach
            @endif
        </div>

        <!-- Add Description Button -->
        <button type="button" id="addDescription"
            class="flex items-center gap-2 px-4 py-2 text-sm bg-gradient-to-r from-blue-500 to-blue-600 text-white rounded-md shadow hover:from-blue-600 hover:to-blue-700 transition">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke-width="2" stroke="currentColor" class="w-4 h-4">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            Add Description
        </button>

        <!-- Action Buttons -->
        <div class="flex justify-end gap-3 pt-6">
            <button type="button" onclick="window.history.back()" class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                Cancel
            </button>
            <button type="submit"
                class="px-7 py-2 text-sm rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md hover:opacity-90 transition">
                Save
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById("addDescription").addEventListener("click", function() {
        const container = document.getElementById("descriptionContainer");

        const wrapper = document.createElement("div");
        wrapper.classList.add("p-4", "border", "border-gray-300", "rounded-lg", "bg-white", "space-y-3");

        wrapper.innerHTML = `
        <!-- No ID hidden input for new description -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Title</label>
            <input type="text" name="descriptions[title][]" 
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Content</label>
            <textarea name="descriptions[content][]" rows="3" 
                class="w-full border border-gray-300 bg-gray-100 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>
        <button type="button" class="removeDesc px-3 py-1 text-sm bg-red-500 text-white rounded hover:bg-red-600 transition">
            Remove
        </button>
    `;

        container.appendChild(wrapper);

        // Remove description
        wrapper.querySelector(".removeDesc").addEventListener("click", () => {
            wrapper.remove();
        });
    });

    // Remove button for existing blocks
    document.querySelectorAll(".removeDesc").forEach(button => {
        button.addEventListener("click", function() {
            this.parentElement.remove();
        });
    });
</script>
@endsection