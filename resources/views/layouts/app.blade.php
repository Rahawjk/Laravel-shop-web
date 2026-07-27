<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>@yield('title', 'NOTA. — Fine Fragrance')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,600;14..32,700&display=swap"
        rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #faf8f5;
        }

        .bg-cream {
            background-color: #f5efe8;
        }

        .text-gold {
            color: #a67c52;
        }

        .border-gold {
            border-color: #d4c5a9;
        }

        .bg-gold {
            background-color: #a67c52;
        }

        .hover-gold:hover {
            background-color: #a67c52;
            color: white;
        }

        .logo-dot {
            color: #a67c52;
            font-weight: 300;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-up {
            animation: fadeUp 0.8s ease-out both;
        }

        @keyframes pingSlow {

            75%,
            100% {
                transform: scale(2);
                opacity: 0;
            }
        }

        .animate-ping-slow {
            animation: pingSlow 2s cubic-bezier(0, 0, 0.2, 1) infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-10px);
            }
        }

        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
    @stack('styles')
</head>

<body class="antialiased">

    @include('partials.header')
    @include('partials.toast')


    <main>
        @yield('content')
    </main>

    @include('partials.footer')

    @stack('scripts')
</body>

</html>