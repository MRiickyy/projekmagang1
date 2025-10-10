@extends('layouts.admin')

@section('title', 'Edit Author Information')

@section('content')

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Edit Author Information</h2>

        <form action="{{ route('admin.forauthor.update_authorinformation_admin', $authorInfo->id) }}" method="POST"
            enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Section -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="section">Section</label>
                <input type="text" name="section" id="section"
                    value="{{ old('section', $authorInfo->section ?? '') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" readonly />
                <p class="text-xs text-slate-500 mt-1">Section tidak dapat diubah.</p>
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="content">Content</label>
                <textarea name="content" id="content" rows="8"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">{{ old('content', $authorInfo->content ?? '') }}</textarea>
                @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="window.history.back()"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit"
                    class="px-7 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md hover:opacity-90">
                    Save
                </button>
            </div>
        </form>
    </div>
</main>
@endsection
