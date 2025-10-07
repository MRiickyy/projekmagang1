@extends('layouts.admin')

@section('title', $isDetail ? 'Call Paper Detail' : 'Edit Call Paper')

@section('content')
<main class="flex-1 px-6 py-10 flex justify-center">
    <div class="w-full max-w-4xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">
        <h2 class="text-lg font-semibold text-slate-900 mb-6">
            {{ $isDetail ? 'Call Paper Detail' : 'Edit Call Paper' }}
        </h2>

        @if(!$isDetail)
        <form action="{{ route('admin.update_callpaper_Admin', $callPaper->id) }}" method="POST" class="space-y-5">
            @csrf
            @method('PUT')
            @endif

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Section</label>
                <input type="text" name="section" value="{{ $callPaper->section }}"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none"
                    {{ $isDetail ? 'readonly' : '' }}>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Title</label>
                <input type="text" name="title" value="{{ $callPaper->title }}"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none"
                    {{ $isDetail ? 'readonly' : '' }}>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Content</label>
                <textarea name="content" rows="6"
                    class="w-full border border-gray-400 rounded-md px-3 py-2 focus:outline-none"
                    {{ $isDetail ? 'readonly' : '' }}>{{ $callPaper->content }}</textarea>
            </div>

            <div class="flex justify-end gap-3 pt-4">
                @if($isDetail)
                <a href="{{ route('admin.list_callpaper_Admin') }}"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">Back</a>
                @else
                <a href="{{ route('admin.list_callpaper_Admin') }}"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">Cancel</a>
                <button type="submit"
                    class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md">
                    Update
                </button>
                @endif
            </div>

            @if(!$isDetail)
        </form>
        @endif
    </div>
</main>
@endsection