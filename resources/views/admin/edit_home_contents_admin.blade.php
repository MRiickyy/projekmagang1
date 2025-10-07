@extends('layouts.admin')

@section('title', 'Edit Home')

@section('content')

<main class="flex-1 px-6 py-10 flex justify-center">
    <div class="w-full max-w-8xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">Edit Home Information</h2>

        <form action="{{ route('admin.update_home_contents_admin', $homeContent->id) }}" method="POST"
            class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Section</label>
                <input type="text" name="section" value="{{ $homeContent->section }}" readonly
                    class="w-full border border-gray-400 bg-gray-200 text-gray-700 rounded-md px-3 py-2 focus:outline-none cursor-not-allowed">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Content</label>
                <textarea name="content" rows="4"
                    class="w-full border border-gray-400 bg-white rounded-md px-3 py-2 focus:outline-none">{{ old('content', $homeContent->content) }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                @if(isset($isDetail) && $isDetail)
                <!-- Mode DETAIL -->
                <a href="{{ route('admin.list_home_contents_admin') }}"
                    class="btn-back px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Back
                </a>
                @else
                <!-- Mode EDIT -->
                <a href="{{ route('admin.list_home_contents_admin') }}"
                    class="btn-cancel px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Cancel
                </a>
                <button type="submit"
                    class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md hover:scale-[1.02] transition-transform">
                    Update
                </button>
                @endif
            </div>

        </form>
    </div>
</main>
@endsection