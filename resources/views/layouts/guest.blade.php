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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            :root {
                --primary-green: #064e3b; /* Dark Green from logo */
                --accent-gold: #c5a059;   /* Gold from logo */
                --soft-cream: #fdfbf7;    /* Soft background from logo */
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
                background-size: contain;
                opacity: 0.1; /* Slightly more visible as it's the full background */
                z-index: -1;
                pointer-events: none;
            }
            .auth-container {
                min-height: 100vh;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                padding: 1.5rem;
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
                max-width: 460px;
                padding: 40px 48px;
                backdrop-filter: blur(8px);
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
    <body class="antialiased bg-[url('/images/abstract-bg.svg')] bg-cover bg-fixed">
        @include('layouts.partials.header')

        <div class="auth-watermark"></div>
        
        <div class="auth-container">
            <div class="mb-10 text-center">
                <a href="/" class="flex flex-col items-center">
                    <span class="text-3xl brand-text uppercase tracking-widest">Dar-ul-uloom</span>
                    <span class="text-sm font-bold gold-accent tracking-[0.3em] mt-1">ANWAAR-E-MUSTAFA</span>
                </a>
            </div>

            <div class="auth-card">
                {{ $slot }}
            </div>

            <p class="mt-10 text-xs text-slate-400 font-bold tracking-widest uppercase">
                Knowledge • Faith • Excellence
            </p>
        </div>

        @include('layouts.partials.footer')
    </body>
</html>


