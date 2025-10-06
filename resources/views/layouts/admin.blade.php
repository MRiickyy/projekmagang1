<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- Alpine.js untuk sidebar submenu -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>



    <style>
    /* Animasi transisi sidebar */
    .sidebar {
        transition: width 0.5s ease, transform 0.5s ease;
    }

    .sidebar-closed {
        transform: translateX(-100%);
    }
    </style>

    <!-- Script untuk tab Messages, Infos, Locations -->
    <script>
    function openTab(evt, tabName) {
        let tabcontent = document.getElementsByClassName("tabcontent");
        for (let i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        let tablinks = document.getElementsByClassName("tablink");
        for (let i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove("border-b-2", "border-teal-400", "text-teal-400");
        }

        document.getElementById(tabName).style.display = "block";
        evt.currentTarget.classList.add("border-b-2", "border-teal-400", "text-teal-400");
    }

    window.onload = function() {
        document.getElementById("defaultOpen").click();
    }
    </script>
</head>

<body class="min-h-screen flex bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

    <div x-data="{ openAuthors: false }" class="flex min-h-screen w-full">

        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar w-64 bg-[#1a1f27]/95 shadow-md text-white flex flex-col fixed h-full z-20">
            <div class="px-6 py-6 text-lg font-bold border-b border-gray-700">
                Dashboard Admin
            </div>

            <nav class="flex-1 px-4 py-6 space-y-3 text-sm">
                <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Dashboard</a>
                <a href="{{ route('admin.list_home_contents_admin') }}"
                    class="block px-3 py-2 rounded {{ request()->routeIs('admin.list_home_contents_admin') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">Home
                    Contents</a>
                <a href="{{ route('admin.callpaper') }}"
                    class="block px-3 py-2 rounded {{ request()->routeIs('admin.callpaper') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">Call For Paper</a>
                <a href="{{ route('admin.speakers') }}"
                    class="block px-3 py-2 rounded {{ request()->routeIs('admin.speakers') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">Speakers</a>
                <a href="{{ route('admin.committees') }}"
                    class="block px-3 py-2 rounded {{ request()->routeIs('admin.committees') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">Committees</a>

                <!-- Submenu For Authors -->
                <button @click="openAuthors = !openAuthors"
                    class="flex items-center justify-between w-full px-3 py-2 rounded hover:bg-[#334155] focus:outline-none">
                    <span>For Authors</span>
                    <svg :class="{'rotate-90': openAuthors}" class="w-3 h-3 transition-transform" fill="none"
                        stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                    </svg>
                </button>
                <div x-show="openAuthors" x-collapse class="ml-4 space-y-2 mt-2">
                    <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Author Informations</a>
                    <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Registration</a>
                    <a href="#" class="block px-3 py-2 rounded text-[#00e676] font-semibold">Contacts</a>
                </div>

                <a href="#" class="block px-3 py-2 rounded hover:bg-[#334155]">Events</a>
            </nav>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col ml-64 transition-all duration-300" id="mainContent">

            <!-- Navbar -->
            <header class="bg-[#1a1f27]/95 text-white shadow-md">
                <div class="px-6 py-4 flex justify-between items-center">
                    <div class="flex items-center space-x-4">
                        <!-- Toggle Button -->
                        <button id="toggleSidebar"
                            class="px-3 py-2 bg-gray-700 rounded hover:bg-gray-600 focus:outline-none">
                            ☰
                        </button>
                        <h1 class="text-xl font-bold">@yield('title')</h1>
                    </div>
                    <div class="space-x-6 text-sm">
                        <span>Selamat datang, <strong>admin123</strong></span>
                        <a href="/" class="hover:underline">Lihat website</a>
                        <a href="#" class="hover:underline">Logout</a>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 px-6 py-10">

                @yield('content')

            </main>
        </div>
    </div>

    <!-- Sidebar Toggle Script -->
    <script>
    const toggleBtn = document.getElementById("toggleSidebar");
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("mainContent");

    let sidebarOpen = true;

    toggleBtn.addEventListener("click", () => {
        sidebarOpen = !sidebarOpen;

        if (!sidebarOpen) {
            sidebar.classList.add("sidebar-closed");
            mainContent.classList.remove("ml-64");
            mainContent.classList.add("ml-0");
        } else {
            sidebar.classList.remove("sidebar-closed");
            mainContent.classList.remove("ml-0");
            mainContent.classList.add("ml-64");
        }
    });
    </script>

</body>

</html>