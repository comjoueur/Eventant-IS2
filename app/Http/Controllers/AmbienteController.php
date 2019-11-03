<?php

namespace App\Http\Controllers;

use App\Ambiente;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    public function GestionarAmbiente(){
        $ambientes=[[1,'D101','50 personas','Primer piso Edificio',23],[2,'N407','30 personas','San Lazaro',15]];
        return view('ambiente.GestionarAmbiente', ['ambientes'=>$ambientes]);
    }
    public function CrearAmbientestore(Request $request){
        return (new AmbienteController)->GestionarAmbiente($request);
    }
    public function AdaptarAmbientestore(Request $request){
        return (new AmbienteController)->GestionarAmbiente($request);
    }
    public function ModificarAmbientestore(Request $request){
        return (new AmbienteController)->GestionarAmbiente($request);
    }
    public function CrearAmbiente(Request $request){
        return view('ambiente.CrearAmbiente');
    }
    public function AdaptarAmbiente(Request $request){
        return view('ambiente.AdaptarAmbiente');
    }
    public function ModificarAmbiente(Request $request){
        return view('ambiente.ModificarAmbiente');
    }
    public function OpcionAmbiente(Request $request){
        if($request->botonopcion=='crear'){
            return $this->CrearAmbiente($request);
        }
        else if($request->botonopcion=='adaptar'){
            return $this->AdaptarAmbiente($request);
        }
        else{
            return $this->ModificarAmbiente($request);
        }
    }
}
