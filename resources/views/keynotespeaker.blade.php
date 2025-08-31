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

<!-- SPEAKERS -->
<section class="max-w-5xl mx-auto my-12 px-6">
    <h3 class="text-center text-2xl font-bold mb-10">KEYNOTE SPEAKERS</h3>

    <!-- CARD -->
    <div class="bg-white rounded-lg shadow-md flex items-start mb-6 overflow-hidden">
        <img src="https://2025.icoict.org/wp-content/uploads/sites/13/2024/11/Eisuke-Kita-1.png"
            alt="Prof. Eisuke Kita" class="w-40 h-40 object-cover rounded-xl m-4">
        <div class="flex flex-col justify-between p-4 flex-1">
            <div>
                <h4 class="text-lg font-bold mb-2">Prof. Eisuke Kita | Nagoya University</h4>
                <div class="relative">
                    <p id="desc"
                        class="text-sm leading-relaxed max-h-24 overflow-hidden transition-all duration-500">
                        Prof. <strong>Eisuke Kita</strong> (北 栄祐) is a dean and a professor at the Graduate School of Informatics
                        of <strong>Nagoya University</strong>. He received his Doctor of Engineering degree from the Graduate
                        School of Engineering of Nagoya University. His research fields include mathematical model of vehicle
                        platoon and traffic flow control. Prof. Kita has also contributed to various international collaborations
                        in traffic systems...
                    </p>

                    <!-- Fade putih di bawah -->
                    <div id="fade"
                        class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
                </div>
            </div>
            <a href="#"
                class="self-end bg-[#0a2a43] hover:bg-[#103d60] text-white px-5 py-2 rounded-full text-sm flex items-center gap-2">
                Read More
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>

    <!-- COPY CARD -->
    <div class="bg-white rounded-lg shadow-md flex items-start mb-6 overflow-hidden">
        <img src="https://via.placeholder.com/150" alt="Speaker 2" class="w-40 h-40 object-cover rounded-xl m-4">
        <div class="flex flex-col justify-between p-4 flex-1">
            <div>
                <h4 class="text-lg font-bold mb-2">Prof. John Doe | Example University</h4>
                <div class="relative">
                    <p id="desc"
                        class="text-sm leading-relaxed max-h-24 overflow-hidden transition-all duration-500">
                        Prof. <strong>Eisuke Kita</strong> (北 栄祐) is a dean and a professor at the Graduate School of Informatics
                        of <strong>Nagoya University</strong>. He received his Doctor of Engineering degree from the Graduate
                        School of Engineering of Nagoya University. His research fields include mathematical model of vehicle
                        platoon and traffic flow control. Prof. Kita has also contributed to various international collaborations
                        in traffic systems...
                    </p>

                    <!-- Fade putih di bawah -->
                    <div id="fade"
                        class="absolute bottom-0 left-0 right-0 h-12 bg-gradient-to-t from-white to-transparent pointer-events-none"></div>
                </div>
            </div>
            <a href="#"
                class="self-end bg-[#0a2a43] hover:bg-[#103d60] text-white px-5 py-2 rounded-full text-sm flex items-center gap-2">
                Read More
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
            </a>
        </div>
    </div>

</section>
@endsection