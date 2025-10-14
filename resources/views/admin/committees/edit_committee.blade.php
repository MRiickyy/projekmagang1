@extends('layouts.admin')

@section('title', 'Edit Committee')

@section('content')
<div class="w-full max-w-3xl bg-[#F2F6F9] mx-auto rounded-lg shadow-xl p-6 text-slate-800">

    <!-- Title + Back Button -->
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-lg font-bold text-slate-900">Edit Committee</h2>
    </div>

    <form action="{{ route('update.committees', $committee->id) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        @method('PUT')

        <!-- Name -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Full Name</label>
            <input type="text" name="name" value="{{ old('name', $committee->name) }}"
                   class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm 
                          focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Role -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Role</label>
            <input type="text" name="role" value="{{ old('role', $committee->role) }}"
                   class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm 
                          focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- University -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">University</label>
            <input type="text" name="university" value="{{ old('university', $committee->university) }}"
                   class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm 
                          focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Country -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Country</label>
            <input type="text" name="country" value="{{ old('country', $committee->country) }}"
                   class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm 
                          focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Type -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-2">Committee Type</label>
            <div class="flex gap-4 text-sm">
                <label class="flex items-center gap-2">
                    <input type="radio" name="type" value="steering" class="focus:ring-0"
                           {{ old('type', $committee->type) == 'steering' ? 'checked' : '' }}>
                    Steering Committee
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="type" value="technical program" class="focus:ring-0"
                           {{ old('type', $committee->type) == 'technical program' ? 'checked' : '' }}>
                    Technical Program Committee
                </label>
                <label class="flex items-center gap-2">
                    <input type="radio" name="type" value="organizing" class="focus:ring-0"
                           {{ old('type', $committee->type) == 'organizing' ? 'checked' : '' }}>
                    Organizing Committee
                </label>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex justify-end gap-3 pt-6">
            <button type="reset"
                    class="px-6 py-2 text-sm rounded-md bg-gray-600 text-white hover:bg-gray-700 transition">
                Cancel
            </button>
            <button type="submit"
                    class="px-6 py-2 text-sm rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] 
                           text-black font-semibold shadow-md hover:opacity-90 transition">
                Save
            </button>
        </div>
    </form>
</div>
@endsection
