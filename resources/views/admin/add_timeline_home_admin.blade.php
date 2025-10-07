@extends('layouts.admin')

@section('title', 'Add Timeline')

@section('content')

<main class="flex-1 px-6 py-10 flex justify-center">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">Add Timeline</h2>

        <form action="{{ route('admin.store_timeline_home_admin') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Round Number Dropdown -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Round Number</label>
                <select name="round_number"
                    class="w-full border border-gray-400 bg-white rounded-md px-3 py-2 focus:outline-none" required>
                    @for($i = 1; $i <= 10; $i++) <option value="{{ $i }}"
                        {{ old('round_number') == $i ? 'selected' : '' }}>
                        Round {{ $i }}
                        </option>
                        @endfor
                </select>
            </div>

            <!-- Title -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Title</label>
                <input type="text" name="title" value="{{ old('title') }}"
                    class="w-full border border-gray-400 bg-white rounded-md px-3 py-2 focus:outline-none" required>
            </div>

            <!-- Date -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Date</label>
                <input type="date" name="date" value="{{ old('date') }}"
                    class="w-full border border-gray-400 bg-white rounded-md px-3 py-2 focus:outline-none" required>
            </div>

            <!-- Buttons -->
            <div class="flex justify-end gap-3 pt-4">
                <a href="{{ route('admin.list_home_contents_admin') }}"
                    class="btn-cancel px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md hover:scale-[1.02] transition-transform">
                    Save
                </button>
            </div>

        </form>
    </div>
</main>

@endsection