@extends('layouts.frontend')

@section('title', 'Blog & Articles')

@section('content')
<!-- Page Header -->
<div class="bg-navy py-12 md:py-16 text-center text-white islamic-pattern relative">
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-3xl md:text-5xl font-bold mb-4">Our Blog & Articles</h1>
        <div class="w-20 h-1 bg-gold mx-auto mb-4"></div>
        <p class="text-gold uppercase tracking-widest text-xs md:text-sm">Read the latest news and Islamic insights</p>
    </div>
</div>

<!-- Blog Section -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 md:gap-10">
            <!-- Blog Post 1 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('assets/images/masjid.jpeg') }}" alt="Blog" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-gold text-white px-4 py-1 rounded-sm text-sm font-bold shadow-lg">25 MAR</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-navy mb-4 group-hover:text-gold transition cursor-pointer">The Importance of Seeking Knowledge in Islam</h3>
                    <p class="text-gray-600 mb-6 line-clamp-3">Exploring the various virtues and obligations of continuous learning in the light of Quran and Hadith. Knowledge is light and seeking it is a duty upon every Muslim.</p>
                    <a href="{{ route('frontend.blog.details') }}" class="inline-block px-6 py-2 border-2 border-gold text-gold font-bold text-sm tracking-wider uppercase rounded hover:bg-gold hover:text-white transition">
                        Read More
                    </a>
                </div>
            </div>

            <!-- Blog Post 2 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('assets/images/hero.png') }}" alt="Blog" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-gold text-white px-4 py-1 rounded-sm text-sm font-bold shadow-lg">18 MAR</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-navy mb-4 group-hover:text-gold transition cursor-pointer">Preparing for the Blessed Month of Ramadan</h3>
                    <p class="text-gray-600 mb-6 line-clamp-3">Practical tips and spiritual advice to make the most of the upcoming holy month of fasting. Prepare your heart and mind through increased acts of worship.</p>
                    <a href="{{ route('frontend.blog.details') }}" class="inline-block px-6 py-2 border-2 border-gold text-gold font-bold text-sm tracking-wider uppercase rounded hover:bg-gold hover:text-white transition">
                        Read More
                    </a>
                </div>
            </div>

            <!-- Blog Post 3 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('assets/images/anware.jpg') }}" alt="Blog" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-gold text-white px-4 py-1 rounded-sm text-sm font-bold shadow-lg">10 MAR</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-navy mb-4 group-hover:text-gold transition cursor-pointer">Teaching Children the Meaning of Gratitude</h3>
                    <p class="text-gray-600 mb-6 line-clamp-3">How to nurture a grateful heart in our youngsters through daily Islamic practices and stories. Helping them understand the blessings of Allah SWT.</p>
                    <a href="{{ route('frontend.blog.details') }}" class="inline-block px-6 py-2 border-2 border-gold text-gold font-bold text-sm tracking-wider uppercase rounded hover:bg-gold hover:text-white transition">
                        Read More
                    </a>
                </div>
            </div>
            
             <!-- Blog Post 4 -->
            <div class="bg-white rounded-lg shadow-md overflow-hidden group">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('assets/images/about_boys.png') }}" alt="Blog" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-gold text-white px-4 py-1 rounded-sm text-sm font-bold shadow-lg">05 MAR</div>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-bold text-navy mb-4 group-hover:text-gold transition cursor-pointer">Understanding Zakat and Its Benefits</h3>
                    <p class="text-gray-600 mb-6 line-clamp-3">A comprehensive guide on calculating Zakat and how it purifies wealth while helping the community. Learn the core principles of Islamic charity.</p>
                    <a href="{{ route('frontend.blog.details') }}" class="inline-block px-6 py-2 border-2 border-gold text-gold font-bold text-sm tracking-wider uppercase rounded hover:bg-gold hover:text-white transition">
                        Read More
                    </a>
                </div>
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="flex justify-center mt-16">
            <div class="flex space-x-2">
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded bg-gold text-white font-bold shadow">1</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-gray-300 text-gray-600 hover:bg-gray-100 transition">2</a>
                <a href="#" class="w-10 h-10 flex items-center justify-center rounded border border-gray-300 text-gray-600 hover:bg-gray-100 transition"><i class="fas fa-chevron-right text-xs"></i></a>
            </div>
        </div>
    </div>
</section>
@endsection
