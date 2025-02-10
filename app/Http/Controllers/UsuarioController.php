<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function show(User $usuario)
    {
        return response()->json($usuario);
    }
}
