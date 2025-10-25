<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ICOICT 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-white text-slate-100 antialiased">
    @php
    $eventYear = request()->route('event_year') ?? 2025; // default 2025 kalau gak ada param
    @endphp

    <!-- Topbar / Navbar -->
    <nav class="bg-[#1a1f27]/95 backdrop-blur supports-backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-5 py-4 flex items-center justify-between">
            <!-- Logo -->
            <a href="{{ route('home', ['event_year' => $eventYear]) }}"
                class="text-2xl font-extrabold tracking-wide bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent">
                ICOICT 2025
            </a>

            <!-- Menu -->
            <div class="hidden md:flex items-center gap-8 font-semibold text-slate-200">
                <a href="{{ route('call_papers', ['event_year' => $eventYear]) }}" class="hover:text-[#9ae6b4]">Call for
                    Papers</a>

                <!-- Speakers dengan dropdown -->
                <div class="relative dropdown">
                    <button class="dropdown-btn flex items-center gap-1 hover:text-[#9ae6b4]">
                        Speakers
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="dropdown-menu absolute left-0 mt-2 w-48 bg-[#1a1f27] text-white rounded-md shadow-lg hidden">
                        <a href="{{ route('keynote.speakers', ['event_year' => $eventYear]) }}"
                            class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Keynote
                            Speakers</a>
                        <a href="{{ route('tutorial.speakers', ['event_year' => $eventYear]) }}"
                            class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Tutorial
                            Speakers</a>
                    </div>
                </div>

                <!-- Committees dengan dropdown -->
                <div class="relative dropdown">
                    <button class="dropdown-btn flex items-center gap-1 hover:text-[#9ae6b4]">
                        Committees
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="dropdown-menu absolute left-0 mt-2 w-56 bg-[#1a1f27] text-white rounded-md shadow-lg hidden">
                        <a href="{{ route('steering.committees', ['event_year' => $eventYear]) }}"
                            class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Steering
                            Committees</a>
                        <a href="{{ route('technical.committees', ['event_year' => $eventYear]) }}"
                            class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Technical
                            Program Committees</a>
                        <a href="{{ route('organizing.committees', ['event_year' => $eventYear]) }}"
                            class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Organizing
                            Committees</a>
                    </div>
                </div>

                <!-- For Authors dengan dropdown -->
                <div class="relative dropdown">
                    <button class="dropdown-btn flex items-center gap-1 hover:text-[#9ae6b4]">
                        For Authors
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                        </svg>
                    </button>
                    <div
                        class="dropdown-menu absolute left-0 mt-2 w-56 bg-[#1a1f27] text-white rounded-md shadow-lg hidden">
                        <a href="{{route('author-information.index', ['event_year' => $eventYear])}}" 
                            class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Author Information</a>
                        <a href="{{ route('registration.index', ['event_year' => $eventYear]) }}" 
                            class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Registration</a>
                        <a href="{{ route('contact', ['event_year' => $eventYear]) }}" 
                            class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Contacts</a>
                    </div>
                </div>

                <a href="#" class="hover:text-[#9ae6b4]">Events</a>
            </div>
        </div>
    </nav>

    <!-- Script Dropdown -->
    <script>
    const dropdowns = document.querySelectorAll(".dropdown");

    dropdowns.forEach(dropdown => {
        const btn = dropdown.querySelector(".dropdown-btn");
        const menu = dropdown.querySelector(".dropdown-menu");

        btn.addEventListener("click", (e) => {
            e.stopPropagation();

            // Tutup semua dropdown lain dulu
            dropdowns.forEach(d => {
                if (d !== dropdown) {
                    d.querySelector(".dropdown-menu").classList.add("hidden");
                }
            });

            // Toggle dropdown yang diklik
            menu.classList.toggle("hidden");
        });
    });

    // Klik di luar semua dropdown → tutup semuanya
    document.addEventListener("click", () => {
        dropdowns.forEach(d => d.querySelector(".dropdown-menu").classList.add("hidden"));
    });
    </script>


    @if($homeContents->isNotEmpty())
    <!-- HERO -->
    <header class="min-h-screen flex items-center bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A]">

        <div class="max-w-7xl mx-auto px-5 py-16 md:py-20 grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold leading-tight">
                    {{ $homeContents['hero_title']->content ?? 'Default Title' }}
                    <span
                        class="font-extrabold tracking-wide bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent">
                        {{ $homeContents['hero_year']->content ?? '2025' }}
                    </span>
                </h1>


                <p class="mt-4 text-slate-200 text-xl max-w-xl">
                    {{ $homeContents['hero_subtitle']->content ?? 'Default Subtitle' }}
                </p>

                <div class="mt-6 flex items-center gap-3">
                    <a href="/newacc" class="inline-flex items-center gap-2 bg-slate-800/70 hover:bg-slate-700 text-white 
           text-lg px-7 py-3 rounded-full shadow-lg">
                        Register Now
                    </a>
                    <a href="/login" class="inline-flex items-center gap-2 bg-[#47BA77] hover:bg-[#1fb857] 
           text-black font-semibold text-lg px-7 py-3 rounded-full shadow-lg">
                        Submit Your Paper
                    </a>

                </div>
            </div>

            <!-- countdown glass card -->
            <div class="flex flex-col md:items-end items-center">
                <div class="flex gap-4 mt-4 text-slate-300">
                    <!-- simple social icons -->
                    <svg class="h-9 w-9" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M7 2C4.24 2 2 4.24 2 7v10c0 2.76 2.24 5 5 5h10c2.76 0 5-2.24 5-5V7c0-2.76-2.24-5-5-5H7zm10 3a.75.75 0 110 1.5A.75.75 0 0117 5zM12 7a5 5 0 110 10 5 5 0 010-10z" />
                    </svg>
                    <svg class="h-9 w-9" viewBox="0 0 24 24" fill="currentColor">
                        <path
                            d="M22.46 6c-.77.35-1.6.58-2.46.69a4.27 4.27 0 001.88-2.36 8.54 8.54 0 01-2.7 1.03 4.26 4.26 0 00-7.26 3.88A12.1 12.1 0 013 5.15a4.25 4.25 0 001.32 5.67 4.22 4.22 0 01-1.93-.53v.05a4.26 4.26 0 003.42 4.17 4.33 4.33 0 01-1.92.07 4.27 4.27 0 003.98 2.95A8.55 8.55 0 012 19.55a12.06 12.06 0 006.53 1.91c7.84 0 12.13-6.5 12.13-12.13l-.01-.55A8.67 8.67 0 0022.46 6z" />
                    </svg>
                    <svg class="h-9 w-9" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M10 15l5.19-3L10 9v6z" />
                        <path
                            d="M21 7a2 2 0 00-2-2H5C3.9 5 3 5.9 3 7v10a2 2 0 002 2h14a2 2 0 002-2V7zM5 17V7h14v10H5z" />
                    </svg>
                </div>
                <p class="text-lg text-slate-200 mb-3">
                    {{ $homeContents['hero_location_date']->content ?? 'Bandung (Hybrid), 30–31 July 2025' }}
                </p>
                <div class="flex justify-center">
                    <!-- Box Luaran -->
                    <div class="flex gap-6 p-6 rounded-3xl shadow-2xl bg-gradient-to-br from-[#2B3545] to-[#3B4A60]">

                        <!-- Box 1 -->
                        <div
                            class="flex flex-col items-center rounded-2xl px-5 py-4 shadow-xl bg-gradient-to-br from-[#38465A] to-[#4A5C75]">
                            <div class="text-5xl font-bold text-white">24</div>
                            <div class="text-sm tracking-wider text-slate-200 mt-1">DAYS</div>
                        </div>

                        <!-- Box 2 -->
                        <div
                            class="flex flex-col items-center rounded-2xl px-5 py-4 shadow-xl bg-gradient-to-br from-[#38465A] to-[#4A5C75]">
                            <div class="text-5xl font-bold text-white">14</div>
                            <div class="text-sm tracking-wider text-slate-200 mt-1">HOURS</div>
                        </div>

                        <!-- Box 3 -->
                        <div
                            class="flex flex-col items-center rounded-2xl px-5 py-4 shadow-xl bg-gradient-to-br from-[#38465A] to-[#4A5C75]">
                            <div class="text-5xl font-bold text-white">5</div>
                            <div class="text-sm tracking-wider text-slate-200 mt-1">MINUTES</div>
                        </div>

                        <!-- Box 4 -->
                        <div
                            class="flex flex-col items-center rounded-2xl px-5 py-4 shadow-xl bg-gradient-to-br from-[#38465A] to-[#4A5C75]">
                            <div class="text-5xl font-bold text-white">40</div>
                            <div class="text-sm tracking-wider text-slate-200 mt-1">SECONDS</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </header>


    <!-- Banner image + red pill headline -->
    <section class="bg-white">
        <div class="max-w-7xl mx-auto px-5">
            <!-- Banner -->
            <img src="{{ asset('images/telkom.jpg') }}" alt="city"
                class="w-screen h-64 md:h-80 object-cover rounded-sm">

            <div class="flex items-center justify-between gap-6 -mt-10 md:-mt-12">
                <div class="bg-[#df3a3a] text-white text-base md:text-lg px-8 py-4 rounded-full shadow-lg flex-grow">
                    {{ $homeContents['banner_text']->content ?? 'Default Banner Text' }}
                </div>
                <img src="{{ asset('images/logo.png') }}" class="h-10 md:h-12" alt="logo">
            </div>

        </div>
    </section>


    <!-- Welcome -->
    <section class="bg-[#FFFFFF] text-slate-700">
        <div class="max-w-7xl mx-auto px-5 mt-8">
            <h3 class="text-xl md:text-2xl font-extrabold">
                {!! $homeContents['welcome_title']->content ?? 'Welcome to ICoICT 2025!' !!}
            </h3>

            <p class="mt-4 leading-relaxed">
                {!! $homeContents['welcome_text']->content ?? 'Default welcome text...' !!}
            </p>

            <div class="bg-[#F2F6F9] ring-1 ring-white/10 p-5 md:p-6 rounded-xl mt-6">
                <p class="font-semibold mb-3">
                    {!! $homeContents['welcome_tracks_intro']->content ?? 'Default tracks intro...' !!}
                </p>

                <ol class="list-decimal list-inside space-y-1">
                    {!! collect(explode('<br>', $homeContents['welcome_tracks']->content ?? 'Artificial
                    Intelligence<br>Data Science'))->map(fn($track) => "<li>$track</li>")->implode('') !!}
                </ol>

                <p class="mt-4 text-sm">
                    {!! $homeContents['welcome_tracks_footer']->content ?? 'Default footer text...' !!}
                </p>
            </div>
        </div>

        <div class="max-w-7xl mx-auto px-5 mt-10">
            <h3 class="text-xl md:text-2xl font-extrabold mb-4">
                {!! $homeContents['welcome_prev_title']->content ?? 'Default prev title...' !!}
            </h3>

            <div class="grid sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($homeContents['icoict_links'] ?? [] as $year => $url)
                <a href="{{ $url }}" target="_blank"
                    class="block rounded-xl border border-slate-700/60 bg-[#F2F6F9] px-4 py-4 hover:bg-slate-700/40 transition shadow">
                    <div class="font-bold">ICoICT {{ $year }} :</div>
                    <div class="text-slate-700 text-sm leading-5 break-words">
                        {{ $url }}
                    </div>
                </a>
                @endforeach
            </div>



            <div class="mt-8">
                <h4 class="font-extrabold text-slate-700">
                    {!! $homeContents['welcome_isbn_title']->content ?? 'With ISBN Information:' !!}
                </h4>
                <p class="mt-2 text-slate-700 text-sm">
                    {!! $homeContents['welcome_isbn_text']->content ?? 'Electronic ISBN: 000-0-0000-0000-0' !!}
                </p>
                </p>
            </div>
        </div>
    </section>



    <!-- Important Dates -->
    <section class="bg-white text-slate-700">
        <div class="max-w-7xl mx-auto px-5 py-10">
            <h3 class="text-xl md:text-2xl font-extrabold mb-4">Important Dates :</h3>
            <div class="grid md:grid-cols-2 gap-6">
                @forelse ($timelines as $round => $items)
                <div class="bg-[#F2F6F9] rounded-xl shadow-md ring-1 ring-slate-200 p-6 mb-6">
                    <h5 class="text-center font-extrabold tracking-wide text-slate-700 mb-4">
                        TIMELINE ROUND {{ $round }}
                    </h5>
                    <div class="grid grid-cols-[auto_1fr] gap-x-4 gap-y-3">
                        @foreach ($items as $timeline)
                        <div class="text-[#df3a3a] font-bold">
                            {{ \Carbon\Carbon::parse($timeline->date)->translatedFormat('F d, Y') }}
                        </div>
                        <div>{{ $timeline->title }}</div>
                        @endforeach
                    </div>
                </div>
                @empty
                <div class="col-span-2">
                    <div
                        class="bg-[#F2F6F9] rounded-xl shadow-md ring-1 ring-slate-200 p-6 mb-6 flex justify-center items-center min-h-[150px]">
                        <p class="text-gray-500 font-semibold text-center">Belum ada data timeline yang tersedia.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Don't miss it + Speakers -->
    <section class="bg-white">
        <div
            class="max-w-7xl mx-auto px-5 pt-4 background: linear-gradient(90deg, #1E293B 0%, #1A202C 0%, #212C40 30%, #334155 55%, #0F172A 100%);">
            <div class="text-center mb-6 p-6 rounded-2xl bg-[#2A394E]">
                <div class="text-2xl md:text-3xl font-extrabold">
                    <span
                        class="bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent">
                        Don't miss it!
                    </span>
                </div>
                <a href="/login"
                    class="inline-flex items-center gap-2 mt-3 bg-[#47BA77] hover:bg-[#1fb857] text-black font-semibold px-5 py-2 rounded-full">
                    Submit Your Paper
                </a>
            </div>


            <div class="grid md:grid-cols-2 gap-6">
                <div class="rounded-2xl bg-gradient-to-br from-[#0f172a] to-[#1f2937] p-6 shadow-lg">
                    <div class="text-xl font-extrabold tracking-wide">
                        {!!$homeContents['speakers_keynote_title']->content ??'KEYNOTE SPEAKERS' !!}</div>
                    <p class="mt-3 text-slate-300">
                        {!!$homeContents['speakers_keynote_text']->content ??'Distinguished experts...'!!}
                    </p>
                    <a href="/keynote-speakers-2025"
                        class="mt-4 inline-flex items-center gap-2 text-[#ff5b5b] font-semibold">
                        Read More <span aria-hidden="true">›</span>
                    </a>
                </div>
                <div class="rounded-2xl bg-gradient-to-br from-[#0f172a] to-[#1f2937] p-6 shadow-lg">
                    <div class="text-xl font-extrabold tracking-wide">
                        {!!$homeContents['speakers_tutorial_title']->content ??'TUTORIAL SPEAKERS' !!}</div>
                    <p class="mt-3 text-slate-300">
                        {!!$homeContents['speakers_tutorial_text']->content ??'Renowned subject-matter...' !!}
                    </p>
                    <a href="/tutorial-speakers-2025"
                        class="mt-4 inline-flex items-center gap-2 text-[#ff5b5b] font-semibold">
                        Read More <span aria-hidden="true">›</span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    @else
    <section class="min-h-screen flex items-center justify-center">
        <p class="text-gray-500 text-lg text-center font-semibold">
            Belum ada konten ditambahkan oleh admin.
        </p>
    </section>
    @endif

    <!-- Footer (3 columns) -->
    <footer class="mt-10 bg-gradient-to-br from-[#0f172a] to-[#1f2937]">
        <div class="max-w-7xl mx-auto px-5 py-10 grid md:grid-cols-3 gap-6">
            <div class="rounded-xl bg-[#F2F6F9] ring-1 ring-white/10 p-6 text-center">
                <div class="text-slate-700 font-extrabold mb-2">ICoICT 2025 Organized By :</div>
                <div class="text-slate-700">Telkom University Indonesia</div>
                <img src="{{ asset('images/logoTelkom.png') }}" class="h-8 md:h-8 mx-auto mt-4" alt="logoTelkom">
                <div class="mt-4 text-slate-700 text-sm">Co – Hosts :<br />Multimedia University Malaysia</div>
                <img src="{{ asset('images/logoMMU.png') }}" class="h-6 md:h-8 mx-auto mt-4" alt="logoMMU">
            </div>

            <div class="rounded-xl bg-[#F2F6F9] ring-1 ring-white/10 p-6 text-center">
                <div class="text-slate-700 font-extrabold mb-2">Sponsored By :</div>
                <div class="text-slate-700">IEEE Indonesia Section</div>
                <img src="{{ asset('images/logoIEEE.png') }}" class="h-8 md:h-12 mx-auto" alt="logoIEEE">
            </div>

            <div class="rounded-xl bg-[#F2F6F9] ring-1 ring-white/10 p-6 text-center">
                <div class="text-slate-700 font-extrabold mb-2">Visitors</div>
                <img src="{{ asset('images/benderaVisitor.png') }}" class="h-25 md:h-25 mx-auto" alt="benderaVisitor">
            </div>
        </div>
    </footer>

</body>

</html>