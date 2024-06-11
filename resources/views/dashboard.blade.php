@auth
    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                {{ __('Lista de Eventos') }}
            </h2>
        </x-slot>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900 dark:text-gray-100">
                        <!-- Mostrar eventos -->
                        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                            {{ __('Eventos') }}
                        </h2>
                        <ul class="mt-4">
                            @forelse ($events as $event)
                                <li class="flex justify-between items-center py-2">
                                    <div>
                                        <a href="{{ secure_url(route('events.show', $event->id)) }}" class="font-semibold">{{ $event->title }}</a>
                                        <p class="text-sm text-gray-600">{{ $event->date }} a las {{ $event->time }}</p>
                                    </div>
                                    <form action="{{ secure_url(route('events.destroy', $event->id)) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-800 transition duration-200">Eliminar</button>
                                    </form>
                                </li>
                            @empty
                                <li>No hay eventos programados</li>
                            @endforelse
                        </ul>
                        <a href="{{ secure_url(route('events.create')) }}" class="block mt-4 text-lg font-semibold text-blue-600 hover:text-blue-800 transition duration-200">Crear nuevo evento</a>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>
@endauth
