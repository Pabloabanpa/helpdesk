<?php

namespace App\Http\Controllers;

use App\Models\HistorialTicket;
use Illuminate\Http\Request;

class HistorialController extends Controller
{
    public function index($ticket_id)
    {
        $historial = HistorialTicket::where('ticket_id', $ticket_id)->get();
        return response()->json($historial);
    }
}
