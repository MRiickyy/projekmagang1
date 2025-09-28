@extends('layouts.app')

@section('title', 'Detail Speakers - ICOICT 2025')

@section('content')
<!-- SPEAKERS -->
<section class="max-w-7xl mx-auto my-5 px-5">
    <!-- CARD -->
    <div class="bg-gray-50 rounded-xl shadow-lg p-6 flex flex-col md:flex-row gap-6 items-center md:items-center">
        <!-- Image -->
        <img src="{{ asset('images/speakers/' . $speaker->image) }}" alt="{{ $speaker->name }}"
            class="w-40 h-40 object-cover rounded-lg">

        <div class="flex-1 space-y-4">
            <div>
                <h4 class="text-xl font-bold">{{ $speaker->name }}</h4>
                <p class="text-red-600 font-semibold">{{ $speaker->university }}</p>
                <p class="text-gray-700 mt-2">
                    {{ $speaker->biodata }}
                </p>
            </div>
        </div>
    </div>
</section>

<!-- DESCRIPTION -->
<section class="max-w-7xl mx-auto my-12 px-5">
    <h3 class="text-2xl font-bold mb-6">
        DESCRIPTION
        <span class="block h-1 w-32 mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
    </h3>

    @if($speaker->description->count())
        <div class="space-y-4">
            @foreach($speaker->description as $desc)
                <div>
                    <h4 class="font-bold">{{ ucfirst($desc->type) }}</h4>
                    <p class="text-gray-600 whitespace-pre-line">{{ $desc->content }}</p>
                </div>
            @endforeach
        </div>
    @else
        <p class="text-gray-500">No description available.</p>
    @endif
</section>
@endsection