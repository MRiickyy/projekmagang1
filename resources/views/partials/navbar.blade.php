<!-- Topbar / Navbar -->
<nav class="bg-[#1a1f27]/95 backdrop-blur supports-backdrop-blur sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-5 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="/"
            class="text-2xl font-extrabold tracking-wide bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] bg-clip-text text-transparent">
            ICOICT 2025
        </a>

        <!-- Menu -->
        <div class="hidden md:flex items-center gap-8 font-semibold text-slate-200">
            <a href="/callpaper" class="hover:text-[#9ae6b4]">Call for Papers</a>

            <!-- Speakers dengan dropdown -->
            <div class="relative">
                <button id="dropdownBtn" class="hover:text-[#9ae6b4] flex items-center gap-1">
                    Speakers
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownMenu"
                    class="absolute left-0 mt-2 w-40 bg-[#1a1f27] text-white rounded-md shadow-lg hidden">
                    <a href="/keynote-speaker" class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Keynote Speakers</a>
                    <a href="/tutorial-speaker" class="block px-4 py-2 text-sm hover:bg-[#2d3748]">Tutorial Speakers</a>
                </div>
            </div>

            <a href="#" class="hover:text-[#9ae6b4]">Committees</a>
            <a href="#" class="hover:text-[#9ae6b4]">Events</a>
            <a href="/author" class="hover:text-[#9ae6b4]">For Authors</a>
        </div>
    </div>
</nav>
<script>
    const dropdownBtn = document.getElementById("dropdownBtn");
    const dropdownMenu = document.getElementById("dropdownMenu");

    dropdownBtn.addEventListener("click", () => {
        dropdownMenu.classList.toggle("hidden");
    });

    // Optional: klik di luar untuk nutup dropdown
    document.addEventListener("click", (e) => {
        if (!dropdownBtn.contains(e.target) && !dropdownMenu.contains(e.target)) {
            dropdownMenu.classList.add("hidden");
        }
    });
</script>