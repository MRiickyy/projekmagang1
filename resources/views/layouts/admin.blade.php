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
    .sidebar {
        transition: width 0.5s ease, transform 0.5s ease;
    }

    .sidebar-closed {
        transform: translateX(-100%);
    }
    </style>


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

    <div x-data="{ openAuthors: false, openCommittees: false }" class="flex min-h-screen w-full">

        <!-- Sidebar -->
        <aside id="sidebar" class="sidebar w-64 bg-[#1a1f27]/95 shadow-md text-white flex flex-col fixed h-full z-20">
            <div class="px-6 py-6 text-lg font-bold border-b border-gray-700">
                Dashboard Admin
            </div>

            <div class="p-4">
                <form action="{{ route('admin.setEvent') }}" method="POST">
                    @csrf
                    <label for="eventSelect" class="text-sm font-semibold text-white mb-2 block">
                        Select Event
                    </label>
                    <div class="flex items-center space-x-2">
                        <select name="event_id" id="eventSelect"
                            class="bg-gray-800 text-white text-sm rounded px-2 py-1 w-full"
                            onchange="this.form.submit()">
                            @foreach(\App\Models\Event::orderBy('name', 'asc')->orderBy('year', 'asc')->get() as $event)
                            <option value="{{ $event->id }}"
                                {{ session('selected_event_id') == $event->id ? 'selected' : '' }}>
                                {{ $event->name }} {{ $event->year }}
                            </option>
                            @endforeach
                        </select>

                        <button type="button"
                            onclick="document.getElementById('addEventModal').classList.remove('hidden')"
                            class="bg-blue-600 hover:bg-blue-700 text-white px-2 py-1 rounded text-sm">
                            +
                        </button>
                    </div>
                </form>
            </div>



            {{-- Modal Tambah Event --}}
            <div id="addEventModal"
                class="hidden fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center">
                <div class="bg-white rounded-lg p-6 w-96 shadow-lg">
                    <h3 class="text-lg font-semibold mb-4 text-gray-800">Add New Event Year</h3>

                    <form action="{{ route('admin.addEvent') }}" method="POST">
                        @csrf

                        {{-- Event Name otomatis ICOICT --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Event Name</label>
                            <input type="text" name="name" placeholder="Enter event name"
                                class="border border-gray-300 w-full rounded px-3 py-2 text-sm text-gray-900 bg-white  focus:outline-none focus:ring-2 focus:ring-blue-400"
                                required>

                        </div>

                        {{-- Dropdown tahun --}}
                        <div class="mb-4">
                            <label class="block text-sm font-medium text-gray-700 mb-1">Year</label>
                            @php
                            $currentYear = date('Y');
                            @endphp
                            <div class="relative">
                                <select name="year" required
                                    class="appearance-none border border-gray-300 w-full rounded px-3 py-2 text-sm text-gray-900 bg-white focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    <option value="" disabled selected hidden>Select year</option>

                                    {{-- Tampilkan tahun dari sekarang sampai +5 tahun ke depan --}}
                                    @for ($i = 0; $i <= 5; $i++) <option value="{{ $currentYear + $i }}">
                                        {{ $currentYear + $i }}</option>
                                        @endfor
                                </select>

                                {{-- Panah bawah --}}
                                <svg class="absolute right-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-500 pointer-events-none"
                                    fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 9l6 6 6-6" />
                                </svg>
                            </div>

                        </div>

                        {{-- Tombol aksi --}}
                        <div class="flex justify-end space-x-2">
                            <button type="button"
                                onclick="document.getElementById('addEventModal').classList.add('hidden')"
                                class="px-4 py-2 bg-gray-300 hover:bg-gray-400 text-gray-800 rounded text-sm transition">Cancel</button>

                            <button type="submit"
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded text-sm transition">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <nav class="flex-1 px-4 py-6 space-y-3 text-sm">
                <a href="{{ route('admin.header.list_header') }}"
                    class="block px-3 py-2 rounded {{ request()->routeIs('admin.header.list_header') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">Header</a>
                <a href="{{ route('admin.footer.list') }}"
                    class="block px-3 py-2 rounded {{ request()->routeIs('admin.footer.list') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">Footer</a>
                <a href="{{ route('admin.list_home_contents_admin') }}"
                    class="block px-3 py-2 rounded {{ request()->routeIs('admin.list_home_contents_admin') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">Home
                    Contents</a>
                <a href="{{ route('admin.list_callpaper_Admin') }}"
                    class="block px-3 py-2 rounded {{ request()->routeIs('admin.list_callpaper_Admin') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">Call
                    For Paper</a>
                <!-- SPEAKERS -->
                @php
                $isSpeakersActive = request()->routeIs('admin.speakers.*');
                @endphp
                <div x-data="{ open: {{ $isSpeakersActive ? 'true' : 'false' }} }" class="mt-2">
                    <button @click="open = !open"
                        class="flex items-center justify-between w-full px-3 py-2 rounded focus:outline-none
                        border {{ $isSpeakersActive ? 'border-white bg-[#1e293b]' : 'border-transparent hover:bg-[#334155]' }}">
                        <span>Speakers</span>
                        <svg :class="{'rotate-90': open}" class="w-3 h-3 transition-transform" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div x-show="open" x-collapse class="ml-4 space-y-2 mt-2">
                        <a href="{{ route('admin.speakers.keynote') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('admin.speakers.keynote') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">
                            Keynote Speakers
                        </a>
                        <a href="{{ route('admin.speakers.tutorial') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('admin.speakers.tutorial') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">
                            Tutorial Speakers
                        </a>
                    </div>
                </div>

                <!-- COMMITTEES -->
                @php
                $isCommitteesActive = request()->routeIs('admin.committees.*');
                @endphp
                <div x-data="{ open: {{ $isCommitteesActive ? 'true' : 'false' }} }" class="mt-2">
                    <button @click="open = !open"
                        class="flex items-center justify-between w-full px-3 py-2 rounded focus:outline-none
                        border {{ $isCommitteesActive ? 'border-white bg-[#1e293b]' : 'border-transparent hover:bg-[#334155]' }}">
                        <span>Committees</span>
                        <svg :class="{'rotate-90': open}" class="w-3 h-3 transition-transform" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div x-show="open" x-collapse class="ml-4 space-y-2 mt-2">
                        <a href="{{ route('admin.committees.steering') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('admin.committees.steering') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">
                            Steering Committee
                        </a>
                        <a href="{{ route('admin.committees.technical_program') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('admin.committees.technical_program') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">
                            Technical Program Committee
                        </a>
                        <a href="{{ route('admin.committees.organizing') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('admin.committees.organizing') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">
                            Organizing Committee
                        </a>
                    </div>
                </div>

                <!-- FOR AUTHORS -->
                @php
                $isAuthorsActive = request()->routeIs('admin.forauthor.*') ||
                request()->routeIs('admin.list_contacts_Admin');
                @endphp
                <div x-data="{ open: {{ $isAuthorsActive ? 'true' : 'false' }} }" class="mt-2">
                    <button @click="open = !open"
                        class="flex items-center justify-between w-full px-3 py-2 rounded focus:outline-none
                        border {{ $isAuthorsActive ? 'border-white bg-[#1e293b]' : 'border-transparent hover:bg-[#334155]' }}">
                        <span>For Authors</span>
                        <svg :class="{'rotate-90': open}" class="w-3 h-3 transition-transform" fill="none"
                            stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>

                    <div x-show="open" x-collapse class="ml-4 space-y-2 mt-2">
                        <a href="{{ route('admin.forauthor.list_authorinformation_admin') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('admin.forauthor.list_authorinformation_admin') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">
                            Author Informations
                        </a>
                        <a href="{{ route('admin.forauthor.list_registrations_admin') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('admin.forauthor.list_registrations_admin') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">
                            Registration
                        </a>
                        <a href="{{ route('admin.list_contacts_Admin') }}"
                            class="block px-3 py-2 rounded {{ request()->routeIs('admin.list_contacts_Admin') ? 'bg-green-600' : 'hover:bg-[#334155]' }}">
                            Contacts
                        </a>
                    </div>
                </div>
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
                        @if(session('admin_logged_in'))
                        <span>Selamat datang, <strong>{{ session('admin_username') }}</strong></span>
                        @endif

                        @php
                        $eventName = session('selected_event_name') ?? 'SAIN IJAIN';
                        $eventYear = session('selected_event_year') ?? 2025;
                        @endphp

                        <a href="{{ route('home', [
                            'event_name' => $eventName,
                            'event_year' => $eventYear,
                        ]) }}" class="hover:underline">
                            Go To The Website
                        </a>
                        <a href="{{ route('admin.login') }}" class="hover:underline">Logout</a>
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

    <!-- Delete Confirmation -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const deleteForms = document.querySelectorAll('.delete-item');

        if (deleteForms.length > 0) {
            deleteForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    e.preventDefault();

                    Swal.fire({
                        title: 'Are you sure?',
                        text: "This action cannot be undone!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes, delete it!',
                        cancelButtonText: 'No, cancel'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            form.submit();
                        }
                    });
                });
            });
        }
    });
    </script>
</body>

</html>