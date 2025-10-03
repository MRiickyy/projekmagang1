<header class="bg-[#1a1f27]/95 backdrop-blur shadow-md">
    <div class="max-w-7xl mx-auto px-6 py-5 flex justify-between items-center">
        <h1 class="text-xl font-bold">@yield('title', 'Admin Dashboard')</h1>
        <div class="space-x-6 text-sm">
            <span>Selamat datang, <strong>Budi</strong></span>
            <a href="{{ url('/') }}" class="hover:underline">Lihat website</a>
            <a href="#" class="hover:underline">Logout</a>
        </div>
    </div>
</header>
