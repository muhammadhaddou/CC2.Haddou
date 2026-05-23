<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ClinicOffshoring</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased text-gray-900 bg-premium-light">
    <!-- Top Bar -->
    <div class="bg-premium-navy text-white text-xs py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex space-x-4 rtl:space-x-reverse">
                <a href="tel:+123456789" class="hover:text-premium-primary transition">+123 456 789</a>
                <span class="text-gray-400">|</span>
                <a href="mailto:support@clinic.com" class="hover:text-premium-primary transition">support@clinic.com</a>
            </div>
            <div class="flex space-x-4 rtl:space-x-reverse">
                <a href="#" class="hover:text-premium-primary transition">Facebook</a>
                <a href="#" class="hover:text-premium-primary transition">Twitter</a>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="/" class="text-3xl font-bold text-premium-navy tracking-wider">
                        <span class="text-premium-primary">Clinic</span>Offshoring
                    </a>
                </div>
                
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-premium-navy hover:text-premium-primary font-medium transition">
                                {{ __('messages.dashboard') ?? 'Dashboard' }}
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-premium-navy hover:text-premium-primary font-medium transition">
                                {{ __('messages.login') ?? 'Log in' }}
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-premium-primary hover:bg-blue-600 text-white px-6 py-2 rounded-full font-semibold shadow-md transition transform hover:-translate-y-0.5">
                                    {{ __('messages.register') ?? 'Register' }}
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>
    <!-- Premium Hero Section -->
    <div class="relative min-h-[85vh] flex items-center bg-gradient-to-br from-premium-light via-white to-premium-secondary/10 overflow-hidden">
        <!-- Floating abstract shapes -->
        <div class="absolute top-0 right-0 -mr-20 -mt-20 w-96 h-96 rounded-full bg-premium-secondary/20 blur-3xl opacity-50 animate-pulse"></div>
        <div class="absolute bottom-0 left-0 -ml-20 -mb-20 w-80 h-80 rounded-full bg-premium-primary/20 blur-3xl opacity-50 animate-pulse"></div>

        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full flex flex-col md:flex-row items-center">
            
            <div class="md:w-1/2 md:pr-10 z-10">
                <h6 class="text-sm tracking-[0.2em] mb-4 text-premium-primary font-bold uppercase">Modern Healthcare Excellence</h6>
                <h1 class="text-5xl md:text-6xl font-extrabold text-premium-navy leading-tight mb-6">
                    Redefining <br>
                    <span class="text-transparent bg-clip-text bg-gradient-to-r from-premium-primary to-premium-secondary">Patient Care</span>
                </h1>
                <p class="text-xl text-gray-600 mb-10 max-w-lg leading-relaxed">
                    Experience state-of-the-art medical services with our world-class professionals. Your well-being is our ultimate priority.
                </p>
                <div class="flex flex-col sm:flex-row gap-4">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/appointments') }}" class="bg-gradient-to-r from-premium-primary to-indigo-500 hover:from-indigo-500 hover:to-premium-primary text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl shadow-premium-primary/30 transition-all transform hover:-translate-y-1 text-center">
                                Book an Appointment
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="bg-gradient-to-r from-premium-primary to-indigo-500 hover:from-indigo-500 hover:to-premium-primary text-white px-8 py-4 rounded-full font-bold text-lg shadow-xl shadow-premium-primary/30 transition-all transform hover:-translate-y-1 text-center">
                                Get Started Today
                            </a>
                        @endauth
                    @endif
                </div>
            </div>

            <!-- Glassmorphism decorative card -->
            <div class="md:w-1/2 mt-12 md:mt-0 relative hidden md:block">
                <div class="relative w-full h-[500px]">
                    <div class="absolute inset-0 bg-gradient-to-tr from-premium-primary/20 to-premium-secondary/20 rounded-3xl blur-2xl transform rotate-3 scale-105"></div>
                    <div class="absolute inset-0 bg-white/40 backdrop-blur-xl border border-white/60 shadow-2xl rounded-3xl overflow-hidden flex flex-col p-8">
                        <div class="flex justify-between items-center mb-8">
                            <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-premium-primary to-premium-secondary flex items-center justify-center text-white shadow-lg">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </div>
                            <div class="bg-green-100 text-green-700 px-4 py-1 rounded-full text-sm font-semibold">Available Today</div>
                        </div>
                        <h3 class="text-2xl font-bold text-premium-navy mb-2">Expert Consultations</h3>
                        <p class="text-gray-600 mb-6">Connect with top-tier specialists directly through our seamless portal.</p>
                        
                        <div class="mt-auto bg-white/60 rounded-2xl p-4 flex items-center gap-4">
                            <div class="w-12 h-12 rounded-full bg-premium-light border-2 border-white shadow-inner flex items-center justify-center text-premium-navy font-bold">Dr</div>
                            <div>
                                <div class="font-bold text-premium-navy">Dr. Amine Benali</div>
                                <div class="text-sm text-gray-500">Chief Specialist</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
    </div>

</body>
</html>
