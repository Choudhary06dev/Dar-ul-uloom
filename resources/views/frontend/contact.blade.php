@extends('layouts.frontend')

@section('title', 'Contact Us')

@section('content')
<!-- Page Header -->
<section class="py-12 md:py-20 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 opacity-20 islamic-pattern"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-3xl md:text-5xl font-bold text-white mb-4">Contact Us</h1>
        <div class="flex justify-center items-center text-gold space-x-2 text-sm uppercase tracking-widest font-bold">
            <a href="{{ route('frontend.index') }}" class="hover:text-white transition">Home</a>
            <span>/</span>
            <span class="text-white text-xs md:text-sm">Contact Us</span>
        </div>
    </div>
</section>

<section class="py-12 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 md:gap-12">
            <!-- Contact Info -->
            <div class="lg:col-span-1 space-y-6">
                <div class="bg-white p-8 rounded-xl shadow-sm border-b-4 border-gold">
                    <div class="w-12 h-12 rounded-full bg-gold/10 flex items-center justify-center text-gold mb-6">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy mb-2">Our Location</h3>
                    <p class="text-gray-600">123 Islamic Center St, Knowledge City, Pakistan</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm border-b-4 border-gold">
                    <div class="w-12 h-12 rounded-full bg-gold/10 flex items-center justify-center text-gold mb-6">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy mb-2">Phone Number</h3>
                    <p class="text-gray-600">+22 33 4455 6677</p>
                </div>
                <div class="bg-white p-8 rounded-xl shadow-sm border-b-4 border-gold">
                    <div class="w-12 h-12 rounded-full bg-gold/10 flex items-center justify-center text-gold mb-6">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3 class="text-xl font-bold text-navy mb-2">Email Address</h3>
                    <p class="text-gray-600">info@dar-ul-uloom.com</p>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="lg:col-span-2 bg-white p-6 md:p-10 rounded-xl shadow-sm">
                <h3 class="text-xl md:text-2xl font-bold text-navy mb-8">Send Us a Message</h3>
                <form action="#" class="space-y-6">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Full Name</label>
                            <input type="text" placeholder="full name" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-gold focus:ring-0 transition">
                        </div>
                        <div>
                            <label class="block text-gray-700 font-medium mb-2">Email Address</label>
                            <input type="email" placeholder="name@company.com" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-gold focus:ring-0 transition">
                        </div>
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Subject</label>
                        <input type="text" placeholder="General Inquiry" class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-gold focus:ring-0 transition">
                    </div>
                    <div>
                        <label class="block text-gray-700 font-medium mb-2">Message</label>
                        <textarea rows="5" placeholder="Your message here..." class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:border-gold focus:ring-0 transition"></textarea>
                    </div>
                    <button type="submit" class="btn-gold w-full md:w-auto px-12">Submit Message</button>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection
