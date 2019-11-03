<?php

namespace App\Http\Controllers;

use App\Caja;
use Illuminate\Http\Request;

class CajaController extends Controller
{
    public function GestionarCaja(){
        return view('caja.GestionarCaja');
    }
}
