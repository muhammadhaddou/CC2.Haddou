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
<body class="font-sans antialiased text-gray-900 bg-dentist-light">
    <!-- Top Bar -->
    <div class="bg-dentist-navy text-white text-xs py-2">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between items-center">
            <div class="flex space-x-4 rtl:space-x-reverse">
                <a href="tel:+123456789" class="hover:text-dentist-blue transition">+123 456 789</a>
                <span class="text-gray-400">|</span>
                <a href="mailto:support@clinic.com" class="hover:text-dentist-blue transition">support@clinic.com</a>
            </div>
            <div class="flex space-x-4 rtl:space-x-reverse">
                <a href="#" class="hover:text-dentist-blue transition">Facebook</a>
                <a href="#" class="hover:text-dentist-blue transition">Twitter</a>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="bg-white shadow-sm sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-20">
                <div class="flex items-center">
                    <a href="/" class="text-3xl font-bold text-dentist-navy tracking-wider">
                        <span class="text-dentist-blue">Clinic</span>Offshoring
                    </a>
                </div>
                
                <div class="flex items-center space-x-4 rtl:space-x-reverse">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/dashboard') }}" class="text-dentist-navy hover:text-dentist-blue font-medium transition">
                                {{ __('messages.dashboard') ?? 'Dashboard' }}
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="text-dentist-navy hover:text-dentist-blue font-medium transition">
                                {{ __('messages.login') ?? 'Log in' }}
                            </a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="bg-dentist-blue hover:bg-blue-600 text-white px-6 py-2 rounded-full font-semibold shadow-md transition transform hover:-translate-y-0.5">
                                    {{ __('messages.register') ?? 'Register' }}
                                </a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative py-32 md:py-48 flex items-center justify-center bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1606811841689-23dfddce3e95?ixlib=rb-4.0.3&auto=format&fit=crop&w=1920&q=80');">
        <div class="absolute inset-0 bg-dentist-navy bg-opacity-80"></div>
        <div class="relative z-10 text-center text-white px-4 mt-8">
            <h6 class="text-uppercase tracking-widest mb-4 text-dentist-blue font-semibold">DON'T LOOK FURTHER, THIS IS YOUR DENTIST</h6>
            <h1 class="text-5xl md:text-7xl font-bold mb-6">Authentic Dental Service</h1>
            <p class="text-lg md:text-xl font-light text-gray-200 max-w-2xl mx-auto mb-10">
                Providing top quality service for your family. We are committed to giving you the best dental care and the most beautiful smile.
            </p>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/appointments') }}" class="bg-dentist-blue hover:bg-blue-600 text-white px-8 py-4 rounded-full font-bold text-lg shadow-lg transition transform hover:-translate-y-1">
                        Book an Appointment
                    </a>
                @else
                    <a href="{{ route('register') }}" class="bg-dentist-blue hover:bg-blue-600 text-white px-8 py-4 rounded-full font-bold text-lg shadow-lg transition transform hover:-translate-y-1">
                        Get Started Today
                    </a>
                @endauth
            @endif
        </div>
    </section>

</body>
</html>
