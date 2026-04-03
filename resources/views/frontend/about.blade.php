@extends('layouts.frontend')

@section('title', 'About Us')

@section('content')
<!-- Page Header -->
<section class="py-14 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 opacity-20 islamic-pattern"></div>
    <div class="container mx-auto px-4 relative z-10 text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-white mb-4">About Us</h1>
        <div class="flex justify-center items-center text-gold space-x-2 text-sm uppercase tracking-widest font-bold">
            <a href="{{ route('frontend.index') }}" class="hover:text-white transition">Home</a>
            <span>/</span>
            <span class="text-white">About Us</span>
        </div>
    </div>
</section>

<!-- Introduction Section -->
<section class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-12 items-start">
            <div class="order-2 lg:order-1">
                 <img src="{{ asset('assets/images/masjid.jpeg') }}" alt="Allama Muhammad Ashraf" class="rounded-2xl shadow-2xl relative z-10 w-full max-h-[480px] object-cover">
                <div class="grid grid-cols-2 gap-4 mt-6">
                    <div class="bg-gray-50 p-4 rounded-xl border-l-4 border-gold shadow-sm text-center">
                        <div class="text-3xl font-bold text-navy mb-1">23+</div>
                        <div class="text-gray-500 text-sm uppercase tracking-wider">Years of Service</div>
                    </div>
                    <div class="bg-gray-50 p-4 rounded-xl border-l-4 border-gold shadow-sm text-center">
                        <div class="text-3xl font-bold text-navy mb-1">5</div>
                        <div class="text-gray-500 text-sm uppercase tracking-wider">Daily Jamaats</div>
                    </div>
                </div>
            </div>
            <div class="order-1 lg:order-2">
                <h4 class="text-gold font-semibold tracking-widest uppercase mb-2 text-sm md:text-base">About Our Masjid</h4>
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-5 leading-tight">Jamia Masjid Anwaar-e-Mustafa BOR</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Jamia Masjid Anwaar-e-Mustafa BOR is a blessed place where the community has shared beautiful religious memories for over 23 years. The mosque is known for its punctuality in Azan and Jamaat, maintaining discipline and consistency in congregational prayers since its establishment.
                </p>
                <p class="text-gray-600 mb-5 leading-relaxed">
                    It serves as a spiritual center for the local community, providing a peaceful and welcoming environment for worship and learning.
                </p>
                <ul class="space-y-3">
                    <li class="flex items-center text-gray-700 font-medium">
                        <i class="fas fa-check-circle text-gold mr-3"></i> Punctual Azan & Jamaat
                    </li>
                    <li class="flex items-center text-gray-700 font-medium">
                        <i class="fas fa-check-circle text-gold mr-3"></i> 23+ Years of Blessed Service
                    </li>
                    <li class="flex items-center text-gray-700 font-medium">
                        <i class="fas fa-check-circle text-gold mr-3"></i> Peaceful & Welcoming Environment
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Facilities & Services Section -->
<section class="py-12 md:py-16 bg-gray-50">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto mb-10">
            <h4 class="text-gold font-semibold tracking-widest uppercase mb-2">Our Services</h4>
            <h2 class="text-3xl md:text-4xl font-bold text-navy mb-4">Facilities & Activities</h2>
            <div class="w-20 h-1 bg-gold mx-auto mb-4"></div>
            <p class="text-gray-600 leading-relaxed">
                All essential facilities are available for the convenience of worshippers. Regular Azan, five daily prayers with Jamaat, and Ramadan Taraweeh led by <strong class="text-navy">Qari Abid</strong> are organized with great care and devotion.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border-b-4 border-transparent hover:border-gold group">
                <div class="w-14 h-14 rounded-2xl bg-gold/10 flex items-center justify-center text-gold mb-4 group-hover:bg-gold group-hover:text-white transition-all duration-300">
                    <i class="fas fa-mosque text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-navy mb-3">Five Daily Prayers</h3>
                <p class="text-gray-600 leading-relaxed">Regular Azan and five daily congregational prayers with Jamaat, maintained with punctuality and discipline.</p>
            </div>

            <!-- Card 2 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border-b-4 border-transparent hover:border-gold group">
                <div class="w-14 h-14 rounded-2xl bg-gold/10 flex items-center justify-center text-gold mb-4 group-hover:bg-gold group-hover:text-white transition-all duration-300">
                    <i class="fas fa-moon text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-navy mb-3">Ramadan Taraweeh</h3>
                <p class="text-gray-600 leading-relaxed">Special Taraweeh prayers during Ramadan led by Qari Abid, creating a spiritually uplifting experience.</p>
            </div>

            <!-- Card 3 -->
            <div class="bg-white rounded-2xl p-6 shadow-sm hover:shadow-xl hover:-translate-y-2 transition-all duration-300 border-b-4 border-transparent hover:border-gold group">
                <div class="w-14 h-14 rounded-2xl bg-gold/10 flex items-center justify-center text-gold mb-4 group-hover:bg-gold group-hover:text-white transition-all duration-300">
                    <i class="fas fa-star text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-navy mb-3">Religious Nights & Mehfils</h3>
                <p class="text-gray-600 leading-relaxed">Special religious nights and Mehfils are beautifully managed, creating memorable and spiritually uplifting experiences.</p>
            </div>
        </div>
    </div>
</section>

<!-- Khateeb Section -->
<section class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10 lg:gap-12 items-center">
            <div>
                <h4 class="text-gold font-semibold tracking-widest uppercase mb-2 text-sm md:text-base">Our Khateeb</h4>
                <h2 class="text-3xl md:text-4xl font-bold text-navy mb-5 leading-tight">Allama Muhammad Ashraf</h2>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    The mosque is honored to have <strong class="text-navy">Allama Muhammad Ashraf</strong> serving as Khateeb. His insightful Friday sermons, clear guidance, and inspiring speeches play an important role in educating and spiritually uplifting the community.
                </p>
                <p class="text-gray-600 mb-5 leading-relaxed">
                    He also delivers <strong class="text-navy">Dars-e-Quran daily after Fajr prayer</strong>, providing valuable understanding of the Holy Quran and encouraging regular participation from community members.
                </p>
                <div class="space-y-3">
                    <div class="flex items-start">
                        <div class="w-10 h-10 rounded-full bg-gold/10 flex items-center justify-center text-gold shrink-0 mr-4 mt-0.5">
                            <i class="fas fa-microphone-alt"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-navy mb-1">Friday Sermons</h4>
                            <p class="text-gray-600 text-sm">Insightful Jummah Khutbahs with clear guidance</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-10 h-10 rounded-full bg-gold/10 flex items-center justify-center text-gold shrink-0 mr-4 mt-0.5">
                            <i class="fas fa-book-quran"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-navy mb-1">Dars-e-Quran (After Fajr)</h4>
                            <p class="text-gray-600 text-sm">Daily Quran understanding & Tafseer sessions</p>
                        </div>
                    </div>
                    <div class="flex items-start">
                        <div class="w-10 h-10 rounded-full bg-gold/10 flex items-center justify-center text-gold shrink-0 mr-4 mt-0.5">
                            <i class="fas fa-comments"></i>
                        </div>
                        <div>
                            <h4 class="font-bold text-navy mb-1">Inspiring Speeches</h4>
                            <p class="text-gray-600 text-sm">Spiritually uplifting talks for the community</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="relative">
                <div class="absolute -top-6 -left-6 w-32 h-32 border-t-4 border-l-4 border-gold hidden lg:block"></div>
               <img src="{{ asset('assets/images/qari ashraf.jpeg') }}" alt="Jamia Masjid Anwaar-e-Mustafa BOR" class="rounded-2xl shadow-2xl w-full max-h-[400px] object-cover">
                <div class="absolute -bottom-6 -right-6 w-32 h-32 border-b-4 border-r-4 border-gold hidden lg:block"></div>
            </div>
        </div>
    </div>
</section>

<!-- Madrasa Section -->
<section class="py-12 md:py-16 bg-navy relative overflow-hidden">
    <div class="absolute inset-0 opacity-10 islamic-pattern"></div>
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-3xl mx-auto mb-10">
            <h4 class="text-gold font-semibold tracking-widest uppercase mb-2">Coming Soon</h4>
            <h2 class="text-3xl md:text-4xl font-bold text-white mb-4">Madrasa Departments</h2>
            <div class="w-20 h-1 bg-gold mx-auto mb-4"></div>
            <p class="text-gray-300 leading-relaxed">
                We are also going to start a Madrasa with the following departments. Admissions are opening soon — be a part of this blessed journey!
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">
            <!-- Department 1 -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 text-center border border-white/10 hover:bg-white/10 hover:border-gold/50 transition-all duration-300 group">
                <div class="w-16 h-16 rounded-full bg-gold/20 flex items-center justify-center text-gold mx-auto mb-4 group-hover:bg-gold group-hover:text-white transition-all duration-300">
                    <i class="fas fa-quran text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">شعبہ حفظ القرآن</h3>
                <p class="text-gray-400 text-sm">Hifz-ul-Quran Department</p>
            </div>

            <!-- Department 2 -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 text-center border border-white/10 hover:bg-white/10 hover:border-gold/50 transition-all duration-300 group">
                <div class="w-16 h-16 rounded-full bg-gold/20 flex items-center justify-center text-gold mx-auto mb-4 group-hover:bg-gold group-hover:text-white transition-all duration-300">
                    <i class="fas fa-book-open text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">تجوید و قرات</h3>
                <p class="text-gray-400 text-sm">Tajweed & Qirat Department</p>
            </div>

            <!-- Department 3 -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 text-center border border-white/10 hover:bg-white/10 hover:border-gold/50 transition-all duration-300 group">
                <div class="w-16 h-16 rounded-full bg-gold/20 flex items-center justify-center text-gold mx-auto mb-4 group-hover:bg-gold group-hover:text-white transition-all duration-300">
                    <i class="fas fa-language text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">ترجمہ و تفسیر</h3>
                <p class="text-gray-400 text-sm">Translation & Tafseer Department</p>
            </div>

            <!-- Department 4 -->
            <div class="bg-white/5 backdrop-blur-sm rounded-2xl p-6 text-center border border-white/10 hover:bg-white/10 hover:border-gold/50 transition-all duration-300 group">
                <div class="w-16 h-16 rounded-full bg-gold/20 flex items-center justify-center text-gold mx-auto mb-4 group-hover:bg-gold group-hover:text-white transition-all duration-300">
                    <i class="fas fa-spell-check text-2xl"></i>
                </div>
                <h3 class="text-xl font-bold text-white mb-2">ناظرہ قرآن</h3>
                <p class="text-gray-400 text-sm">Nazra Quran Department</p>
            </div>
        </div>

        <!-- Admissions CTA -->
        <div class="text-center">
            <a href="{{ auth()->check() ? route('frontend.admission.create') : route('register') }}" class="inline-flex items-center px-10 py-4 bg-gold text-white rounded-xl font-bold text-lg uppercase tracking-wider hover:bg-white hover:text-navy transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-1">
                <i class="fas fa-graduation-cap mr-3"></i> Admissions Open Now
            </a>
        </div>
    </div>
</section>

<!-- Closing Statement -->
<section class="py-12 md:py-16 bg-white">
    <div class="container mx-auto px-4">
        <div class="max-w-4xl mx-auto text-center">
            <div class="w-16 h-16 rounded-full bg-gold/10 flex items-center justify-center text-gold mx-auto mb-5">
                <i class="fas fa-heart text-2xl"></i>
            </div>
            <h2 class="text-3xl md:text-4xl font-bold text-navy mb-5 leading-tight">A Center of Unity, Spirituality & Islamic Learning</h2>
            <p class="text-gray-600 text-lg leading-relaxed mb-6">
                Jamia Masjid Anwaar-e-Mustafa BOR continues to serve as a center of unity, spirituality, and Islamic learning for the community, fostering love, discipline, and devotion among all who visit.
            </p>
            <a href="{{ route('frontend.contact') }}" class="btn-gold inline-block">CONTACT US</a>
        </div>
    </div>
</section>
@endsection
