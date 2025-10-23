@extends('layouts.app')

@section('title', 'Author Information - ICOICT 2025')

@section('content')

<!-- BODY SECTION: AUTHOR INFORMATION -->
<main class="bg-white my-12">
    <div class="max-w-7xl mx-auto px-5">

        <!-- Title -->
        <div class="text-center mb-8">
            <h1 class="relative inline-block text-3xl md:text-4xl font-bold tracking-wide text-[#1a1f27]/95">
                AUTHOR INFORMATION
                <span class="block h-1 w-40 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
            </h1>
        </div>

        <!-- CTA Box -->
        <div class="mt-10 bg-[#1a1f27] rounded-xl p-8 shadow-xl space-y-6 text-center text-white">
            <p class="mb-2 text-white text-lg md:text-xl">
                {{ $authorInfos['cta_text']->content ?? 'Authors are requested to utilize the provided presentation format.' }}
            </p>
            <a href="{{ $authorInfos['cta_link']->content ?? '#' }}"
                class="inline-flex items-center justify-center rounded-full bg-sky-500 hover:bg-sky-600 transition px-6 py-2 md:px-8 md:py-3 font-semibold shadow">
                {{ $authorInfos['cta_button']->content ?? 'Download Slide Format' }}
            </a>
        </div>

        <!-- Intro Paragraph -->
        <div class="mt-6 space-y-4 text-black leading-relaxed text-justify">
            @if(isset($authorInfos['intro_paragraph']))
                @foreach($authorInfos['intro_paragraph'] as $info)
                    <p>{!! nl2br(e($info->content)) !!}</p>
                @endforeach
            @else
                <p>Prospective authors are invited to submit full papers with a maximum of 6 pages...</p>
            @endif

            <p>
                Please submit your paper via
                <a href="{{ $authorInfos['submission_link'][0]->content ?? '#' }}" class="text-sky-400 underline">
                    {{ $authorInfos['submission_link'][0]->content ?? 'https://edas.info/newPaper.php?c=33220' }}
                </a>.
            </p>
        </div>

        <!-- Card Section -->
        <div class="mt-6 bg-gray-100 rounded-xl p-6 shadow-lg text-justify">

            <!-- SELECTION PROCESS -->
            <section class="mt-4">
                <h2 class="text-xl font-bold mb-3 text-black">SELECTION PROCESS</h2>
                @if(isset($authorInfos['selection_process']))
                    @foreach($authorInfos['selection_process'] as $info)
                        <p class="text-black leading-relaxed mb-2">{!! nl2br(e($info->content)) !!}</p>
                    @endforeach
                @else
                    <p class="text-black leading-relaxed">All paper submissions will be checked for formatting and originality...</p>
                @endif
            </section>

            <!-- PREPARATION OF CONTRIBUTIONS -->
            <section class="mt-6">
                <h2 class="text-xl font-bold mb-3 text-black">PREPARATION OF CONTRIBUTIONS</h2>
                @if(isset($authorInfos['preparation_of_contributions']))
                    @foreach($authorInfos['preparation_of_contributions'] as $info)
                        <p class="text-black leading-relaxed mb-2">{!! nl2br(e($info->content)) !!}</p>
                    @endforeach
                @else
                    <p class="text-black leading-relaxed">The manuscript template can be downloaded from: https://www.ieee.org/conferences/publishing/templates.html</p>
                @endif
            </section>

            <!-- NON-PRESENTED PAPER POLICY -->
            <section class="mt-6 mb-4">
                <h2 class="text-xl font-bold mb-3 text-black">NON-PRESENTED PAPER POLICY</h2>
                @if(isset($authorInfos['non_presented_policy']))
                    @foreach($authorInfos['non_presented_policy'] as $info)
                        <p class="text-black leading-relaxed mb-2">{!! nl2br(e($info->content)) !!}</p>
                    @endforeach
                @else
                    <p class="text-black leading-relaxed">The committee reserves the right to exclude a paper from proceedings if it is not presented.</p>
                @endif
            </section>

        </div>

    </div>
</main>
@endsection
