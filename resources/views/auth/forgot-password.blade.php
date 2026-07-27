<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Reset Password — NOTA.</title>
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
            <p class="text-sm text-gray-400 mt-2">Reset your password</p>
        </div>

        @if (session('status'))
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm mb-4">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition" />
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex items-center justify-between">
                <a href="{{ route('login') }}" class="text-sm text-gold hover:underline">
                    Back to login
                </a>
                <button type="submit" class="bg-gold hover:bg-[#8b6b3f] text-white font-medium py-3 px-8 rounded-full transition shadow-md">
                    Send Reset Link
                </button>
            </div>
        </form>
    </div>
</div>

</body>
</html>