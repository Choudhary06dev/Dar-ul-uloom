<div class="sticky top-0 z-50 shadow-sm overflow-visible">
    <!-- Header Top Bar -->
    <div class="header-top bg-navy text-white py-2 relative z-[100]">
        <div class="container flex justify-between items-center text-[13px]">
            <div class="hidden md:flex space-x-4">
                <a href="#" class="hover:text-gold transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-gold transition"><i class="fab fa-pinterest"></i></a>
                <a href="#" class="hover:text-gold transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="hover:text-gold transition"><i class="fab fa-instagram"></i></a>
            </div>
            <div class="flex items-center space-x-4 md:space-x-6 w-full md:w-auto justify-between md:justify-end">
                <div class="flex items-center whitespace-nowrap"><i class="fas fa-phone mr-2 text-gold"></i> +22 33 4455 6677</div>
                <div class="hidden lg:flex items-center"><i class="fas fa-envelope mr-2 text-gold"></i> info@anwaar-e-mustafa.com</div>
                <!-- Account Dropdown -->
                <div class="relative group">
                    <button class="hover:text-gold transition flex items-center font-medium focus:outline-none">
                        <i class="fas fa-user-circle text-lg mr-1"></i> Account <i class="fas fa-chevron-down ml-1 text-[10px]"></i>
                    </button>
                    
                    <!-- Dropdown Menu -->
                    <div class="absolute right-0 mt-0 w-56 bg-white rounded-xl shadow-2xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transform origin-top-right border border-gray-100 -translate-y-2 group-hover:translate-y-0 z-[110] pointer-events-none group-hover:pointer-events-auto" style="top: 100%;">
                        <div class="absolute inset-x-0 -top-4 h-4 bg-transparent"></div> <!-- Hover bridge -->
                        <div class="p-3">
                            @if(auth('student')->check() || auth('web')->check())
                                @php
                                    $currentUser = auth('student')->check() ? auth('student')->user() : auth('web')->user();
                                    $isWebUser = auth('web')->check();
                                @endphp
                                <div class="px-4 py-3 border-b border-gray-50 mb-2">
                                    <div class="text-xs text-gray-500 uppercase tracking-wider mb-1">Welcome</div>
                                    <div class="text-sm font-bold text-navy truncate">{{ $currentUser->name }}</div>
                                </div>
                                <a href="{{ $isWebUser ? route('frontend.management.admissions.index') : route('frontend.profile.dashboard') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-600 hover:bg-gold/10 hover:text-gold rounded-lg transition active:scale-95">
                                    <i class="fas fa-th-large mr-3 w-4 text-center"></i> {{ $isWebUser ? 'Management' : 'My Dashboard' }}
                                </a>
                                @if($isWebUser)
                                <a href="{{ route('frontend.management.admissions.index') }}" class="flex items-center px-4 py-2.5 text-sm text-amber-600 bg-amber-50/50 hover:bg-amber-100/50 rounded-lg transition active:scale-95 font-bold">
                                    <i class="fas fa-tasks mr-3 w-4 text-center"></i> Management
                                </a>
                                @endif
                                <a href="{{ route('frontend.profile.edit') }}" class="flex items-center px-4 py-2.5 text-sm text-gray-600 hover:bg-gold/10 hover:text-gold rounded-lg transition active:scale-95">
                                    <i class="fas fa-user-edit mr-3 w-4 text-center"></i> Edit Profile
                                </a>
                                <form method="POST" action="{{ route('logout') }}" class="w-full">
                                    @csrf
                                    <button type="submit" class="flex items-center w-full text-left px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 hover:text-red-500 rounded-lg transition"><i class="fas fa-sign-out-alt mr-3 w-4 text-center"></i> Logout</button>
                                </form>
                            @else
                                <div class="space-y-2 pt-1">
                                    <a href="{{ route('login') }}" class="flex items-center justify-center w-full px-4 py-3 bg-navy text-white text-sm font-bold rounded-xl hover:bg-gold transition shadow-md">
                                        <i class="fas fa-sign-in-alt mr-2"></i> LOGIN
                                    </a>
                                    <a href="{{ route('register') }}" class="flex items-center justify-center w-full px-4 py-3 border-2 border-navy text-navy text-sm font-bold rounded-xl hover:bg-navy hover:text-white transition">
                                        <i class="fas fa-user-plus mr-2"></i> REGISTER
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Header -->
    <header class="bg-white islamic-pattern relative z-10">
        <nav class="container py-4 flex justify-between items-center">
            <!-- Logo -->
            <a href="{{ route('frontend.index') }}" class="flex items-center">
                <img src="{{ asset('assets/logo.png') }}" alt="Anwaar-e-Mustafa Logo" class="h-10 md:h-12 w-auto mr-3 rounded-full shadow-sm">
                 <div>
                    <span class="text-xl md:text-2xl font-bold text-gray-800 tracking-wider">Anwaar-e-Mustafa BOR</span>
                    <p class="text-[10px] md:text-[12px] text-gray-500 uppercase tracking-[2px] md:tracking-[4px] -mt-1 whitespace-normal break-words">Tahfeez-Ul Quran Institute</p>
                </div>
            </a>
    
            <!-- Navigation Links -->
            <div class="hidden lg:flex items-center space-x-8">
                <a href="{{ route('frontend.index') }}" class="nav-link-custom {{ Route::is('frontend.index') ? 'active' : '' }}">HOME</a>
                <a href="{{ route('frontend.about') }}" class="nav-link-custom {{ Route::is('frontend.about') ? 'active' : '' }}">ABOUT</a>
                <a href="{{ route('frontend.blog') }}" class="nav-link-custom {{ Route::is('frontend.blog*') ? 'active' : '' }}">BLOG</a>
                @if(auth('student')->check() || auth('web')->check())
                    <a href="{{ route('frontend.admission.create') }}" class="nav-link-custom {{ Route::is('frontend.admission*') ? 'active' : '' }}">ADMISSION</a>
                @endif
                <a href="{{ route('frontend.contact') }}" class="nav-link-custom {{ Route::is('frontend.contact') ? 'active' : '' }}">CONTACT</a>
            </div>
    
            <!-- Mobile Menu Toggle -->
            <button class="lg:hidden text-gray-800 text-2xl focus:outline-none p-2 hover:bg-gray-50 rounded-lg transition" onclick="toggleMobileMenu()">
                <i class="fas fa-bars"></i>
            </button>
        </nav>
    </header>
</div>

<!-- Mobile Menu (Outside sticky container to avoid clipping) -->
<div id="mobile-menu" class="hidden lg:hidden fixed inset-x-0 bg-white border-t border-gray-100 py-6 px-6 space-y-4 shadow-xl z-[40]">
    <a href="{{ route('frontend.index') }}" class="block text-gray-800 font-bold border-b border-gray-50 py-3 {{ Route::is('frontend.index') ? 'text-gold' : '' }}">HOME</a>
    <a href="{{ route('frontend.about') }}" class="block text-gray-800 font-bold border-b border-gray-50 py-3 {{ Route::is('frontend.about') ? 'text-gold' : '' }}">ABOUT</a>
    <a href="{{ route('frontend.blog') }}" class="block text-gray-800 font-bold border-b border-gray-50 py-3 {{ Route::is('frontend.blog*') ? 'text-gold' : '' }}">BLOG</a>
    @if(auth('student')->check() || auth('web')->check())
        <a href="{{ route('frontend.admission.create') }}" class="block text-gray-800 font-bold border-b border-gray-50 py-3 {{ Route::is('frontend.admission*') ? 'text-gold' : '' }}">ADMISSION</a>
    @endif
    <a href="{{ route('frontend.contact') }}" class="block text-gray-800 font-bold border-b border-gray-50 py-3 {{ Route::is('frontend.contact') ? 'text-gold' : '' }}">CONTACT</a>
    
    <!-- Mobile Account Links -->
    <div class="pt-4 border-t border-gray-100">
        @if(auth('student')->check() || auth('web')->check())
            @php
                $currentUser = auth('student')->check() ? auth('student')->user() : auth('web')->user();
                $isWebUser = auth('web')->check();
            @endphp
            <div class="flex items-center mb-4 px-2">
                <div class="w-10 h-10 rounded-full bg-gold/10 flex items-center justify-center text-gold mr-3">
                    <i class="fas fa-user"></i>
                </div>
                <div>
                    <div class="text-sm font-bold text-gray-800">{{ $currentUser->name }}</div>
                    <div class="text-xs text-gray-500">{{ $isWebUser ? (auth('web')->user()->is_admin ? 'Admin' : 'Staff') : 'Student' }} Account</div>
                </div>
            </div>
            <a href="{{ $isWebUser ? route('frontend.management.admissions.index') : route('frontend.profile.dashboard') }}" class="block text-gray-700 font-medium py-3 border-b border-gray-50 hover:text-gold transition"><i class="fas fa-th-large mr-3 text-gold"></i> {{ $isWebUser ? 'Management' : 'My Dashboard' }}</a>
            @if($isWebUser)
            <a href="{{ route('frontend.management.admissions.index') }}" class="block text-amber-600 font-bold py-3 border-b border-gray-50 hover:text-amber-700 transition font-bold"><i class="fas fa-tasks mr-3 text-amber-600"></i> Management</a>
            @endif
            <a href="{{ route('frontend.profile.edit') }}" class="block text-gray-700 font-medium py-3 border-b border-gray-50 hover:text-gold transition"><i class="fas fa-user-edit mr-3 text-gold"></i> Edit Profile</a>
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full text-left text-gray-700 font-medium py-2 hover:text-gold transition"><i class="fas fa-sign-out-alt mr-2"></i> Logout</button>
            </form>
        @else
            <div class="grid grid-cols-2 gap-4">
                <a href="{{ route('login') }}" class="text-center py-2 border border-gold text-gold font-bold rounded-lg hover:bg-gold hover:text-white transition">LOGIN</a>
                <a href="{{ route('register') }}" class="text-center py-2 bg-gold text-white font-bold rounded-lg hover:bg-navy transition shadow-sm">REGISTER</a>
            </div>
        @endif
    </div>

    <a href="#" class="block btn-gold text-center py-4 mt-6 rounded-xl shadow-lg">VISIT US</a>
</div>
