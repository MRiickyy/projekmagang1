@extends('layouts.admin')

@section('title', 'Add Header')

@section('content')
<div class="w-full max-w-3xl bg-[#F2F6F9] mx-auto rounded-lg shadow-xl p-6 text-slate-800">

    <!-- Title -->
    <h2 class="text-lg font-bold text-slate-900 mb-6">Add Header</h2>

    <form action="{{ route('admin.header.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
        @csrf
        <!-- Main Title -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Title</label>
            <input type="text" name="main_title"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Subtitle -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Subtitle</label>
            <input type="text" name="subtitle"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Location -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Location</label>
            <input type="text" name="location"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Date Range -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Date Range</label>
            <input type="text" 
                name="date_range"
                placeholder="Example: 01-02 month year"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Event Time -->
        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Event Time</label>
            <input type="text" 
                name="event_time"
                placeholder="Example: 09:00"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Register Link -->

        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Register Link</label>
            <input type="text" name="register_link"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
        </div>

        <!-- Submit Link -->

        <div>
            <label class="block text-sm font-semibold text-slate-900 mb-1">Submit Link</label>
            <input type="text" name="submit_link"
                class="w-full border border-gray-300 bg-gray-100 rounded-md px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-blue-400">
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