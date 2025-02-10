<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with('usuario')->get();
        return Inertia::render('Tickets/Index', ['tickets' => $tickets]);
    }

    public function create()
    {
        return Inertia::render('Tickets/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:150',
            'descripcion' => 'required',
            'estado' => 'required|in:pendiente,en_proceso,resuelto,terminado',
        ]);

        Ticket::create($request->all());
        return redirect()->route('tickets.index');
    }

    public function show(Ticket $ticket)
    {
        return Inertia::render('Tickets/Show', ['ticket' => $ticket]);
    }

    public function update(Request $request, Ticket $ticket)
    {
        $ticket->update($request->all());
        return redirect()->route('tickets.index');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();
        return redirect()->route('tickets.index');
    }
}
