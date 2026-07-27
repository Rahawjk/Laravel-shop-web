<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Confirm Password — NOTA.</title>
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
            <p class="text-sm text-gray-400 mt-2">Please confirm your password</p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <div class="mb-6">
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" type="password" name="password" required
                       class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-gold focus:ring focus:ring-gold/20 outline-none transition" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <button type="submit" class="w-full bg-gold hover:bg-[#8b6b3f] text-white font-medium py-3 rounded-full transition shadow-md">
                Confirm Password
            </button>
        </form>
    </div>
</div>

</body>
</html>