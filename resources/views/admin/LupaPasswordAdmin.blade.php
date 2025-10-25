<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Admin Password</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

    <div class="w-full max-w-md bg-gradient-to-br from-[#0f172a] to-[#1f2937] p-8 rounded-2xl shadow-xl">
        <h2 class="text-2xl font-bold text-center text-white mb-6">Forgot Admin Password</h2>

        @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded-lg mb-4 text-center">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="bg-red-600 text-white p-3 rounded-lg mb-4 text-center">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.password.sendCode') }}" method="POST" class="space-y-4">
            @csrf
            <p class="text-sm text-slate-300 mb-2 text-center">
                Enter your email to receive a verification code.
            </p>
            <div>
                <input type="email" name="email" placeholder="Email"
                    class="w-full px-4 py-2 border border-slate-600 bg-slate-800/50 text-slate-200 rounded-lg focus:ring-2 focus:ring-[#1dd1a1] focus:outline-none placeholder-slate-400"
                    required>
            </div>
            <button type="submit"
                class="w-full bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold py-2 rounded-lg hover:opacity-90 transition">Send
                Verification Code</button>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('admin.login') }}" class="text-sm text-[#38bdf8] hover:underline">← Back to Login</a>
        </div>
    </div>

</body>

</html>