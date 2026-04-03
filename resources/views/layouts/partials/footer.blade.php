<!-- Footer -->
<footer class="bg-dark text-gray-400 pt-16 pb-8">
    <div class="container mx-auto px-4 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
        <!-- Widget 1: About -->
        <div>
            <div class="flex items-center mb-6">
                <img src="{{ asset('assets/logo.png') }}" alt="Anwaar-e-Mustafa Logo" class="h-10 w-auto mr-3 rounded-full">
                <span class="text-xl font-bold text-white tracking-wider">ANWAAR-E-MUSTAFA BOR</span>
            </div>
            <p class="mb-6 leading-relaxed">
                Anwaar-e-Mustafa is dedicated to providing high-quality Islamic education and fostering a strong community founded on the principles of Islam.
            </p>
            <div class="flex space-x-3 text-white">
                <a href="#" class="w-10 h-10 rounded-full border border-gray-700 flex items-center justify-center hover:bg-gold hover:border-gold transition"><i class="fab fa-twitter"></i></a>
                <a href="#" class="w-10 h-10 rounded-full border border-gray-700 flex items-center justify-center hover:bg-gold hover:border-gold transition"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="w-10 h-10 rounded-full border border-gray-700 flex items-center justify-center hover:bg-gold hover:border-gold transition"><i class="fab fa-instagram"></i></a>
            </div>
        </div>

        <!-- Widget 2: Quick Links -->
        <div>
            <h3 class="footer-widget-title">Quick Links</h3>
            <ul class="space-y-3 mt-8">
                <li><a href="{{ route('frontend.about') }}" class="hover:text-gold transition"><i class="fas fa-chevron-right text-[10px] mr-2 text-gold"></i> About Us</a></li>
                <li><a href="{{ route('frontend.admission.create') }}" class="hover:text-gold transition"><i class="fas fa-chevron-right text-[10px] mr-2 text-gold"></i> Admission</a></li>
                <li><a href="{{ route('frontend.blog') }}" class="hover:text-gold transition"><i class="fas fa-chevron-right text-[10px] mr-2 text-gold"></i> Blog & News</a></li>
                <li><a href="{{ route('frontend.contact') }}" class="hover:text-gold transition"><i class="fas fa-chevron-right text-[10px] mr-2 text-gold"></i> Contact Us</a></li>
            </ul>
        </div>

        <!-- Widget 3: Useful Links -->
        <div>
            <h3 class="footer-widget-title">Useful Links</h3>
            <ul class="space-y-3 mt-8">
                <li><a href="{{ route('frontend.contact') }}" class="hover:text-gold transition"><i class="fas fa-chevron-right text-[10px] mr-2 text-gold"></i> Contact Us</a></li>
                <li><a href="#" class="hover:text-gold transition"><i class="fas fa-chevron-right text-[10px] mr-2 text-gold"></i> Terms & Conditions</a></li>
                <li><a href="#" class="hover:text-gold transition"><i class="fas fa-chevron-right text-[10px] mr-2 text-gold"></i> Privacy Policy</a></li>
                <li><a href="#" class="hover:text-gold transition"><i class="fas fa-chevron-right text-[10px] mr-2 text-gold"></i> Cookies Policy</a></li>
            </ul>
        </div>

        <!-- Widget 4: Contact -->
        <div>
            <h3 class="footer-widget-title">Contact Us</h3>
            <ul class="space-y-4 mt-8">
                <li class="flex items-start">
                    <i class="fas fa-map-marker-alt text-gold mt-1 mr-3"></i>
                    <span>Block B Main Boulevard, Board of Revenue Housing Society BOR Society, Lahore</span>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-phone-alt text-gold mr-3"></i>
                    <span>+22 33 4455 6677</span>
                </li>
                <li class="flex items-center">
                    <i class="fas fa-envelope text-gold mr-3"></i>
                    <span>info@anwaar-e-mustafa.com</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="container mx-auto px-4 mt-16 pt-8 border-t border-gray-800 flex flex-col md:row justify-between items-center text-sm">
        <p>&copy; {{ date('Y') }} Anwaar-e-Mustafa. All rights reserved.</p>
        <div class="mt-4 md:mt-0 flex space-x-6">
            <a href="#" class="hover:text-gold transition">Private Policy</a>
            <a href="#" class="hover:text-gold transition">Terms & Condition</a>
        </div>
    </div>
</footer>
