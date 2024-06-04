<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
        // Obtener solo los eventos del usuario autenticado
        $events = Event::where('user_id', Auth::id())->get();
        return view('dashboard', compact('events'));
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'date' => 'required|date',
            'time' => 'required',
        ]);

        Event::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'time' => $request->time,
            'is_personal' => $request->is_personal,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function destroy(Event $event)
    {
        // Eliminar el evento
        $event->delete();

        // Reiniciar la secuencia de autoincremento
        DB::statement('ALTER TABLE events AUTO_INCREMENT = 1');

        // Redireccionar a la página de eventos o a cualquier otra página deseada
        return redirect()->route('events.index')->with('success', 'Evento eliminado correctamente');
    }
}
