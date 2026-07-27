<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Verify Email — NOTA.</title>
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
            <p class="text-sm text-gray-400 mt-2">Verify your email</p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl text-sm mb-4">
                A new verification link has been sent to your email.
            </div>
        @endif

        <p class="text-gray-600 text-sm mb-6">
            Thanks for signing up! Before getting started, please verify your email address by clicking the link we sent you.
        </p>

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf
            <button type="submit" class="w-full bg-gold hover:bg-[#8b6b3f] text-white font-medium py-3 rounded-full transition shadow-md mb-4">
                Resend Verification Email
            </button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="w-full text-sm text-gray-500 hover:text-gray-700 transition">
                Log Out
            </button>
        </form>
    </div>
</div>

</body>
</html>