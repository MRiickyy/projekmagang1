@extends('layouts.app')

@section('title', 'Keynote Speakers - ICOICT 2025')

@section('content')
    <!-- HERO -->
    <header class="min-h-screen flex items-center bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A]">

        <div class="max-w-7xl mx-auto px-5 py-16 md:py-20 grid md:grid-cols-2 gap-8 items-center scale-[.8] origin-top">
            <div>
                <h1 class="text-5xl md:text-7xl lg:text-8xl text-white font-extrabold leading-tight">
                    THE 13TH ICOICT
                    <span
                        class="font-extrabold tracking-wide bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent">
                        2025
                    </span>
                </h1>

                <p class="mt-4 text-slate-200 text-xl max-w-xl">
                    International Conference on Information and Communication Technology
                </p>

                <div class="mt-6 flex items-center gap-3">
                    <a href="#" class="inline-flex items-center gap-2 bg-slate-800/70 hover:bg-slate-700 text-white 
            text-lg px-7 py-3 rounded-full shadow-lg">
                        Register Now
                    </a>
                    <a href="#" class="inline-flex items-center gap-2 bg-[#25d366] hover:bg-[#1fb857] 
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
                <p class="text-lg text-slate-200 mb-3">Bandung (Hybrid), 30–31 July 2025</p>
                <div class="flex gap-4 bg-slate-900/40 ring-1 ring-white/10 shadow-2xl px-9 py-7 rounded-2xl">
                    @foreach (['DAYS'=>24,'HOURS'=>14,'MINUTES'=>5,'SECONDS'=>40] as $label=>$val)
                    <div class="min-w-[95px] text-center text-white">
                        <div class="text-5xl font-bold">{{ $val }}</div>
                        <div class="text-[11px] tracking-wider text-slate-300">{{ $label }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </header>

    <!-- BODY SECTION: AUTHOR INFORMATION -->
    <main class="bg-white py-16">
        <div class="max-w-5xl mx-auto px-5">

            <!-- Title -->
            <div class="text-center mb-8">
                <h1 class="relative inline-block text-3xl md:text-5xl font-bold tracking-wide text-[#1a1f27]/95">
                    AUTHOR INFORMATION
                    <!-- Garis bawah -->
                    <span class="block h-1 w-40 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
                </h1>
            </div>


            <!-- CTA Box -->
            <div class="mt-10 bg-[#1a1f27] rounded-xl p-8 shadow-xl space-y-8 text-center text-white">
                <p class="mb-2 text-white">
                    Authors are requested to utilize the provided presentation format.
                </p>
                <a href="#"
                   class="inline-flex items-center justify-center rounded-full bg-sky-500 hover:bg-sky-600 transition px-6 py-2 font-semibold shadow">
                    Download Slide Format
                </a>
            </div>

            <!-- Intro Paragraph -->
            <div class="mt-6 space-y-4 text-black leading-relaxed text-justify">
                <p>
                    Prospective authors are invited to submit full papers with maximum of 6 pages (including tables,
                    figures and references) in standard IEEE double-column format; Extra fee for more pages. Our
                    conference focuses on showcasing original research, including completed studies or substantial work
                    in progress.
                </p>
                <p>
                    Please submit your paper via
                    <a href="https://edas.info/newPaper.php?c=33220" class="text-sky-400 underline">
                        https://edas.info/newPaper.php?c=33220
                    </a>.
                    New users are required to register with EDAS before paper submission. Each full registration for the
                    conference will cover one paper.
                </p>
            </div>

            <!-- Card Section -->
            <div class="mt-6 bg-gray-100 rounded-xl p-6 shadow-lg text-justify">

                <!-- SELECTION PROCESS -->
                <section>
                    <h2 class="text-xl font-bold mb-3 text-black">SELECTION PROCESS</h2>
                    <p class="text-black leading-relaxed">
                        All paper submissions will be checked for formatting and originality. Due to IEEE policy, papers
                        with high similarity score may not be accepted by the conference. Similarity threshold for review
                        manuscript is 30%. The final version must not have a similarity index below 20%. In addition, AI
                        writing score also be checked as consideration.
                    </p>
                    <p class="text-black leading-relaxed mt-3">
                        All submitted papers are subjected to a peer review process by 2–3 reviewers. Decision of a
                        paper acceptance is based on the average score and the comments given by the reviewers. The
                        accepted papers must be strictly revised according to the reviewers’ comments and suggestions
                        before submitting the camera-ready version. All accepted and presented papers will be submitted
                        for inclusion into the IEEE Xplore® subject to meeting IEEE scope and quality requirements.
                    </p>
                </section>

                <!-- PREPARATION OF CONTRIBUTIONS -->
                <section>
                    <h2 class="text-xl font-bold mb-3 mt-3 text-black">PREPARATION OF CONTRIBUTIONS</h2>
                    <p class="text-black leading-relaxed">
                        The manuscript template can be downloaded from:
                        <a href="https://www.ieee.org/conferences/publishing/templates.html"
                           class="text-sky-400 underline">
                            https://www.ieee.org/conferences/publishing/templates.html
                        </a>
                    </p>
                    <p class="text-black leading-relaxed mt-3">
                        <span class="font-semibold">The manuscript of Camera-Ready Paper in Ms. Word or Zipped LaTex format (A4 size)
                        is also needed as supplementary material at the Registration stage.</span>
                    </p>
                    <p class="text-black leading-relaxed mt-3">
                        <span class="font-semibold">Note:</span>
                        Please note that as we use a double-blind review process, author’s names and affiliations should
                        not be written anywhere on the manuscript when it is submitted. This is necessary to ensure
                        fairness in the reviewing process.
                    </p>
                </section>

                <!-- NON-PRESENTED PAPER POLICY -->
                <section>
                    <h2 class="text-xl font-bold mb-3 mt-3 text-black">NON-PRESENTED PAPER POLICY</h2>
                    <p class="text-black leading-relaxed">
                        The committee reserves the right to exclude a paper from distribution after the conference if the
                        paper is not presented at the conference.
                    </p>
                </section>

            </div>
        </div>
    </main>
@endsection