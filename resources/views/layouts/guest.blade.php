<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased bg-premium-light">
        <div class="min-h-screen flex">
            <!-- Left side with image -->
            <div class="hidden lg:block lg:w-1/2 bg-cover bg-center relative" style="background-image: url('https://images.unsplash.com/photo-1606811841689-23dfddce3e95?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80');">
                <div class="absolute inset-0 bg-premium-navy bg-opacity-80 flex items-center justify-center">
                    <div class="text-white text-center px-12">
                        <h1 class="text-5xl font-bold mb-6">Authentic Dental Service</h1>
                        <p class="text-lg font-light text-gray-200">Don’t look further, This is your Dentist. Providing top quality service for your family.</p>
                    </div>
                </div>
            </div>
            
            <!-- Right side with form -->
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center p-8 bg-premium-light">
                <div>
                    <a href="/">
                        <div class="text-4xl font-bold text-premium-navy mb-8 tracking-wider">
                            <span class="text-premium-primary">Clinic</span>Offshoring
                        </div>
                    </a>
                </div>

                <div class="w-full sm:max-w-md px-10 py-12 bg-white shadow-2xl overflow-hidden rounded-2xl border-t-4 border-premium-primary">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </body>
</html>
