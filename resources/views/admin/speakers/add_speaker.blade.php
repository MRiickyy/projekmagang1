@extends('layouts.admin')

@section('title', 'Add Speakers')

@section('content')
<div class="w-full max-w-3xl bg-[#F2F6F9] mx-auto rounded-lg shadow-xl p-6 text-slate-800">

    <!-- Title -->
    <h2 class="text-lg font-bold text-slate-900 mb-6">Speaker Information</h2>

    <form action="{{ route('add.speakers') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Full Name</label>
            <input type="text" name="name"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Slug -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Slug</label>
            <input type="text" name="slug"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- University -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">University</label>
            <input type="text" name="university"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Upload Image -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Profile Image</label>
            <input type="file" name="image"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm">
            <p class="text-xs text-slate-600 mt-1">Supported formats: JPG, PNG, GIF, WEBP (Max. 5MB)</p>
        </div>

        <!-- Speaker Type -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-2">Speaker Type</label>
            <select name="speaker_type" id="methodSelect"
                class="w-full text-sm border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" required>
                <option value="">-- Choose Speaker Type --</option>
                <option value="tutorial" {{ old('speaker_type') == 'tutorial' ? 'selected' : '' }}>Tutorial Speaker</option>
                <option value="keynote" {{ old('speaker_type') == 'keynote' ? 'selected' : '' }}>Keynote Speaker</option>
            </select>
        </div>

        <!-- Biodata -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Biodata</label>
            <textarea name="biodata" rows="4"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
        </div>

        <!-- Dynamic Descriptions -->
        <h2 class="text-lg font-bold text-slate-900 mb-3">Speaker Descriptions</h2>

        <div id="descriptionContainer" class="space-y-4"></div>

        <!-- Add Description -->
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
            <button type="reset"
                class="px-6 py-2 text-sm rounded-md bg-gray-600 text-white hover:bg-gray-700 transition">
                Cancel
            </button>
            <button type="submit"
                class="px-6 py-2 text-sm rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md hover:opacity-90 transition">
                Save
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById("addDescription").addEventListener("click", function () {
        const container = document.getElementById("descriptionContainer");

        const wrapper = document.createElement("div");
        wrapper.classList.add("p-4", "border", "border-gray-300", "rounded-lg", "bg-white", "space-y-3");

        wrapper.innerHTML = `
            <div>
                <label class="block text-sm font-semibold text-slate-900 mb-1">Title</label>
                <input type="text" name="descriptions[title][]" 
                    class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
            </div>
            <div>
                <label class="block text-sm font-semibold text-slate-900 mb-1">Content</label>
                <textarea name="descriptions[content][]" rows="3" 
                    class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400"></textarea>
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
</script>
@endsection
