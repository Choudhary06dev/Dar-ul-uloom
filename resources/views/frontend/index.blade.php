@extends('layouts.frontend')

@section('title', 'Home')

@section('content')
<!-- Hero Section -->
<section class="relative h-[600px] md:h-[600px] overflow-hidden">
    <div class="absolute inset-0 bg-black/40 z-10"></div>
    <img src="{{ asset('assets/images/banner.jpeg') }}" alt="Islamic Center" class="absolute inset-0 w-full h-full object-cover" fetchpriority="high">
    <div class="container mx-auto px-4 h-full flex flex-col justify-start pt-24 md:pt-16 items-center relative z-20 text-center text-white">
        <!-- Main Content -->
        <div class="flex flex-col items-center">
            <p class="text-gold text-lg md:text-xl font-medium mb-4 italic tracking-widest">بِسْمِ اللهِ الرَّحْمٰنِ الرَّحِيْمِ</p>
            <div class="admission-badge shadow-sm">
                <span class="pulse-dot"></span>
                Admissions Open Now
            </div>
        </div>

    </div>

    <!-- Prayer Times Widget (Full Right Screen Edge) -->
    <div class="w-full lg:absolute lg:w-auto lg:right-4 xl:right-2 lg:top-1/2 lg:-translate-y-1/2 flex justify-center mt-12 lg:mt-0 z-30 px-4 md:px-0">
        <div class="prayer-time-card custom-prayer-card p-7 w-full animate-fade-in-up">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-xl font-bold text-white flex items-center whitespace-nowrap">
                    <i class="fas fa-clock text-gold mr-3"></i> Prayer Times
                </h3>
                <div class="flex flex-col items-end shrink-0 ml-4">
                    <span id="current-city" class="text-[10px] uppercase tracking-widest text-gold font-bold">Lahore, PK</span>
                    <span id="islamic-date" class="text-[10px] text-gray-300">Loading...</span>
                </div>
            </div>

            <div class="grid grid-cols-1 gap-3" id="prayer-times-list">
                <!-- Individual Prayer Time Item -->
                <div class="flex justify-between items-center custom-prayer-item px-4 py-3.5 transition-all duration-300 group">
                    <span class="text-sm font-semibold text-gray-300 group-hover:text-white uppercase tracking-wider">Fajr</span>
                    <span class="prayer-time text-sm font-extrabold text-gold group-hover:text-white" data-prayer="Fajr">--:--</span>
                </div>
                <div class="flex justify-between items-center custom-prayer-item px-4 py-3.5 transition-all duration-300 group">
                    <span class="text-sm font-semibold text-gray-300 group-hover:text-white uppercase tracking-wider">Dhuhr</span>
                    <span class="prayer-time text-sm font-extrabold text-gold group-hover:text-white" data-prayer="Dhuhr">--:--</span>
                </div>
                <div class="flex justify-between items-center custom-prayer-item px-4 py-3.5 transition-all duration-300 group">
                    <span class="text-sm font-semibold text-gray-300 group-hover:text-white uppercase tracking-wider">Asr</span>
                    <span class="prayer-time text-sm font-extrabold text-gold group-hover:text-white" data-prayer="Asr">--:--</span>
                </div>
                <div class="flex justify-between items-center custom-prayer-item px-4 py-3.5 transition-all duration-300 group">
                    <span class="text-sm font-semibold text-gray-300 group-hover:text-white uppercase tracking-wider">Maghrib</span>
                    <span class="prayer-time text-sm font-extrabold text-gold group-hover:text-white" data-prayer="Maghrib">--:--</span>
                </div>
                <div class="flex justify-between items-center custom-prayer-item px-4 py-3.5 transition-all duration-300 group">
                    <span class="text-sm font-semibold text-gray-300 group-hover:text-white uppercase tracking-wider">Isha</span>
                    <span class="prayer-time text-sm font-extrabold text-gold group-hover:text-white" data-prayer="Isha">--:--</span>
                </div>
            </div>

            <div class="mt-6 pt-4 border-t border-white/10 text-center">
                <p class="text-[10px] text-gray-400 italic font-medium">"Indeed, prayer has been decreed upon the believers at specified times."</p>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- About Us Section -->
<section class="py-16 bg-white islamic-pattern">
    <div class="container px-8 md:px-12 grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
        <div class="relative">
            <div class="absolute -top-6 -left-6 w-32 h-32 border-t-4 border-l-4 border-gold"></div>
            <img src="{{ asset('assets/images/about_boys.png') }}" alt="About Anwaar-e-Mustafa" class="rounded-lg shadow-2xl relative z-10" loading="lazy">
            <div class="absolute -bottom-6 -right-6 w-32 h-32 border-b-4 border-r-4 border-gold"></div>
        </div>
        <div>
            <h4 class="text-gold font-semibold tracking-widest uppercase mb-4">About Our Masjid</h4>
            <h2 class="text-4xl font-bold text-navy mb-8 leading-tight">Jamia Masjid Anwaar-e-Mustafa BOR</h2>
            <p class="text-gray-600 mb-6 leading-relaxed">
                Jamia Masjid Anwaar-e-Mustafa BOR is a blessed place where the community has shared beautiful religious memories for over 23 years. The mosque is known for its punctuality in Azan and Jamaat, maintaining discipline and consistency in congregational prayers since its establishment.
            </p>
            <p class="text-gray-600 mb-10 leading-relaxed">
                It serves as a spiritual center for the local community, providing a peaceful and welcoming environment for worship and learning. Special religious nights and Mehfils are beautifully managed, creating spiritually uplifting experiences.
            </p>
            <ul class="space-y-4 mb-10">
                <li class="flex items-center text-gray-700 font-medium">
                    <i class="fas fa-check-circle text-gold mr-3"></i> Punctual Azan & 5 Daily Jamaats
                </li>
                <li class="flex items-center text-gray-700 font-medium">
                    <i class="fas fa-check-circle text-gold mr-3"></i> 23+ Years of Blessed Service
                </li>
                <li class="flex items-center text-gray-700 font-medium">
                    <i class="fas fa-check-circle text-gold mr-3"></i> Dars-e-Quran & Religious Mehfils
                </li>
            </ul>
            <a href="{{ route('frontend.about') }}" class="btn-gold">DISCOVER MORE</a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="py-12 bg-navy text-white">
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
<section class="py-16 bg-gray-50">
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
                    <img src="{{ asset('assets/images/qari ashraf.jpeg') }}" alt="Scholar" class="w-full h-80 object-cover group-hover:scale-110 transition duration-500" loading="lazy">
                    <div class="absolute inset-0 bg-gold/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="flex space-x-4 text-white text-xl">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-navy mb-2">Alama Muhammad Asraf</h3>
                    <p class="text-gold font-medium uppercase text-sm tracking-wider">Principal Scholar</p>
                </div>
            </div>

            <!-- Scholar Card 2 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:-translate-y-2 transition duration-300">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('assets/images/scholar2.png') }}" alt="Scholar" class="w-full h-80 object-cover group-hover:scale-110 transition duration-500" loading="lazy">
                    <div class="absolute inset-0 bg-gold/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="flex space-x-4 text-white text-xl">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-navy mb-2">Qari Muhammad Abid</h3>
                    <p class="text-gold font-medium uppercase text-sm tracking-wider">Senior Instructor</p>
                </div>
            </div>

            <!-- Scholar Card 3 -->
            <div class="bg-white rounded-xl shadow-lg overflow-hidden group hover:-translate-y-2 transition duration-300">
                <div class="relative overflow-hidden">
                    <img src="{{ asset('assets/images/scholar.png') }}" alt="Scholar" class="w-full h-80 object-cover group-hover:scale-110 transition duration-500" loading="lazy">
                    <div class="absolute inset-0 bg-gold/80 flex items-center justify-center opacity-0 group-hover:opacity-100 transition duration-300">
                        <div class="flex space-x-4 text-white text-xl">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="p-8 text-center">
                    <h3 class="text-2xl font-bold text-navy mb-2">Qari Muhammad Saeed</h3>
                    <p class="text-gold font-medium uppercase text-sm tracking-wider">Head</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="py-12 bg-gold relative overflow-hidden">
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
<section class="py-16 bg-white">
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
                    <img src="{{ asset('assets/images/about_boys.png') }}" alt="Blog" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500" loading="lazy">
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
                    <img src="{{ asset('assets/images/masjid.jpeg') }}" alt="Blog" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500" loading="lazy">
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
                    <img src="{{ asset('assets/images/Anware.jpg') }}" alt="Blog" class="w-full h-64 object-cover group-hover:scale-110 transition duration-500" loading="lazy">
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

@push('styles')
<style>
    @keyframes fade-in-up {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s cubic-bezier(0.16, 1, 0.3, 1);
    }

    .prayer-time-card {
        border: 1px solid rgba(212, 175, 55, 0.2);
    }

    /* Guaranteed Styles for Live Server Compatibility */
    .custom-prayer-card {
        background-color: rgba(0, 0, 0, 0.7) !important;
        backdrop-filter: blur(24px) !important;
        -webkit-backdrop-filter: blur(24px) !important;
        border: 1px solid rgba(255, 255, 255, 0.1) !important;
        border-radius: 1.5rem !important;
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.4) !important;
        max-width: 350px !important;
    }

    .custom-prayer-item {
        background-color: rgba(255, 255, 255, 0.05) !important;
        border: 1px solid rgba(255, 255, 255, 0.05) !important;
        border-radius: 1rem !important;
    }

    .custom-prayer-item:hover {
        background-color: rgba(212, 175, 55, 0.2) !important;
        border-color: rgba(212, 175, 55, 0.3) !important;
    }
</style>
@endpush

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const city = 'Lahore';
        const country = 'Pakistan';
        const apiUrl = `https://api.aladhan.com/v1/timingsByCity?city=${city}&country=${country}&method=1`;

        const prayerElements = {
            Fajr: document.querySelector('[data-prayer="Fajr"]'),
            Dhuhr: document.querySelector('[data-prayer="Dhuhr"]'),
            Asr: document.querySelector('[data-prayer="Asr"]'),
            Maghrib: document.querySelector('[data-prayer="Maghrib"]'),
            Isha: document.querySelector('[data-prayer="Isha"]')
        };

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                if (data.code === 200) {
                    const timings = data.data.timings;
                    const dateInfo = data.data.date;

                    Object.keys(prayerElements).forEach(key => {
                        if (prayerElements[key]) {
                            prayerElements[key].textContent = formatTime(timings[key]);
                        }
                    });

                    const hijriDate = `${dateInfo.hijri.day} ${dateInfo.hijri.month.en} ${dateInfo.hijri.year} AH`;
                    const dateEl = document.getElementById('islamic-date');
                    if (dateEl) dateEl.textContent = hijriDate;
                }
            })
            .catch(error => {
                console.error('Error fetching prayer times:', error);
            });

        function formatTime(time24) {
            const [hours, minutes] = time24.split(':');
            const h = parseInt(hours);
            const ampm = h >= 12 ? 'PM' : 'AM';
            const h12 = h % 12 || 12;
            return `${h12}:${minutes} ${ampm}`;
        }
    });
</script>
@endpush