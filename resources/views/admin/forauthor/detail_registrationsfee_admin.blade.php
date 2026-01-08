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
                <label class="block text-sm font-bold text-slate-900 mb-1" for="usd_early_bird">Early Bird (USD)</label>
                <input type="text" id="usd_early_bird" value="{{ $fee->usd_early_bird ?? '' }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- USD Online -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="usd_reguler">Reguler (USD)</label>
                <input type="text" id="usd_reguler" value="{{ $fee->usd_reguler ?? '' }}"
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
