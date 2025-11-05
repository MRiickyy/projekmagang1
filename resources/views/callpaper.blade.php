@extends('layouts.app')

@section('title', 'Call for Papers')

@section('content')

{{-- CALL FOR PAPERS --}}

<style>
    .submission-text {
        white-space: pre-line;
    }

    .submission-text span.indent {
        display: block;
        margin-left: 1em;

    }
</style>

{{-- Call for Papers --}}
<section class="max-w-7xl mx-auto px-5 py-16">
    <h2 class="text-3xl md:text-4xl font-extrabold text-slate-800 mb-12 
        relative block text-center
        after:content-[''] after:block after:w-24 after:h-0.5 
        after:mt-4 after:mx-auto after:bg-gradient-to-r after:from-[#00e676] after:to-[#38bdf8]">
        CALL FOR PAPERS
    </h2>
    <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($callPapers->where('section', 'call_for_papers') as $cfp)
        <div class="bg-[#F2F6F9] rounded-2xl shadow-md p-6 hover:shadow-xl transition">
            <h5 class="text-center font-bold text-lg mb-3">{{ $cfp->title }}</h5>

            @php
            $items = json_decode($cfp->content, true);
            @endphp

            @if (is_array($items))
            <ul class="list-disc list-inside text-slate-600">
                @foreach ($items as $item)
                <li>{{ $item }}</li>
                @endforeach
            </ul>
            @else
            <p class="text-slate-600">{{ $cfp->content }}</p>
            @endif
        </div>
        @endforeach
    </div>
</section>

{{-- SUBMISSION GUIDELINES --}}
<section class="max-w-7xl mx-auto px-5 py-16">
    <h3 class="text-2xl font-bold mb-4 text-slate-800 relative inline-block
        after:content-[''] after:block after:w-full after:h-0.5 
        after:mt-2 after:bg-gradient-to-r after:from-[#00e676] after:to-[#38bdf8]">
        SUBMISSION GUIDELINES
    </h3>
    @php $guidelines=$callPapers->where('section', 'submission_guidelines')->first();
    @endphp

    @if ($guidelines)
    <p class="text-slate-700 leading-relaxed whitespace-pre-line">
        {{ $guidelines->content }}
    </p>
    @else
    <p class="text-slate-500 italic">No submission guidelines available.</p>
    @endif
    <p class="text-slate-700 leading-relaxed submission-text">
        {!! preg_replace('/^\s{4,}(.*)$/m', '<span class="indent">$1</span>', e($callPapers->where('section',
        'submission_guidelines')->first()->content ?? '')) !!}
    </p>
</section>

{{-- IMPORTANT DATES --}}
<section class="max-w-7xl mx-auto px-5 py-16">
    <h3 class="text-2xl font-bold mb-4 text-slate-800 relative inline-block
        after:content-[''] after:block after:w-full after:h-0.5 
        after:mt-2 after:bg-gradient-to-r after:from-[#00e676] after:to-[#38bdf8]">
        IMPORTANT DATES
    </h3>
    <div class="flex flex-wrap gap-4 mt-6">
        @forelse ($callPapers->where('section', 'important_dates') as $date)
        <div class="bg-[#F2F6F9] border border-slate-300 rounded-xl px-6 py-3 text-center shadow-sm">
            <p class="font-semibold text-slate-800">{{ $date->title }}</p>
            @foreach (explode("\n", $date->content) as $line)
            @if (trim($line) !== '')
            <p class="italic text-slate-600">{{ $line }}</p>
            @endif
            @endforeach
        </div>
        @empty
        <p class="text-slate-500 italic">No important dates available.</p>
        @endforelse
    </div>
</section>

{{-- JOIN SECTION --}}
<section class="text-center py-16 bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A]">
    <h4
        class="text-2xl font-extrabold bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent">
        JOIN US!
    </h4>

    <p class="mt-3 max-w-2xl mx-auto text-[#FFFFFF]">
        Share your insights and contribute to advancing knowledge in AI,
        IoT, and Data Science Technologies.
    </p>

    <div class="mt-6 flex justify-center gap-4">
        <a href="#"
            class="inline-flex items-center gap-2 px-7 py-3 rounded-full bg-white/10 hover:bg-white/20 text-white font-semibold shadow-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14l9-5-9-5-9 5 9 5z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 14v7m0-7l-9-5m9 5l9-5" />
            </svg>
            Learn More
        </a>

        <a href="#"
            class="inline-flex items-center gap-2 px-7 py-3 rounded-full bg-[#25d366] hover:bg-[#1fb857] text-white font-semibold shadow-lg transition">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24"
                stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M9 12h6m-6 4h6m2 4H7a2 2 0 01-2-2V6a2 2 0 012-2h7l5 5v11a2 2 0 01-2 2z" />
            </svg>
            Submit Your Paper
        </a>
    </div>
</section>
@endsection