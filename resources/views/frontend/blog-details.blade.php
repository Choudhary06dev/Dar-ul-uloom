@extends('layouts.frontend')

@section('title', 'Blog Details')

@section('content')
<!-- Page Header -->
<div class="bg-navy py-12 text-center text-white islamic-pattern relative">
    <div class="container mx-auto px-4 relative z-10">
        <h1 class="text-3xl md:text-5xl font-bold mb-4 max-w-4xl mx-auto">The Importance of Seeking Knowledge in Islam</h1>
        <div class="w-20 h-1 bg-gold mx-auto mb-4"></div>
        <div class="flex items-center justify-center space-x-4 text-sm text-gray-300">
            <span><i class="fas fa-calendar-alt text-gold mr-2"></i> 25 MAR 2024</span>
            <span><i class="fas fa-user text-gold mr-2"></i> Admin</span>
            <span><i class="fas fa-folder text-gold mr-2"></i> Education</span>
        </div>
    </div>
</div>

<!-- Blog Body Section -->
<section class="py-16 bg-white">
    <div class="container mx-auto px-4 max-w-4xl">
        <img src="{{ asset('assets/images/about.png') }}" alt="Blog Image" class="w-full h-96 object-cover rounded-lg shadow-lg mb-10">
        
        <div class="prose prose-lg max-w-none text-gray-700">
            <p class="mb-6 leading-relaxed">
                <span class="text-4xl font-bold text-gold float-left mr-3 mt-1 py-1">E</span>xploring the various virtues and obligations of continuous learning in the light of Quran and Hadith. Knowledge is light and seeking it is a duty upon every Muslim.
                Islam places a massive emphasis on learning and education. The very first word revealed to Prophet Muhammad (PBUH) was "Iqra", which translates to "Read" or "Recite".
            </p>
            <p class="mb-6 leading-relaxed">
                In numerous Ahadith, the Prophet (PBUH) highlighted the high status of those who seek knowledge. For example, it is reported: <em>"Seeking knowledge is an obligation upon every Muslim."</em> (Sunan Ibn Majah). This encompasses both religious knowledge that helps one understand their faith better, and worldly knowledge that benefits society.
            </p>
            
            <h3 class="text-2xl font-bold text-navy mt-10 mb-4">The Status of the Scholars</h3>
            <p class="mb-6 leading-relaxed">
                The Quran elevated the status of those who have knowledge over those who do not. Allah says: <strong>"Are those who know equal to those who do not know?"</strong> (Qur'an 39:9). Scholars are considered the inheritors of the prophets because they guide humanity to what is right and just.
            </p>
            
            <div class="bg-gray-50 border-l-4 border-gold p-6 my-10 rounded-r-lg italic text-gray-600 shadow-sm">
                "Whoever travels a path in search of knowledge, Allah will make easy for him a path to Paradise." 
                <span class="block text-sm font-bold mt-2 not-italic text-navy">- Sahih Muslim</span>
            </div>
            
            <p class="mb-6 leading-relaxed">
                By gaining knowledge, a person not only benefits themselves by strengthening their faith and understanding of the world, but they also become a beacon of light for others. Education builds communities and paves the way to progress while staying aligned with Islamic principles.
            </p>
        </div>
        
        <hr class="my-10 border-gray-200">
        
        <div class="flex justify-between items-center">
            <div class="flex space-x-3">
                <span class="font-bold text-navy">Share:</span>
                <a href="#" class="text-gray-400 hover:text-blue-600 transition"><i class="fab fa-facebook-square text-xl"></i></a>
                <a href="#" class="text-gray-400 hover:text-blue-400 transition"><i class="fab fa-twitter-square text-xl"></i></a>
                <a href="#" class="text-gray-400 hover:text-green-600 transition"><i class="fab fa-whatsapp-square text-xl"></i></a>
            </div>
            <a href="{{ route('frontend.blog') }}" class="text-gold font-bold uppercase tracking-wider text-sm hover:text-navy transition flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Back to Blog
            </a>
        </div>
    </div>
</section>
@endsection
