@extends('layouts.admin')

@section('title', 'Detail Registration Information')

@section('content')

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Detail Registration Information</h2>

        <div class="space-y-5">

            <!-- Section -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="section">Section</label>
                <input type="text" id="section" value="{{ $registration->section ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Content -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="content">Content</label>
                <textarea id="content" rows="8" readonly disabled
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed">{{ $registration->content ?? '' }}</textarea>
            </div>

            <!-- Back Button -->
            <div class="flex justify-end pt-4">
                <a href="{{ route('admin.forauthor.list_registrations_admin') }}"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Back
                </a>
            </div>

        </div>
    </div>
</main>
@endsection
