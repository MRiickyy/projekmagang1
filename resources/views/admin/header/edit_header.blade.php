@extends('layouts.admin')

@section('title', 'Edit Header')

@section('content')

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Edit Header ({{ $event->year }})</h2>

        <form action="{{ route('admin.header.update', $event->id) }}" method="POST"
            enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <!-- Event Name -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="name">Event Name</label>
                <input type="text" name="name" id="name"
                    value="{{ old('name', $event->name ?? '') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" readonly />
                <p class="text-xs text-slate-500 mt-1">Event Name tidak dapat diubah.</p>
            </div>

            <!-- Year -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="year">Year</label>
                <input type="text" name="year" id="year"
                    value="{{ old('year', $event->year ?? '') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" readonly />
                <p class="text-xs text-slate-500 mt-1">Tahun event tidak dapat diubah.</p>
            </div>

            <!-- Main Title -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="main_title">Main Title</label>
                <input type="text" name="main_title" id="main_title"
                    value="{{ old('main_title', $event->main_title ?? '') }}"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none bg-white" />
                @error('main_title')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="subtitle">Subtitle</label>
                <input type="text" name="subtitle" id="subtitle"
                    value="{{ old('subtitle', $event->subtitle ?? '') }}"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none bg-white" />
                @error('subtitle')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Location -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="location">Location</label>
                <input type="text" name="location" id="location"
                    value="{{ old('location', $event->location ?? '') }}"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none bg-white" />
                @error('location')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Date Range -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="date_range">Date Range</label>
                <input type="text" name="date_range" id="date_range"
                    value="{{ old('date_range', $event->date_range ?? '') }}"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none bg-white" />
                @error('date_range')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Register Link -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="register_link">Register Link</label>
                <input type="text" name="register_link" id="register_link"
                    value="{{ old('register_link', $event->register_link ?? '') }}"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none bg-white" />
                @error('register_link')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Submit Link -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="submit_link">Submit Link</label>
                <input type="text" name="submit_link" id="submit_link"
                    value="{{ old('submit_link', $event->submit_link ?? '') }}"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none bg-white" />
                @error('submit_link')
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
