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

    <!-- BODY -->
    <main class="bg-white py-16">
        <div class="max-w-5xl mx-auto px-5">

            <!-- Title -->
            <div class="text-center mb-8">
                <h1 class="relative inline-block text-3xl md:text-5xl font-bold tracking-wide text-[#1a1f27]/95">
                    REGISTRATION
                    <!-- Garis bawah -->
                    <span class="block h-1 w-40 mx-auto mt-2 bg-gradient-to-r from-green-500 to-blue-500"></span>
                </h1>
            </div>


            <!-- CTA Box -->
            <div class="mt-10 bg-[#1a1f27] rounded-xl p-8 shadow-xl space-y-8 text-center text-white">
                <p class="mb-2 text-white">
                    Please Register Here
                </p>
                <a href="#"
                   class="inline-flex items-center justify-center rounded-full bg-[#25d366] hover:bg-[#1fb857] transition px-6 py-2 font-semibold shadow">
                    Registration Form
                </a>
            </div>

            <!-- Notes Section -->
            <div class="mt-6 bg-gray-100 rounded-xl p-6 shadow-lg">
                <h2 class="text-lg font-semibold mb-3">Notes:</h2>
                <ul class="list-disc list-inside space-y-1">
                    <li>Maximum number of pages for a normal paper is 6</li>
                    <li>To be eligible for the IEEE Member rate you must be an active IEEE Member</li>
                    <li>To be eligible for the student rate you must provide your student ID/Letter of proof</li>
                </ul>

                <h2 class="text-lg font-semibold mt-4 mb-2">The conference fee include:</h2>
                <ul class="list-disc list-inside">
                    <li>To be announced.</li>
                </ul>
            </div>

            <!-- Payment Methods -->
            <div class="mt-6 space-y-4 text-black leading-relaxed">
                <h1 class="text-3xl font-bold mb-3 text-center text-[#1a1f27]/95">Payment Methods</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <!-- Virtual Account -->
                <div class="bg-gray-100 rounded-xl p-6 shadow-lg">
                    <div class="flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full mb-4">
                        <span class="font-bold text-gray-700">1</span>
                    </div>
                    <h2 class="text-xl font-bold mb-3 text-center text-[#1a1f27]/95">Virtual Account</h2>
                    <ul class="list-disc list-inside text-black leading-relaxed">
                        <li><span class="font-semibold">Bank Name (in full):</span> Bank Negara Indonesia (PERSERO)</li>
                        <li><span class="font-semibold">Account Name:</span> Telkom University – ICOICT 2025</li>
                        <li><span class="font-semibold">Virtual Account Number:</span> 8321066202400127</li>
                    </ul>
                    <p class="text-red-600 mt-3 font-medium">
                        Important: Please include your paper ID information on the payment slip.
                    </p>
                </div>

                <!-- PayPal -->
                <div class="bg-gray-100 rounded-xl p-6 shadow-lg">
                    <div class="flex items-center justify-center w-8 h-8 bg-gray-200 rounded-full mb-4">
                        <span class="font-bold text-gray-700">2</span>
                    </div>
                    <h2 class="text-xl font-bold mb-3 text-center text-[#1a1f27]/95">PayPal</h2>
                    <ul class="list-disc list-inside text-black leading-relaxed">
                        <li><span class="font-semibold">PayPal Email Address:</span> kangandrian@telkomuniversity.ac.id</li>
                    </ul>
                    <p class="font-semibold text-black mt-3">Additional Information:</p>
                    <ol class="list-decimal list-inside text-black leading-relaxed">
                        <li>Transfer the full registration fee plus a 5% PayPal currency conversion fee.</li>
                        <li>Ensure the fee is transferred under the registrant’s name, clearly stated on the payment slip.</li>
                        <li>Include your paper ID information on the payment slip.</li>
                    </ol>
                </div>
            </div>

            <!-- Registration Procedures -->
            <div class="bg-gray-100 rounded-xl p-6 shadow-lg">
                <h2 class="text-xl font-bold mb-3 text-[#1a1f27]/95">Registration Procedures</h2>
                <ol class="list-decimal list-inside text-black leading-relaxed">
                    <li>Complete the payment according to the method of your choice.</li>
                    <li>Register for the conference using the following link:
                        <a href="https://tel-u.ac.id/icoict2025" class="text-sky-500 underline">
                            https://tel-u.ac.id/icoict2025
                        </a>
                    </li>
                    <li>If registering at the IEEE member or student rate, attach a copy of your IEEE member card or student card/verification letter.</li>
                    <li>Ensure all required information and supporting documents (e.g., payment proof/slip) are included before submitting the form.</li>
                </ol>
            </div>
        </div>
    </main>

@endsection