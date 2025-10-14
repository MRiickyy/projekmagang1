@extends('layouts.admin')

@section('title', 'Detail Speaker Information')

@section('content')

<!-- Content -->
<main class="flex-1 flex justify-center items-start px-4 py-10">
    <div class="w-full max-w-3xl bg-[#F2F6F9] rounded-lg shadow-xl p-6 text-slate-800">

        <h2 class="text-base font-semibold text-slate-900 mb-6">Detail Speaker Information</h2>

        <div class="space-y-5">

            <!-- Speaker Image -->
            <div class="flex justify-center mb-4">
                <img src="{{ asset('images/speakers/' . $speaker->image) }}"
                    alt="{{ $speaker->name }}"
                    class="w-40 h-40 object-cover rounded-lg shadow-md">
            </div>

            <!-- Name -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="name">Name</label>
                <input type="text" id="name" value="{{ $speaker->name }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- University -->
            @if($speaker->university)
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="university">University</label>
                <input type="text" id="university" value="{{ $speaker->university }}"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>
            @endif

            <!-- Type -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="speaker_type">Type</label>
                <input type="text" id="speaker_type" value="{{ ucfirst($speaker->speaker_type) }} Speaker"
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed"
                    readonly disabled />
            </div>

            <!-- Biodata -->
            @if($speaker->biodata)
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1" for="biodata">Biodata</label>
                <textarea id="biodata" rows="5" readonly disabled
                    class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed">{{ $speaker->biodata }}</textarea>
            </div>
            @endif

            <!-- Descriptions -->
            <div>
                <label class="block text-sm font-bold text-slate-900 mb-1">Descriptions</label>
                @if($speaker->descriptions->count() > 0)
                    @foreach($speaker->descriptions as $desc)
                        <div class="mb-3">
                            <p class="font-semibold text-gray-800">{{ $desc->title }}</p>
                            <textarea rows="3" readonly disabled
                                class="w-full border border-gray-400 bg-gray-200 rounded-md px-3 py-2 text-gray-700 cursor-not-allowed">{{ $desc->content }}</textarea>
                        </div>
                    @endforeach
                @else
                    <p class="text-gray-500 italic">No descriptions available.</p>
                @endif
            </div>

            <!-- Action Buttons -->
            <div class="flex justify-between pt-4">
                <div class="flex gap-3"></div>
                    <button type="button" onclick="window.history.back()" class="px-6 py-2 rounded-md bg-gray-600 text-white hover:bg-gray-700">
                        Back
                    </button>
            </div>

        </div>
    </div>
</main>
@endsection
