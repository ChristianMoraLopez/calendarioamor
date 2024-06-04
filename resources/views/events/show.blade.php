<x-app-layout>
    <div class="py-12 bg-white dark:bg-gray-800">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl font-extrabold text-gray-900 dark:text-white mb-8">{{ $event->title }}</h1>
            <p class="text-lg text-gray-800 dark:text-gray-300 leading-relaxed mb-8">{{ $event->description }}</p>
            <div class="flex flex-col md:flex-row justify-between items-center text-gray-700 dark:text-gray-400 mb-8">
                <div class="flex items-center mb-4 md:mb-0">
                    <i class="far fa-calendar-alt text-lg mr-2"></i>
                    <p class="text-sm md:text-base">{{ $event->date }}</p>
                </div>
                <div class="flex items-center">
                    <i class="far fa-clock text-lg mr-2"></i>
                    <p class="text-sm md:text-base">{{ $event->time }}</p>
                </div>
            </div>
            <a href="{{ route('events.index') }}" class="inline-block bg-blue-600 hover:bg-blue-700 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 shadow-lg transform hover:-translate-y-1">Volver</a>
        </div>
    </div>
</x-app-layout>

<style>
    /* Estilos adicionales */
    .bg-white.dark\:bg-gray-800 {
        background-color: white;
    }

    .bg-white.dark\:bg-gray-800 .text-gray-900 {
        color: #1f2937;
    }

    .bg-white.dark\:bg-gray-800 .text-gray-800 {
        color: #374151;
    }

    .bg-white.dark\:bg-gray-800 .text-gray-700 {
        color: #4b5563;
    }

    .bg-white.dark\:bg-gray-800 .text-gray-500 {
        color: #6b7280;
    }

    .bg-white.dark\:bg-gray-800 .text-gray-300 {
        color: #d1d5db;
    }

    .bg-white.dark\:bg-gray-800 .text-gray-400 {
        color: #9ca3af;
    }

    .bg-white.dark\:bg-gray-800 .bg-blue-600 {
        background-color: #2563eb;
    }

    .bg-white.dark\:bg-gray-800 .bg-blue-600:hover {
        background-color: #1d4ed8;
    }

    .bg-white.dark\:bg-gray-800 .shadow-lg {
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    }

    .bg-white.dark\:bg-gray-800 .hover\:translate-y-1:hover {
        transform: translateY(-1px);
    }

    /* Estilos adicionales para el título */
    .text-4xl {
        font-size: 2.5rem;
        line-height: 1.2;
    }

    /* Estilos adicionales para el párrafo */
    .text-lg {
        font-size: 1.125rem;
        line-height: 1.75;
    }

    /* Estilos adicionales para el enlace */
    .inline-block {
        display: inline-block;
        vertical-align: middle;
    }

    .bg-blue-600 {
        background-color: #2563eb;
    }

    .bg-blue-600:hover {
        background-color: #1d4ed8;
    }

    .text-white {
        color: #fff;
    }

    .font-semibold {
        font-weight: 600;
    }

    .py-3 {
        padding-top: 0.75rem;
        padding-bottom: 0.75rem;
    }

    .px-6 {
        padding-left: 1.5rem;
        padding-right: 1.5rem;
    }

    .rounded-lg {
        border-radius: 0.5rem;
    }

    .transition {
        transition-property: background-color, border-color, color, fill, stroke, opacity, box-shadow, transform;
    }

    .duration-200 {
        transition-duration: 200ms;
    }

    .shadow-lg {
        box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.25);
    }

    .transform {
        transform: translate3d(0, 0, 0);
    }

    .hover\:translate-y-1:hover {
        transform: translateY(-0.25rem);
    }
</style>
