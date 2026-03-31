<!-- Header Top Bar -->
<div class="header-top bg-navy text-white hidden md:block py-3">
    <div class="container mx-auto flex justify-between items-center px-4">
        <div class="flex space-x-4">
            <a href="#" class="hover:text-gold transition"><i class="fab fa-twitter"></i></a>
            <a href="#" class="hover:text-gold transition"><i class="fab fa-pinterest"></i></a>
            <a href="#" class="hover:text-gold transition"><i class="fab fa-facebook-f"></i></a>
            <a href="#" class="hover:text-gold transition"><i class="fab fa-instagram"></i></a>
        </div>
        <div class="flex items-center space-x-6">
            <div class="flex items-center"><i class="fas fa-phone mr-2 text-gold"></i> +22 33 4455 6677</div>
            <div class="flex items-center"><i class="fas fa-envelope mr-2 text-gold"></i> info@dar-ul-uloom.com</div>
            <a href="{{ route('frontend.index') }}" class="hover:text-gold transition"><i class="fas fa-user-circle mr-1"></i> Account</a>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="bg-white shadow-sm sticky top-0 z-50 islamic-pattern">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('frontend.index') }}" class="flex items-center">
            <img src="{{ asset('assets/logo.png') }}" alt="Dar-ul-uloom Logo" class="h-10 md:h-12 w-auto mr-3 rounded-full shadow-sm">
            <div>
                <span class="text-xl md:text-2xl font-bold text-gray-800 tracking-wider">DAR-UL-ULOOM</span>
                <p class="text-[10px] md:text-[12px] text-gray-500 uppercase tracking-[2px] md:tracking-[4px] -mt-1">Anwaar-e-Mustafa BOR</p>
            </div>
        </a>

        <!-- Navigation Links -->
        <div class="hidden lg:flex items-center space-x-8">
            <a href="{{ route('frontend.index') }}" class="nav-link-custom {{ Route::is('frontend.index') ? 'active' : '' }}">HOME</a>
            <a href="{{ route('frontend.about') }}" class="nav-link-custom {{ Route::is('frontend.about') ? 'active' : '' }}">ABOUT</a>
            <a href="{{ route('frontend.blog') }}" class="nav-link-custom {{ Route::is('frontend.blog*') ? 'active' : '' }}">BLOG</a>
            <a href="{{ route('frontend.admission.create') }}" class="nav-link-custom {{ Route::is('frontend.admission*') ? 'active' : '' }}">ADMISSION</a>
            <a href="{{ route('frontend.contact') }}" class="nav-link-custom {{ Route::is('frontend.contact') ? 'active' : '' }}">CONTACT</a>
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="lg:hidden text-gray-800 text-2xl focus:outline-none p-2 hover:bg-gray-50 rounded-lg transition" onclick="toggleMobileMenu()">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 py-6 px-6 space-y-4 shadow-xl transition-all duration-300">
        <a href="{{ route('frontend.index') }}" class="block text-gray-800 font-bold border-b border-gray-50 py-3 {{ Route::is('frontend.index') ? 'text-gold' : '' }}">HOME</a>
        <a href="{{ route('frontend.about') }}" class="block text-gray-800 font-bold border-b border-gray-50 py-3 {{ Route::is('frontend.about') ? 'text-gold' : '' }}">ABOUT</a>
        <a href="{{ route('frontend.blog') }}" class="block text-gray-800 font-bold border-b border-gray-50 py-3 {{ Route::is('frontend.blog*') ? 'text-gold' : '' }}">BLOG</a>
        <a href="{{ route('frontend.admission.create') }}" class="block text-gray-800 font-bold border-b border-gray-50 py-3 {{ Route::is('frontend.admission*') ? 'text-gold' : '' }}">ADMISSION</a>
        <a href="{{ route('frontend.contact') }}" class="block text-gray-800 font-bold border-b border-gray-50 py-3 {{ Route::is('frontend.contact') ? 'text-gold' : '' }}">CONTACT</a>
        <a href="#" class="block btn-gold text-center py-4 mt-6 rounded-xl shadow-lg">VISIT US</a>
    </div>
</header>
