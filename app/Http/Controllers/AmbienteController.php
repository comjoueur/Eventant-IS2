<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Ambiente;
use Illuminate\Http\Request;

class AmbienteController extends Controller
{
    public function GestionarAmbiente(Request $request){
        $ambientes=DB::table('ambientes')->select('id_amb','nombre','ubicacion','capacidad','descripcion')->where('Ambientesid_amb','=',$request->id_recinto)->get();
        for($i=0;$i<sizeof($ambientes);$i=$i+1){
            $ambientes[$i]->count=$i;
        }
        return view('ambiente.GestionarAmbiente', ['ambientes'=>$ambientes,'id_recinto'=>$request->id_recinto]);
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
