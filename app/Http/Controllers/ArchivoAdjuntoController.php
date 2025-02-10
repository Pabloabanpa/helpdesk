<?php

namespace App\Http\Controllers;

use App\Models\ArchivoAdjunto;
use Illuminate\Http\Request;

class ArchivoAdjuntoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'archivo' => 'required|file|max:2048',
        ]);

        $path = $request->file('archivo')->store('archivos');

        ArchivoAdjunto::create([
            'ticket_id' => $request->ticket_id,
            'ruta_archivo' => $path,
        ]);

        return back();
    }
}
