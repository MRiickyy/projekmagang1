@extends('layouts.app')

@section('title', 'Keynote Speakers - ICOICT 2025')

@section('content')
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