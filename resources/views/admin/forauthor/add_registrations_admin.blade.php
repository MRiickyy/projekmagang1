@extends('layouts.admin')

@section('title', 'Add Registration Information')

@section('content')

<main class="flex-1 px-6 py-10 flex justify-center">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">Add Registration Information</h2>

        <form action="{{ route('admin.forauthor.store_registrations_admin') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Section -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Section</label>
                <select name="section"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" required>
                    <option value="">-- Choose Section --</option>
                    <option value="cta_title">cta_title</option>
                    <option value="cta_button">cta_button</option>
                    <option value="cta_link">cta_link</option>
                    <option value="notes">notes</option>
                    <option value="conference_fee_include">conference_fee_include</option>
                    <option value="registration_procedures">registration_procedures</option>
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
                    placeholder="Write the registration information content here..." required>{{ old('content') }}</textarea>
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
