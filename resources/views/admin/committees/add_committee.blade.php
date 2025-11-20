@extends('layouts.admin')

@section('title', 'Add Committee')

@section('content')
<div class="w-full max-w-3xl bg-[#F2F6F9] mx-auto rounded-lg shadow-xl p-6 text-slate-800">

    <!-- Title -->
    <h2 class="text-lg font-bold text-slate-900 mb-6">Committee Information</h2>

    <form action="{{ route('add.committees') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf

        <!-- Name -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Full Name</label>
            <input type="text" name="name"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Role -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Role</label>
            <input type="text" name="role"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- University -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">University</label>
            <input type="text" name="university"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Country -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Country</label>
            <input type="text" name="country"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Committee Type -->

        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-2">Committee Type</label>
            <select name="type" id="methodSelect"
                class="w-full text-sm border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" required>
                <option value="">-- Choose Committee Type --</option>
                <option value="steering" {{ old('type') == 'steering' ? 'selected' : '' }}>Steering Committee</option>
                <option value="technical program" {{ old('type') == 'technical program' ? 'selected' : '' }}>Technical Program Committee</option>
                <option value="organizing" {{ old('type') == 'organizing' ? 'selected' : '' }}>Organizing Committee</option>
            </select>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end gap-3 pt-6">
            <button type="button"
                onclick="history.back()"
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
@endsection