<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

    <!-- Sidebar -->
    @include('layouts.admin.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Navbar -->
        @include('layouts.admin.navbar')

        <!-- Page Content -->
        <main class="flex-1 px-6 py-10">
            @yield('content')
        </main>
    </div>

</body>
</html>
