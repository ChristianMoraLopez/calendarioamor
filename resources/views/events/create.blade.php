<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/logo.svg" />
</head>

<body class="bg-gray-100">
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Crear o Editar Evento</h1>

        <div id="create-form" class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
            <h2 class="text-xl font-bold mb-4">Crear Evento</h2>
            <form action="{{ route('events.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="title" class="block">Título</label>
                    <input type="text" name="title" id="title" class="w-full border border-gray-300 rounded-md p-2" required>
                </div>
                <div>
                    <label for="description" class="block">Descripción</label>
                    <textarea name="description" id="description" class="w-full border border-gray-300 rounded-md p-2"></textarea>
                </div>
                <div>
                    <label for="date" class="block">Fecha</label>
                    <input type="date" name="date" id="date" class="w-full border border-gray-300 rounded-md p-2" required>
                </div>
                <div>
                    <label for="time" class="block">Hora</label>
                    <input type="time" name="time" id="time" class="w-full border border-gray-300 rounded-md p-2" required>
                </div>
                <div>
                    <label for="is_personal" class="block">¿Es personal?</label>
                    <select name="is_personal" id="is_personal" class="w-full border border-gray-300 rounded-md p-2">
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
                <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-md hover:bg-blue-600 transition duration-200">Guardar</button>
            </form>
        </div>

        <a href="{{ route('events.index') }}" class="block text-center mt-4 text-blue-500 hover:underline">Volver</a>
    </div>
</body>

</html>
