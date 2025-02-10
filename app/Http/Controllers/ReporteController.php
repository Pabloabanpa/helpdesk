<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function generar()
    {
        $reportes = Ticket::all();
        return response()->json($reportes);
    }
}
