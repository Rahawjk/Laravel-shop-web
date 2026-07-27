<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login — NOTA.</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #faf8f5; }
        .text-gold { color: #a67c52; }
        .bg-gold { background-color: #a67c52; }
        .border-gold { border-color: #d4c5a9; }
    </style>
</head>
<body class="antialiased">

<div class="min-h-screen flex items-center justify-center px-4">
    <div class="bg-white rounded-3xl shadow-2xl p-8 max-w-md w-full border border-gold/10">

        <div class="text-center mb-8">
            <a href="/" class="text-3xl font-light tracking-widest text-gray-800">
                NOTA<span class="text-gold">.</span>
            </a>
            <p class="text-sm text-gray-400 mt-2">Sign in to your account</p>
        </div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mb-6">
                <label class="flex items-center">
                    <input type="checkbox" name="remember" class="rounded border-gray-300 text-gold focus:ring-gold" />
                    <span class="ml-2 text-sm text-gray-600">Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-sm text-gold hover:underline">
                    Forgot password?
                </a>
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('register') }}" class="text-sm text-gold hover:underline">
                    Don't have an account?
                </a>
                <button type="submit" class="bg-gold hover:bg-[#8b6b3f] text-white font-medium py-3 px-8 rounded-full transition shadow-md">
                    Sign In
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>