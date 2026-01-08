@extends('layouts.admin')

@section('title', 'Add Author Information')

@section('content')

<style>
    option:disabled {
        background-color: #e5e7eb;
        color: #6b7280;
        cursor: not-allowed;
        font-style: normal;
    }
</style>

<main class="flex-1 px-6 py-10 flex justify-center">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">Add Author Information</h2>

        <form action="{{ route('admin.forauthor.store_authorinformation_admin') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Section -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Section</label>
                <select name="section"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" required>
                    <option value="">-- Choose Section --</option>

                    <option value="cta_text" @if(in_array('cta_text', $existingSections)) disabled @endif>cta_text</option>
                    <option value="cta_button" @if(in_array('cta_button', $existingSections)) disabled @endif>cta_button</option>
                    <option value="cta_link" @if(in_array('cta_link', $existingSections)) disabled @endif>cta_link</option>
                    <option value="intro_paragraph" @if(in_array('intro_paragraph', $existingSections)) disabled @endif>intro_paragraph</option>
                    <option value="submission_link" @if(in_array('submission_link', $existingSections)) disabled @endif>submission_link</option>
                    <option value="selection_process" @if(in_array('selection_process', $existingSections)) disabled @endif>selection_process</option>
                    <option value="preparation_of_contributions" @if(in_array('preparation_of_contributions', $existingSections)) disabled @endif>preparation_of_contributions</option>
                    <option value="non_presented_policy" @if(in_array('non_presented_policy', $existingSections)) disabled @endif>non_presented_policy</option>

                </select>
                @error('section')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Content</label>
                <textarea name="content" rows="6"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                    placeholder="Write the author information content here..." required>{{ old('content') }}</textarea>
                @error('content')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="window.history.back()"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit"
                    class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                    Save
                </button>
            </div>

        </form>
    </div>
</main>

@endsection
