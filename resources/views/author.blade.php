@extends('layouts.app')

@section('title', 'Author Information')

@section('content')

<main class="bg-white my-12">
    <div class="max-w-7xl mx-auto px-5">

        <div class="text-center mb-8">
            <h1 class="relative inline-block text-3xl md:text-4xl font-bold tracking-wide text-[#1a1f27]/95">
                AUTHOR INFORMATION
                <span class="block h-1 w-40 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
            </h1>
        </div>

        <!-- CTA Box -->
        @if(isset($authorInfos['cta_text']) || isset($authorInfos['cta_link']) || isset($authorInfos['cta_button']))
        <div class="mt-10 bg-[#1a1f27] rounded-xl p-8 shadow-xl space-y-6 text-center text-white">
            @if(isset($authorInfos['cta_text'][0]))
                <p class="mb-2 text-white text-lg md:text-xl">
                    {{ $authorInfos['cta_text'][0]->content }}
                </p>
            @endif

            @if(isset($authorInfos['cta_link'][0]) && isset($authorInfos['cta_button'][0]))
                <a href="{{ $authorInfos['cta_link'][0]->content }}"
                    class="inline-flex items-center justify-center rounded-full bg-sky-500 hover:bg-sky-600 transition px-6 py-2 md:px-8 md:py-3 font-semibold shadow">
                    {{ $authorInfos['cta_button'][0]->content }}
                </a>
            @endif
        </div>
        @endif

        <!-- Intro Paragraph -->
        <div class="mt-6 space-y-4 text-black leading-relaxed text-justify">
            @if(isset($authorInfos['intro_paragraph']))
                @foreach($authorInfos['intro_paragraph'] as $info)
                    <p>{!! nl2br(e($info->content)) !!}</p>
                @endforeach
            @endif

            @if(isset($authorInfos['submission_link'][0]))
                <p>
                    Please submit your paper via
                    <a href="{{ $authorInfos['submission_link'][0]->content }}" class="text-sky-400 underline">
                        {{ $authorInfos['submission_link'][0]->content }}
                    </a>.
                </p>
            @endif
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
                @endif
            </section>

            <!-- PREPARATION OF CONTRIBUTIONS -->
            <section class="mt-6">
                <h2 class="text-xl font-bold mb-3 text-black">PREPARATION OF CONTRIBUTIONS</h2>
                @if(isset($authorInfos['preparation_of_contributions']))
                    @foreach($authorInfos['preparation_of_contributions'] as $info)
                        <p class="text-black leading-relaxed mb-2">{!! nl2br(e($info->content)) !!}</p>
                    @endforeach
                @endif
            </section>

            <!-- NON-PRESENTED PAPER POLICY -->
            <section class="mt-6 mb-4">
                <h2 class="text-xl font-bold mb-3 text-black">NON-PRESENTED PAPER POLICY</h2>
                @if(isset($authorInfos['non_presented_policy']))
                    @foreach($authorInfos['non_presented_policy'] as $info)
                        <p class="text-black leading-relaxed mb-2">{!! nl2br(e($info->content)) !!}</p>
                    @endforeach
                @endif
            </section>

        </div>

    </div>
</main>
@endsection
