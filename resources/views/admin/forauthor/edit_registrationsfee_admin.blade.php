@extends('layouts.admin')

@section('title', 'Edit Registration Fee')

@section('content')

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Edit Registration Fee</h2>

        <form action="{{ route('admin.forauthor.update_registrationsfee_admin', $fee->id) }}" method="POST"
            enctype="multipart/form-data" class="space-y-5">
            @csrf

            <!-- Category -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="category">Category</label>
                <input type="text" name="category" id="category"
                    value="{{ old('category', $fee->category ?? '') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none" readonly />
                <p class="text-xs text-slate-500 mt-1">Category tidak dapat diubah.</p>
            </div>

            <!-- USD (Physical) -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="usd_physical">Early Bird (USD)</label>
                <input type="number" name="usd_early_bird" id="usd_early_bird"
                    value="{{ old('usd_early_bird', $fee->usd_early_bird ?? '') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                @error('usd_early_bird')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- USD (Online) -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="usd_reguler">Reguler (USD)</label>
                <input type="number" name="usd_reguler" id="usd_reguler"
                    value="{{ old('usd_reguler', $fee->usd_reguler ?? '') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                @error('usd_reguler')
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
