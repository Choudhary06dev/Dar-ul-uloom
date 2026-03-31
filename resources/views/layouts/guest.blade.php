<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700\u0026family=Playfair+Display:wght@700;800\u0026display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --primary-green: #064e3b; /* Dark Green from logo */
                --accent-gold: #c5a059;   /* Gold from logo */
                --soft-cream: #fdfbf7;    /* Soft background from logo */
            }
            html, body {
                width: 100%;
                height: 100%;
                overflow: hidden !important;
                margin: 0;
                padding: 0;
            }

            body {
                font-family: 'Plus Jakarta Sans', sans-serif;
                background-color: var(--soft-cream);
                background-attachment: fixed;
                position: relative;
                overflow-x: hidden;
            }
            .auth-watermark {
                position: fixed;
                inset: 0;
                background-image: url("{{ asset('images/logo.png') }}");
                background-repeat: no-repeat;
                background-position: center;
                background-size: 50%; /* Larger, better framing */
                opacity: 0.25; /* Now clearly visible */
                z-index: -1;
                pointer-events: none;
            }
            .auth-container {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 1rem;
                position: relative;
                z-index: 10;
            }
            .auth-card {
                background: rgba(255, 255, 255, 0.96);
                border: 1px solid rgba(6, 78, 59, 0.1);
                border-top: 6px solid var(--primary-green);
                border-radius: 28px;
                box-shadow: 0 50px 100px -20px rgba(6, 78, 59, 0.15), 0 30px 60px -30px rgba(0, 0, 0, 0.2);
                width: 100%;
                max-width: 680px; /* Increased width */
                padding: 24px 32px; /* Decreased internal height */
                backdrop-filter: blur(8px);
                transition: all 0.3s ease;
            }

            @media (max-width: 640px) {
                .auth-card {
                    padding: 20px 20px; /* More room for content on mobile */
                    border-radius: 20px;
                }
            }

            .brand-text {
                font-family: 'Playfair Display', serif;
                font-weight: 800;
                color: var(--primary-green);
                letter-spacing: -0.01em;
            }
            .gold-accent {
                color: var(--accent-gold);
            }
            .primary-btn {
                background-color: var(--primary-green);
                color: white !important;
                transition: all 0.3s ease;
            }
            .primary-btn:hover {
                background-color: #043d2e;
                transform: translateY(-2px);
                box-shadow: 0 10px 20px -5px rgba(6, 78, 59, 0.3);
            }
        </style>
    </head>
    <body class="antialiased bg-fixed">
        @unless(request()->routeIs('admin.*'))
            @include('layouts.partials.header')
        @endunless

        <div class="auth-watermark"></div>
        
        <div class="auth-container">
            <div class="mb-6 text-center"> <!-- Reduced margin -->
                <a href="/" class="flex flex-col items-center">
                    <span class="text-2xl md:text-3xl brand-text uppercase md:tracking-widest tracking-wider leading-none">Dar-ul-uloom</span>
                    <span class="text-[9px] md:text-[10px] font-bold gold-accent tracking-[0.2em] md:tracking-[0.4em] mt-1">ANWAAR-E-MUSTAFA</span>
                </a>
            </div>

            <div class="auth-card">
                {{ $slot }}
            </div>

            <p class="mt-8 text-[9px] md:text-[10px] text-slate-400 font-bold tracking-widest uppercase text-center px-4">
                Knowledge • Faith • Excellence
            </p>
        </div>

        @unless(request()->routeIs('admin.*'))
            @include('layouts.partials.footer')
        @endunless
    </body>
</html>


