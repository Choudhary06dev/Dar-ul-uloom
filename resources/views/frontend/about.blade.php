@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')
<!-- Page Header -->
<section class="py-20 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 opacity-20 islamic-pattern"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">About Our Center</h1>
        <div class="flex justify-center items-center text-gold space-x-2 text-sm uppercase tracking-widest font-bold">
            <a href="{{ route('frontend.index') }}" class="hover:text-white transition">Home</a>
            <span>/</span>
            <span class="text-white">About Us</span>
        </div>
    </div>
</section>

<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-start">
            <div>
                <img src="{{ asset('assets/images/about.png') }}" alt="About" class="rounded-lg shadow-xl mb-8">
                <div class="grid grid-cols-2 gap-4">
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-gold">
                        <div class="text-3xl font-bold text-navy mb-2">20+</div>
                        <div class="text-gray-500 text-sm uppercase tracking-wider">Years Experience</div>
                    </div>
                    <div class="bg-gray-50 p-6 rounded-lg border-l-4 border-gold">
                        <div class="text-3xl font-bold text-navy mb-2">50+</div>
                        <div class="text-gray-500 text-sm uppercase tracking-wider">Scholar Awards</div>
                    </div>
                </div>
            </div>
            <div>
                <h4 class="text-gold font-semibold tracking-widest uppercase mb-4">Our History</h4>
                <h2 class="text-4xl font-bold text-navy mb-8">Serving the Community Since 2004</h2>
                <p class="text-gray-600 mb-6 leading-relaxed">
                    Dar-ul-uloom was established with the noble intention of providing a holistic Islamic environment for both children and adults. Over the years, we have grown into a hub of spiritual rejuvenation and academic excellence.
                </p>
                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-gold/10 flex items-center justify-center text-gold shrink-0 mr-4">
                            <i class="fas fa-eye"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-navy mb-2">Our Vision</h3>
                            <p class="text-gray-600">To be a leading center for Islamic learning that inspires individuals to reach their full potential and contribute positively to society.</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-12 h-12 rounded-full bg-gold/10 flex items-center justify-center text-gold shrink-0 mr-4">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-navy mb-2">Our Mission</h3>
                            <p class="text-gray-600">To provide authentic Islamic education, foster community engagement, and promote the true values of Islam through service and compassion.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
