@extends('layouts.admin')

@section('title', 'Add Registration Fee')

@section('content')

<main class="flex-1 px-6 py-10 flex justify-center">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">Add Registration Fee</h2>

        <form action="{{ route('admin.forauthor.store_registrationsfee_admin') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Category -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Category</label>
                <input type="text" name="category" value="{{ old('category') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                    placeholder="e.g. IEEE Member" required>
                @error('category')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- USD (Physical) -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">USD (Physical)</label>
                <input type="number" name="usd_physical" value="{{ old('usd_physical') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                    placeholder="e.g. 400" required>
                @error('usd_physical')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- IDR (Physical) -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">IDR (Physical)</label>
                <input type="number" name="idr_physical" value="{{ old('idr_physical') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                    placeholder="e.g. 4700000" required>
                @error('idr_physical')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- USD (Online) -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">USD (Online)</label>
                <input type="number" name="usd_online" value="{{ old('usd_online') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                    placeholder="e.g. 300" required>
                @error('usd_online')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- IDR (Online) -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">IDR (Online)</label>
                <input type="number" name="idr_online" value="{{ old('idr_online') }}"
                    class="w-full border border-gray-400 bg-gray-100 rounded-md px-3 py-2 focus:outline-none"
                    placeholder="e.g. 4000000" required>
                @error('idr_online')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <button type="button" onclick="window.history.back()"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Cancel
                </button>
                <button type="submit"
                    class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                    Save
                </button>
            </div>
        </form>
    </div>
</main>

@endsection
