<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDAS Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'icoict-dark': '#2C3E50',
                        'icoict-darker': '#1A252F',
                        'icoict-green': '#2c61b8ff',
                        'icoict-green-dark': '#312492ff',
                    }
                }
            }
        }
    </script>
</head>
<body class="min-h-screen bg-gradient-to-br from-icoict-darker via-icoict-dark to-slate-700 flex items-center justify-center">
    <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl p-8">
        <!-- Logo Section -->
        <div class="flex flex-col items-center mb-6">
            <img src="{{ asset('images/EDASlogo.png') }}" alt="EDAS Logo" class="h-16 w-16 mb-3" />
            <h2 class="font-bold text-2xl mb-1 text-gray-800">EDAS Login</h2>
        </div>
        
        <!-- Login Form -->
        <div class="text-center mb-6">
            <p class="text-sm text-gray-600 mb-2">Login to access your conference account.</p>
            <p class="text-sm">
                <a href="#" class="text-icoict-green hover:text-icoict-green-dark hover:underline">Forgot password?</a>
                <span class="text-gray-400 mx-1">•</span>
                <a href="#" class="text-icoict-green hover:text-icoict-green-dark hover:underline">Reset</a>
            </p>
            <p class="text-sm mt-2">
                Need an account? 
                <a href="#" class="text-icoict-green hover:text-icoict-green-dark hover:underline font-medium">Create one</a>
            </p>
        </div>

        @if(session('success'))
        <div class="mb-4 text-green-700 bg-green-100 border border-green-400 px-4 py-2 rounded">
            {{ session('success') }}
        </div>
        @endif

        @if ($errors->any())
        <div class="mb-4 text-red-700 bg-red-100 border border-red-400 px-4 py-2 rounded">
            @foreach ($errors->all() as $error)
                <p class="text-sm">{{ $error }}</p>
            @endforeach
        </div>
        @endif

        <form method="POST" action="#" class="space-y-4">
            @csrf
            
            <!-- Email Field -->
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email address</label>
                <input 
                    type="email" 
                    id="email" 
                    name="email" 
                    placeholder="Enter your email"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-icoict-green focus:border-icoict-green outline-none transition-all"
                    required
                >
            </div>

            <!-- Password Field -->
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input 
                    type="password" 
                    id="password" 
                    name="password" 
                    placeholder="Enter your password"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-icoict-green focus:border-icoict-green outline-none transition-all"
                    required
                >
            </div>

            <!-- reCAPTCHA placeholder -->
            <div class="flex items-center justify-between bg-gray-50 p-3 rounded border">
                <div class="text-sm text-red-600">
                    <span class="font-medium">Localhost is not in the list of supported domains</span> for this site key.
                </div>
                <div class="text-xs text-gray-500">reCAPTCHA</div>
            </div>

            <!-- Login Button -->
            <button 
                type="submit" 
                class="w-full bg-gradient-to-r from-icoict-green to-icoict-green-dark text-white font-semibold py-3 px-4 rounded-lg hover:from-icoict-green-dark hover:to-icoict-green transform hover:scale-[1.02] transition-all duration-200 shadow-lg"
            >
                Log in
            </button>
        </form>

        <!-- Support Link -->
        <div class="text-center mt-6">
            <p class="text-sm text-gray-500">
                Need help? 
                <a href="#" class="text-icoict-green hover:text-icoict-green-dark hover:underline">Contact Support</a>
            </p>
        </div>
    </div>

    <!-- Background Pattern -->
    <div class="fixed inset-0 -z-10 overflow-hidden">
        <div class="absolute -top-40 -right-40 w-80 h-80 bg-icoict-green opacity-10 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-80 h-80 bg-icoict-green opacity-10 rounded-full blur-3xl"></div>
    </div>
</body>
</html>