@extends('layouts.app')

@section('title', 'Keynote Speakers - ICOICT 2025')

@section('content')
<!-- SPEAKERS -->
<section class="max-w-7xl mx-auto my-12 px-5">
    <h3 class="text-center text-3xl font-bold mb-10">KEYNOTE SPEAKERS
        <!-- Garis bawah -->
        <span class="block h-1 w-40 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
    </h3>

    @forelse ($speakers as $speaker)
    <!-- CARD -->
    <div class="bg-gray-100 rounded-lg shadow-md flex items-start mb-6 overflow-hidden">
        <img src="{{ asset($speaker->image) }}" alt="{{ $speaker->name }}"
            class="w-40 h-40 object-cover rounded-xl m-4">
        <div class="flex flex-col justify-between p-4 flex-1">
            <div>
                <h4 class="text-lg font-bold mb-2">{{ $speaker->name }} | {{ $speaker->university }}</h4>
                <div class="relative">
                    <p class="text-sm leading-relaxed max-h-24 overflow-hidden transition-all duration-500">
                        {{ $speaker->biodata }}
                    </p>

                    <!-- Fade di bawah -->
                    <div
                        class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-gray-100 to-transparent pointer-events-none">
                    </div>
                </div>
            </div>
            <a href="{{ route('detail.speaker', $speaker->slug) }}"
                class="self-end bg-[#0a2a43] hover:bg-[#103d60] text-white px-5 py-2 rounded-full text-sm flex items-center gap-2">
                Read More
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>
    @empty
    <div class="text-center text-gray-600 bg-gray-100 py-10 rounded-lg shadow-md">
        <p class="text-lg font-semibold">Belum ada Keynote Speaker yang tersedia.</p>
    </div>
    @endforelse

</section>
@endsection