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
                        class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Keynote Speakers</a>
                    <a href="{{ route('tutorial.speakers', ['event_year' => $eventYear]) }}"
                        class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Tutorial Speakers</a>
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
                        class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Steering Committees</a>
                    <a href="{{ route('technical.committees', ['event_year' => $eventYear]) }}"
                        class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Technical Program Committees</a>
                    <a href="{{ route('organizing.committees', ['event_year' => $eventYear]) }}"
                        class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Organizing Committees</a>

                    <a href="/steering-committees" class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Steering
                        Committees</a>
                    <a href="/technical-committees" class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Technical
                        Program
                        Committees</a>
                    <a href="/organizing-committees" class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Organizing
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
                    <a href="/author-information" class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Author
                        Information</a>
                    <a href="/registration" class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Registration</a>
                    <a href="/contacts" class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Contacts</a>
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