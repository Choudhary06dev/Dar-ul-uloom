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
            <!-- Account Dropdown -->
            <div class="relative group z-[100]">
                <button class="hover:text-gold transition flex items-center font-medium focus:outline-none">
                    <i class="fas fa-user-circle text-lg mr-1"></i> Account <i class="fas fa-chevron-down ml-1 text-[10px]"></i>
                </button>
                
                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-8 w-48 bg-white rounded-lg shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform origin-top-right border border-gray-100 -translate-y-2 group-hover:translate-y-0" style="top: 100%;">
                    <div class="py-2">
                        @auth
                            <div class="px-4 py-2 border-b border-gray-50 flex items-center">
                                <i class="fas fa-user text-gold mr-2 text-sm"></i> 
                                <span class="text-sm font-semibold text-gray-800 truncate">{{ auth()->user()->name }}</span>
                            </div>
                            <a href="{{ route('frontend.profile.edit') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gold transition"><i class="fas fa-user-edit mr-2 w-4 text-center"></i> Profile</a>
                            <form method="POST" action="{{ route('logout') }}" class="w-full">
                                @csrf
                                <button type="submit" class="w-full text-left px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gold transition"><i class="fas fa-sign-out-alt mr-2 w-4 text-center"></i> Logout</button>
                            </form>
                        @else
                            <a href="{{ route('login') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gold transition"><i class="fas fa-sign-in-alt mr-2 w-4 text-center"></i> Login</a>
                            <a href="{{ route('register') }}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-gold transition"><i class="fas fa-user-plus mr-2 w-4 text-center"></i> Register</a>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Main Header -->
<header class="bg-white shadow-sm sticky top-0 z-50 islamic-pattern">
    <nav class="container mx-auto px-4 py-4 flex justify-between items-center">
        <!-- Logo -->
        <a href="{{ route('frontend.index') }}" class="flex items-center">
            <img src="{{ asset('assets/logo.png') }}" alt="Dar-ul-uloom Logo" class="h-12 w-auto mr-3 rounded-full">
            <div>
                <span class="text-2xl font-bold text-gray-800 tracking-wider">DAR-UL-ULOOM</span>
                <p class="text-[12px] text-gray-500 uppercase tracking-[4px] -mt-1">Anwaar-e-Mustafa BOR</p>
            </div>
        </a>

        <!-- Navigation Links -->
        <div class="hidden lg:flex items-center space-x-8">
            <a href="{{ route('frontend.index') }}" class="nav-link-custom">HOME</a>
            <a href="{{ route('frontend.about') }}" class="nav-link-custom">ABOUT</a>
            <a href="{{ route('frontend.blog') }}" class="nav-link-custom">BLOG</a>
            <!-- <a href="{{ route('frontend.career') }}" class="nav-link-custom">CAREER</a> -->
            <a href="{{ route('frontend.admission.create') }}" class="nav-link-custom">ADMISSION</a>
            <a href="{{ route('frontend.contact') }}" class="nav-link-custom">CONTACT</a>
            
            <!-- <a href="#" class="btn-gold ml-4">VISIT US</a> -->
        </div>

        <!-- Mobile Menu Toggle -->
        <button class="lg:hidden text-gray-800 text-2xl focus:outline-none" onclick="toggleMobileMenu()">
            <i class="fas fa-bars"></i>
        </button>
    </nav>
    
    <!-- Mobile Menu -->
    <div id="mobile-menu" class="hidden lg:hidden bg-white border-t border-gray-100 py-4 px-4 space-y-4">
        <a href="{{ route('frontend.index') }}" class="block text-gray-800 font-medium border-b py-2">HOME</a>
        <a href="{{ route('frontend.about') }}" class="block text-gray-800 font-medium border-b py-2">ABOUT</a>
        <a href="{{ route('frontend.career') }}" class="block text-gray-800 font-medium border-b py-2">CAREER</a>
        <a href="{{ route('frontend.contact') }}" class="block text-gray-800 font-medium border-b py-2">CONTACT</a>
        <a href="#" class="block btn-gold text-center py-3">VISIT US</a>
    </div>
</header>
