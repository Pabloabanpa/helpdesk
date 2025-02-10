<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'ticket_id' => 'required|exists:tickets,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'comentario' => 'required|string',
        ]);

        Comentario::create($request->all());
        return back();
    }
}
