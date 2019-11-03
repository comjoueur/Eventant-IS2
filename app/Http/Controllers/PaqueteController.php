<?php

namespace App\Http\Controllers;

use App\Paquete;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    public function GestionarPaquete(Request $request){
        return view('paquete.GestionarPaquete');
    }
}
