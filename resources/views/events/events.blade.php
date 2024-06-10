<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link rel="stylesheet" href="{{ secure_asset('css/styles.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/logo.svg') }}">
</head>

<body>
    <header class="header">
        <h1 class="header-title">Programa tus eventos aquí</h1>
        <a href="{{ route('events.create') }}" class="header-link">Crear nuevo evento</a>
    </header>

    <section class="event-list">
        <ul class="event-list-ul">
            @if (count($events) === 0)
            <li class="event-list-item">No hay eventos programados</li>
            @else
            @foreach ($events as $event)
            <li class="event-list-item">
                <div class="event-details">
                    <h2 class="event-title">{{ $event->title }}</h2>
                    <p class="event-info">{{ $event->date }} a las {{ $event->time }}</p>
                </div>
                <div class="event-actions">

                    <form action="{{ route('events.destroy', $event->id) }}" method="POST" class="delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-btn">Eliminar</button>
                    </form>
                </div>
            </li>
            @endforeach
            @endif
        </ul>
    </section>

    <footer class="footer">
        <a href="{{ route('events.index') }}" class="footer-link">Volver</a>
    </footer>
</body>

</html>
