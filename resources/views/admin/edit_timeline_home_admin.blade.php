@extends('layouts.admin')

@section('title', 'Edit Timeline Home')

@section('content')

<main class="flex-1 px-6 py-10 flex justify-center">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">
            {{ isset($isDetail) && $isDetail ? 'Timeline Details' : 'Edit Timeline' }}
        </h2>

        <form
            action="{{ isset($isDetail) && $isDetail ? '#' : route('admin.update_timeline_home_admin', $timeline->id) }}"
            method="POST" class="space-y-5">
            @csrf
            @if(!isset($isDetail) || !$isDetail)
            @method('PUT')
            @endif

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Round Number</label>
                <input type="number" name="round_number" value="{{ $timeline->round_number }}"
                    class="w-full border rounded-md px-3 py-2 focus:outline-none bg-gray-200 cursor-not-allowed"
                    readonly>
            </div>


            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Title</label>
                <input type="text" name="title" value="{{ $timeline->title }}"
                    class="w-full border rounded-md px-3 py-2 focus:outline-none" @if(isset($isDetail) && $isDetail)
                    readonly @endif>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Date</label>
                <input type="date" name="date" value="{{ \Carbon\Carbon::parse($timeline->date)->format('Y-m-d') }}"
                    class="w-full border rounded-md px-3 py-2 focus:outline-none" @if(isset($isDetail) && $isDetail)
                    readonly @endif>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                @if(isset($isDetail) && $isDetail)
                <a href="{{ route('admin.list_home_contents_admin') }}"
                    class="btn-back px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Back
                </a>
                @else
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