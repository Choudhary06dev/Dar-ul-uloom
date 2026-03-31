@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="relative h-[600px] md:h-[600px] overflow-hidden">
    <div class="absolute inset-0 bg-black/40 z-10"></div>
    <img src="{{ asset('assets/images/hero.png') }}" alt="Islamic Center" class="absolute inset-0 w-full h-full object-cover">
    <div class="container mx-auto px-4 h-full flex flex-col justify-center items-center relative z-20 text-center text-white">
        <p class="text-gold text-lg md:text-xl font-medium mb-4 italic tracking-widest">بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
        <h1 class="text-3xl md:text-5xl lg:text-7xl font-bold mb-6 leading-tight">Welcome to <span class="text-gold">Dar-ul-uloom</span></h1>
        <p class="text-base md:text-lg lg:text-xl max-w-2xl mb-10 text-gray-200">
            A center of excellence for Islamic learning, community service, and spiritual growth. Join us in our journey towards enlightenment.
        </p>
        <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <a href="#" class="btn-gold">LEARN MORE</a>
            <a href="#" class="px-8 py-3 bg-white/10 backdrop-blur-md border border-white/20 rounded-md hover:bg-white/20 transition uppercase font-semibold">OUR COURSES</a>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section class="py-24 bg-white islamic-pattern">
    <div class="container mx-auto px-4 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="relative">
            <div class="absolute -top-6 -left-6 w-32 h-32 border-t-4 border-l-4 border-gold"></div>
            <img src="{{ asset('assets/images/about_boys.png') }}" alt="About Dar-ul-uloom" class="rounded-lg shadow-2xl relative z-10">
            <div class="absolute -bottom-6 -right-6 w-32 h-32 border-b-4 border-r-4 border-gold"></div>
        </div>
        <div>
            <h4 class="text-gold font-semibold tracking-widest uppercase mb-4">About Our Center</h4>
            <h2 class="text-4xl font-bold text-navy mb-8 leading-tight">Empowering the Ummah Through Traditional Knowledge</h2>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Dar-ul-uloom is a premier Islamic institution dedicated to the preservation and dissemination of classical Islamic knowledge. Founded with a vision to build a strong community based on Quranic values and the Sunnah.
            </p>
            <p class="text-gray-600 mb-10 leading-relaxed">
                We offer a wide range of programs including Hifz-ul-Quran, Dars-e-Nizami, and various short courses for adults and children, all designed to foster a deep connection with Allah SWT.
            </p>
            <ul class="space-y-4 mb-10">
                <li class="flex items-center text-gray-700 font-medium">
                    <i class="fas fa-check-circle text-gold mr-3"></i> Expert Islamic Scholars
                </li>
                <li class="flex items-center text-gray-700 font-medium">
                    <i class="fas fa-check-circle text-gold mr-3"></i> Traditional Learning Methods
                </li>
                <li class="flex items-center text-gray-700 font-medium">
                    <i class="fas fa-check-circle text-gold mr-3"></i> Modern Community Facilities
                </li>
            </ul>
            <a href="{{ route('frontend.about') }}" class="btn-gold">DISCOVER MORE</a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-16 bg-navy text-white">
    <div class="container mx-auto px-4 grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
        <div>
            <div class="text-4xl font-bold text-gold mb-2">500+</div>
            <div class="text-gray-400 uppercase tracking-widest text-sm">Active Students</div>
        </div>
        <div>
            <div class="text-4xl font-bold text-gold mb-2">25+</div>
            <div class="text-gray-400 uppercase tracking-widest text-sm">Expert Teachers</div>
        </div>
        <div>
            <div class="text-4xl font-bold text-gold mb-2">15+</div>
            <div class="text-gray-400 uppercase tracking-widest text-sm">Yearly Events</div>
        </div>
        <div>
            <div class="text-4xl font-bold text-gold mb-2">10k+</div>
            <div class="text-gray-400 uppercase tracking-widest text-sm">Books in Library</div>
        </div>
    </div>
</section>

<!-- Scholars Section -->
<section class="py-24 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-2xl mx-auto mb-16">
            <h4 class="text-gold font-semibold tracking-widest uppercase mb-4">Meet Our Scholars</h4>
            <h2 class="text-4xl font-bold text-navy mb-6">Learn From Expert Islamic Teachers</h2>
            <div class="w-20 h-1 bg-gold mx-auto"></div>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Scholar Card -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:-translate-y-2 transition duration-300">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('assets/images/scholar.png') }}" alt="Scholar" class="w-full h-80 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gold/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="flex space-x-4 text-white text-xl">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-navy mb-2">Sheikh Abdullah</h3>
                    <p class="text-gold font-medium uppercase text-sm tracking-wider">Principal Scholar</p>
                </div>
            </div>

            <!-- Scholar Card 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:-translate-y-2 transition duration-300">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('assets/images/scholar.png') }}" alt="Scholar" class="w-full h-80 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gold/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="flex space-x-4 text-white text-xl">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-navy mb-2">Mufti Muhammad</h3>
                    <p class="text-gold font-medium uppercase text-sm tracking-wider">Senior Instructor</p>
                </div>
            </div>

            <!-- Scholar Card 3 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:-translate-y-2 transition duration-300">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('assets/images/scholar.png') }}" alt="Scholar" class="w-full h-80 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute inset-0 bg-gold/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="flex space-x-4 text-white text-xl">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-navy mb-2">Ustadha Fatima</h3>
                    <p class="text-gold font-medium uppercase text-sm tracking-wider">Female Education Head</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-16 bg-gold relative overflow-hidden">
    <div class="container mx-auto px-4 flex flex-col lg:flex-row items-center justify-between text-white relative z-10">
        <div class="mb-8 lg:mb-0">
            <h2 class="text-3xl font-bold mb-2">Subscribe To Our Newsletter</h2>
            <p class="text-white/80">Stay updated with our latest news, events, and Islamic courses.</p>
        </div>
        <form class="flex w-full lg:w-auto">
            <input type="email" placeholder="Your Email Address" class="px-6 py-4 rounded-l-md w-full lg:w-96 text-gray-800 focus:outline-none">
            <button type="submit" class="bg-dark px-8 py-4 rounded-r-md font-bold uppercase hover:bg-navy transition">SIGN UP</button>
        </form>
    </div>
    <!-- Decorative Pattern -->
    <div class="absolute top-0 right-0 opacity-10 pointer-events-none">
        <i class="fas fa-mosque text-[300px]"></i>
    </div>
</section>

<!-- Blog Section -->
<section class="py-24 bg-white">
    <div class="container mx-auto px-4">
        <div class="flex justify-between items-end mb-16">
            <div>
                <h4 class="text-gold font-semibold tracking-widest uppercase mb-4">Latest From Blog</h4>
                <h2 class="text-4xl font-bold text-navy">Read Our Articles & News</h2>
            </div>
            <a href="{{ route('frontend.blog') }}" class="text-navy font-bold hover:text-gold transition hidden md:block border-b-2 border-gold pb-1 text-sm uppercase">View All Posts</a>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-10">
            <!-- Blog Post 1 -->
            <div class="group">
                <div class="relative overflow-hidden rounded-lg mb-6">
                    <img src="{{ asset('assets/images/about_boys.png') }}" alt="Blog" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-gold text-white px-4 py-1 rounded-sm text-sm font-bold">25 MAR</div>
                </div>
                <h3 class="text-xl font-bold text-navy mb-4 group-hover:text-gold transition cursor-pointer">The Importance of Seeking Knowledge in Islam</h3>
                <p class="text-gray-600 mb-6 line-clamp-2">Exploring the various virtues and obligations of continuous learning in the light of Quran and Hadith.</p>
                <a href="{{ route('frontend.blog') }}" class="text-gold font-bold text-sm tracking-wider uppercase hover:text-navy transition flex items-center">
                    Read More <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>

            <!-- Blog Post 2 -->
            <div class="group">
                <div class="relative overflow-hidden rounded-lg mb-6">
                    <img src="{{ asset('assets/images/hero.png') }}" alt="Blog" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-gold text-white px-4 py-1 rounded-sm text-sm font-bold">18 MAR</div>
                </div>
                <h3 class="text-xl font-bold text-navy mb-4 group-hover:text-gold transition cursor-pointer">Preparing for the Blessed Month of Ramadan</h3>
                <p class="text-gray-600 mb-6 line-clamp-2">Practical tips and spiritual advice to make the most of the upcoming holy month of fasting.</p>
                <a href="{{ route('frontend.blog') }}" class="text-gold font-bold text-sm tracking-wider uppercase hover:text-navy transition flex items-center">
                    Read More <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>

            <!-- Blog Post 3 -->
            <div class="group">
                <div class="relative overflow-hidden rounded-lg mb-6">
                    <img src="{{ asset('assets/images/about.png') }}" alt="Blog" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500">
                    <div class="absolute top-4 left-4 bg-gold text-white px-4 py-1 rounded-sm text-sm font-bold">10 MAR</div>
                </div>
                <h3 class="text-xl font-bold text-navy mb-4 group-hover:text-gold transition cursor-pointer">Teaching Children the Meaning of Gratitude</h3>
                <p class="text-gray-600 mb-6 line-clamp-2">How to nurture a grateful heart in our youngsters through daily Islamic practices and stories.</p>
                <a href="{{ route('frontend.blog') }}" class="text-gold font-bold text-sm tracking-wider uppercase hover:text-navy transition flex items-center">
                    Read More <i class="fas fa-arrow-right ml-2 text-xs"></i>
                </a>
            </div>
        </div>
    </div>
</section>
@endsection
