@extends('layouts.app')

@section('title', 'Technical Program Committees - ICOICT 2025')

@section('content')

<!-- Technical Program Committees Section -->
<section class="py-16 bg-slate-50">
    <div class="max-w-6xl mx-auto px-5">

        <!-- Title -->
        <h3 class="text-center text-3xl font-bold mb-10">TECHNICAL PROGRAM COMMITTEES
            <span class="block h-1 w-40 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
        </h3>

        <!-- Committees List -->
        <div class="mt-8 space-y-4">
            @forelse($committees as $committee)
                <div class="flex items-center gap-3 {{ $loop->even ? 'bg-gray-100' : 'bg-blue-100' }} rounded-xl px-4 py-3 shadow">
                    <svg class="w-5 h-5 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12 12c2.7 0 5-2.3 5-5s-2.3-5-5-5-5 2.3-5 5 2.3 5 5 5zM12 14c-3.3 0-10 1.7-10 5v3h20v-3c0-3.3-6.7-5-10-5z"/>
                    </svg>
                    <div>
                        <p class="font-semibold text-slate-800">
                            {{ $committee->name }}
                            @if($committee->role)
                                <span class="text-sm text-slate-500">({{ $committee->role }})</span>
                            @endif
                        </p>

                        @php
                            // Pisahkan berdasarkan titik koma
                            $universities = array_map('trim', explode(';', $committee->university));
                            $countries = array_map('trim', explode(';', $committee->country));
                        @endphp

                        <p class="text-sm text-slate-600 italic leading-snug">
                            @foreach($universities as $index => $univ)
                                {{ $univ }}
                                @if(isset($countries[$index]) && $countries[$index] !== '')
                                    , {{ $countries[$index] }}
                                @endif
                                @if(!$loop->last)<br>@endif
                            @endforeach
                        </p>
                    </div>
                </div>
            @empty
                <div class="text-center text-gray-600 bg-gray-100 py-10 rounded-lg shadow-md">
                    <p class="text-lg font-semibold">There are no Organizing Committees available yet.</p>
                </div>
            @endforelse
        </div>
    </div>
</section>

@endsection