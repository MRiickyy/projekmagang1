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
                <label class="block text-sm font-bold text-slate-900 mb-1" for="usd_physical">USD (Physical)</label>
                <input type="number" name="usd_physical" id="usd_physical"
                    value="{{ old('usd_physical', $fee->usd_physical ?? '') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                @error('usd_physical')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- IDR (Physical) -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="idr_physical">IDR (Physical)</label>
                <input type="number" name="idr_physical" id="idr_physical"
                    value="{{ old('idr_physical', $fee->idr_physical ?? '') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                @error('idr_physical')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- USD (Online) -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="usd_online">USD (Online)</label>
                <input type="number" name="usd_online" id="usd_online"
                    value="{{ old('usd_online', $fee->usd_online ?? '') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                @error('usd_online')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- IDR (Online) -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="idr_online">IDR (Online)</label>
                <input type="number" name="idr_online" id="idr_online"
                    value="{{ old('idr_online', $fee->idr_online ?? '') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none">
                @error('idr_online')
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
