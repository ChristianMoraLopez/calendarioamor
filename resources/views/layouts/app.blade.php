<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" href="{{ secure_asset('images/favicon.ico') }}" type="image/x-icon">
    <title>{{ config('app.name', 'Calendar') }}</title>

    <!-- Fonts and Icons -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">



   <!-- Scripts -->
   @vite(['resources/css/app.css', 'resources/js/app.js'])
        <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>



</head>
<body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
        <header class="bg-white dark:bg-gray-800 shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $header }}
            </div>
        </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <footer class="bg-gray-800 text-white py-8">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col items-center">
        <div class="donate-real mb-4">
            <a href="https://biz.payulatam.com/B0f650147B1A412"><img src="https://ecommerce.payulatam.com/img-secure-2015/boton_pagar_grande.png"></a>
            <p class="text-center mt-2">¡Haz una diferencia real con tu donación!</p>
        </div>

        <!-- Opcional: Puedes agregar más contenido al footer aquí -->

        <div class="social-links mt-4">
            <!-- Agrega tus íconos de redes sociales aquí -->
        </div>
    </div>
</footer>
</html>
