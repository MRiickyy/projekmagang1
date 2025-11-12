@extends('layouts.admin')

@section('title', 'Detail Header')

@section('content')

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Detail Header ({{ $event->year }})</h2>

        <div class="space-y-5">

            <!-- Event Name -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Event Name</label>
                <input type="text" value="{{ $event->name ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Year -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Year</label>
                <input type="text" value="{{ $event->year ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Main Title -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Main Title</label>
                <input type="text" value="{{ $event->main_title ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Subtitle -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Subtitle</label>
                <input type="text" value="{{ $event->subtitle ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Location -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Location</label>
                <input type="text" value="{{ $event->location ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Date Range -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Date Range</label>
                <input type="text" value="{{ $event->date_range ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Event Time -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Event Time</label>
                <input type="text" value="{{ $event->event_time ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Register Link -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Register Link</label>
                <input type="text" value="{{ $event->register_link ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Submit Link -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Submit Link</label>
                <input type="text" value="{{ $event->submit_link ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Back Button -->
            <div class="flex justify-end pt-4">
                <a href="{{ route('admin.header.list_header') }}"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Back
                </a>
            </div>

        </div>
    </div>
</main>
@endsection
