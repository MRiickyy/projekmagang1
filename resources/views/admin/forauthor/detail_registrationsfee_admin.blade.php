@extends('layouts.admin')

@section('title', 'Detail Registration Fee')

@section('content')

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Detail Registration Fee</h2>

        <div class="space-y-5">

            <!-- Category -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="category">Category</label>
                <input type="text" id="category" value="{{ $fee->category ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- USD Physical -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="usd_physical">USD (Physical)</label>
                <input type="text" id="usd_physical" value="{{ $fee->usd_physical ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- IDR Physical -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="idr_physical">IDR (Physical)</label>
                <input type="text" id="idr_physical" value="{{ $fee->idr_physical ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- USD Online -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="usd_online">USD (Online)</label>
                <input type="text" id="usd_online" value="{{ $fee->usd_online ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- IDR Online -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="idr_online">IDR (Online)</label>
                <input type="text" id="idr_online" value="{{ $fee->idr_online ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
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
