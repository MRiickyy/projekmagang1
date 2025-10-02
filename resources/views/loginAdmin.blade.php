<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex items-center justify-center h-screen bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

    <div class="w-full max-w-sm bg-gradient-to-br from-[#0f172a] to-[#1f2937] p-8 rounded-2xl shadow-xl">
        <h2 class="text-2xl font-bold text-center text-white mb-6">
            Admin ICOICT
        </h2>

        <form class="space-y-4">
            <div>
                <input type="text" name="username" placeholder="Username"
                    class="w-full px-4 py-2 border border-slate-600 bg-slate-800/50 text-slate-200 rounded-lg focus:ring-2 focus:ring-[#1dd1a1] focus:outline-none placeholder-slate-400">
            </div>
            <div>
                <input type="password" name="password" placeholder="Password"
                    class="w-full px-4 py-2 border border-slate-600 bg-slate-800/50 text-slate-200 rounded-lg focus:ring-2 focus:ring-[#1dd1a1] focus:outline-none placeholder-slate-400">
            </div>
            <button type="button"
                class="w-full bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold py-2 rounded-lg hover:opacity-90 transition">
                Login
            </button>
        </form>

        <div class="mt-4 text-center">
            <a href="#" class="text-sm text-[#38bdf8] hover:underline">Lupa Password?</a>
        </div>
        <div class="mt-2 text-center">
            <a href="{{ url('/') }}" class="text-sm text-slate-300 hover:underline">← Kembali ke Website Utama</a>
        </div>
    </div>

</body>
</html>
