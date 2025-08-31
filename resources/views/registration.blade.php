<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ICOICT 2025</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#0b0f14] text-slate-100 antialiased">

    <!-- Topbar / Navbar -->
    <nav class="bg-[#1a1f27]/95 backdrop-blur supports-backdrop-blur sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-5 py-4 flex items-center justify-between">
            <!-- Logo text gradient -->
            <a href="/"
                class="text-2xl font-extrabold tracking-wide bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent">
                ICOICT 2025
            </a>
            <div class="hidden md:flex items-center gap-8 font-semibold text-slate-200">
                <a href="#" class="hover:text-[#9ae6b4]">Call for Papers</a>
                <a href="#" class="hover:text-[#9ae6b4]">Speakers</a>
                <a href="#" class="hover:text-[#9ae6b4]">Committees</a>
                <a href="#" class="hover:text-[#9ae6b4]">Events</a>
                <a href="#" class="hover:text-[#9ae6b4]">For Authors</a>
            </div>
        </div>
    </nav>

    <!-- HERO -->
    <header class="min-h-screen flex items-center bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A]">

        <div class="max-w-7xl mx-auto px-5 py-16 md:py-20 grid md:grid-cols-2 gap-8 items-center">
            <div>
                <h1 class="text-5xl md:text-7xl lg:text-8xl font-extrabold leading-tight">
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
                    <div class="min-w-[95px] text-center">
                        <div class="text-5xl font-bold">{{ $val }}</div>
                        <div class="text-[11px] tracking-wider text-slate-300">{{ $label }}</div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </header>

      

    <!-- Footer (3 columns) -->
        <footer class="mt-10 bg-gradient-to-br from-[#0f172a] to-[#1f2937]">
            <div class="max-w-7xl mx-auto px-5 py-10 grid md:grid-cols-3 gap-6">
                <div class="rounded-xl bg-slate-900/40 ring-1 ring-white/10 p-6 text-center">
                    <div class="font-extrabold mb-2">ICoICT 2025 Organized By :</div>
                    <div class="text-slate-200">Telkom University Indonesia</div>
                    <div class="mt-2 text-slate-300 text-sm">Co – Hosts :<br />Multimedia University Malaysia</div>
                </div>

                <div class="rounded-xl bg-slate-900/40 ring-1 ring-white/10 p-6 text-center">
                    <div class="font-extrabold mb-2">Sponsored By :</div>
                    <div class="text-slate-200">IEEE Indonesia Section</div>
                </div>

                <div class="rounded-xl bg-slate-900/40 ring-1 ring-white/10 p-6 text-center">
                    <div class="font-extrabold mb-2">Visitors</div>
                    <div class="text-slate-300 text-sm">[Flag counter / analytics placeholder]</div>
                </div>
            </div>
        </footer>

</body>

</html>