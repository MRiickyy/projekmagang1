@extends('layouts.admin')

@section('title', isset($isDetail) && $isDetail ? 'Detail Home' : 'Edit Home')

@section('content')

<main class="flex-1 px-6 py-10 flex justify-center">
    <div class="w-full max-w-4xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        {{-- === TITLE === --}}
        <h2 class="text-lg font-semibold text-slate-900 mb-6">
            {{ isset($isDetail) && $isDetail ? 'Detail Home Information' : 'Edit Home Information' }}
        </h2>

        <form 
            @if(!(isset($isDetail) && $isDetail))
                action="{{ route('admin.update_home_contents_admin', $homeContent->id) }}" 
                method="POST"
                enctype="multipart/form-data"
            @endif
            class="space-y-5">

            @csrf
            @if(!(isset($isDetail) && $isDetail))
                @method('PUT')
            @endif


            {{-- SECTION READONLY --}}
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-2">Section</label>
                <input type="text" 
                       id="sectionInput"
                       name="section" 
                       value="{{ $homeContent->section }}" 
                       readonly
                       class="w-full border border-gray-400 bg-gray-200 text-gray-700 rounded-md px-3 py-2 cursor-not-allowed">
            </div>


            {{-- TEXT CONTENT --}}
            <div id="textContentWrapper">
                <label class="block text-sm font-bold text-slate-900 mb-1">Content</label>

                @if(isset($isDetail) && $isDetail)
                    {{-- DETAIL MODE --}}
                    <textarea rows="4" readonly
                        class="w-full border border-gray-300 bg-gray-200 rounded-md px-3 py-2 cursor-not-allowed">{{ $homeContent->content }}</textarea>
                @else
                    {{-- EDIT MODE --}}
                    <textarea name="content" rows="4"
                        class="w-full border border-gray-400 bg-white rounded-md px-3 py-2 focus:outline-none">{{ old('content', $homeContent->content) }}</textarea>
                @endif
            </div>


            {{-- IMAGE UPLOAD + PREVIEW --}}
            <div id="fileUploadWrapper" class="hidden">
                <label class="block text-sm font-bold text-slate-900 mb-1">Image</label>

                {{-- PREVIEW IMAGE (Selalu Ada) --}}
                @if($homeContent->content)
                    <img src="{{ asset('images/' . $homeContent->content) }}" 
                         alt="Current Image"
                         class="w-56 rounded-md shadow mb-3">
                @endif

                {{-- UPLOAD INPUT HANYA MODE EDIT --}}
                @if(!(isset($isDetail) && $isDetail))
                <input type="file" name="content_file"
                    class="w-full border border-gray-400 bg-white rounded-md px-3 py-2 focus:outline-none">
                @endif

            </div>


            {{-- BUTTONS --}}
            <div class="flex justify-end gap-3 pt-4">

                <a href="{{ route('admin.list_home_contents_admin') }}"
                    class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                    Back
                </a>

                @if(!(isset($isDetail) && $isDetail))
                <button type="submit"
                    class="px-6 py-2 rounded-md bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold shadow-md hover:scale-[1.02] transition-transform">
                    Update
                </button>
                @endif
            </div>

        </form>
    </div>
</main>

{{-- SCRIPT SHOW/HIDE FIELD --}}
<script>
    const sectionName = document.getElementById('sectionInput').value;
    const imageSections = ['banner_image', 'banner_logo'];

    const textContentWrapper = document.getElementById('textContentWrapper');
    const fileUploadWrapper = document.getElementById('fileUploadWrapper');

    if (imageSections.includes(sectionName)) {
        textContentWrapper.classList.add('hidden');
        fileUploadWrapper.classList.remove('hidden');
    } else {
        textContentWrapper.classList.remove('hidden');
        fileUploadWrapper.classList.add('hidden');
    }
</script>

@endsection
