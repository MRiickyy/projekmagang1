<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body
    class="flex items-center justify-center min-h-screen bg-gradient-to-r from-[#1E293B] via-[#334155] to-[#0F172A] text-slate-100">

    <div class="w-full max-w-md bg-gradient-to-br from-[#0f172a] to-[#1f2937] p-8 rounded-2xl shadow-xl">
        <h2 class="text-2xl font-bold text-center text-white mb-6">Reset Password Admin</h2>

        @if(session('success'))
        <div class="bg-green-600 text-white p-3 rounded-lg mb-4 text-center">{{ session('success') }}</div>
        @endif
        @if(session('error'))
        <div class="bg-red-600 text-white p-3 rounded-lg mb-4 text-center">{{ session('error') }}</div>
        @endif

        <form action="{{ route('admin.password.reset') }}" method="POST" class="space-y-4">
            @csrf
            <input type="hidden" name="email" value="{{ session('email') }}">
            <p class="text-sm text-slate-300 mb-2 text-center">
                Enter the code from your email and create a new password for admin.
            </p>

            <div>
                <input type="text" name="token" placeholder="Verification Code"
                    class="w-full px-4 py-2 border border-slate-600 bg-slate-800/50 text-slate-200 rounded-lg focus:ring-2 focus:ring-[#1dd1a1] focus:outline-none placeholder-slate-400"
                    required>
            </div>
            <div>
                <input type="password" name="password" placeholder="New Password"
                    class="w-full px-4 py-2 border border-slate-600 bg-slate-800/50 text-slate-200 rounded-lg focus:ring-2 focus:ring-[#1dd1a1] focus:outline-none placeholder-slate-400"
                    required>
                @error('password')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            <div>
                <input type="password" name="password_confirmation" placeholder="Confirm New Password"
                    class="w-full px-4 py-2 border border-slate-600 bg-slate-800/50 text-slate-200 rounded-lg focus:ring-2 focus:ring-[#1dd1a1] focus:outline-none placeholder-slate-400"
                    required>
            </div>


            <button type="submit"
                class="w-full bg-gradient-to-r from-[#00e676] via-[#1dd1a1] to-[#38bdf8] text-black font-semibold py-2 rounded-lg hover:opacity-90 transition">Save
                New Password</button>

            <a href="{{ route('admin.password.form') }}"
                class="block w-full text-center bg-slate-700 text-slate-200 py-2 rounded-lg hover:bg-slate-600 transition mt-2">←
                Resend Code / Change Email</a>
        </form>

        <div class="mt-4 text-center">
            <a href="{{ route('admin.login') }}" class="text-sm text-[#38bdf8] hover:underline">← Back to Login</a>
        </div>
    </div>

</body>

</html>