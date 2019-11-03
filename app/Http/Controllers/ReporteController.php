<?php

namespace App\Http\Controllers;

use App\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    public function GestionarReporte(){
        return view('reporte.GestionarReporte');
    }
}
