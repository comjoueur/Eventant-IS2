<?php

namespace App\Http\Controllers;

use App\Actividad;
use Illuminate\Http\Request;

class ActividadController extends Controller
{
    public function GestionarActividad(Request $request){
        $id_evento='3234';
        $evento="Evento1";
        $actividades=[[1,'Exposicion1','22/10/19','31/10/19','Se mostrara','32'],[2,'Taller 1','20/10/19','29/10/19','123','Se aprendera']];
        return view('actividad.GestionarActividad',['evento'=>$evento,'actividades'=>$actividades,'id_evento'=>$id_evento]);
    }
    public function CrearActividadstore(Request $request){
        return $this->GestionarActividad($request);
    }
    public function CrearActividad(Request $request){
        $encargado=['Felix','Mario','Juan'];
        $expositor=['Mario','Luque','Alonso'];
        $ambiente=['amb','amb1','amb2'];
        return view('actividad.CrearActividad',['ambientes'=>$ambiente,'encargados'=>$encargado,'expositor'=>$expositor]);
    }
    public function ModificarActividadstore(Request $request){
        return $this->GestionarActividad($request);
    }
    public function ModificarActividad(Request $request){
        $encargado=['Felix','Mario','Juan'];
        $expositor=['Mario','Luque','Alonso'];
        $ambiente=['amb','amb1','amb2'];
        return view('actividad.ModificarActividad',['ambientes'=>$ambiente,'encargados'=>$encargado,'expositor'=>$expositor]);
    }
    public function EliminarActividad(Request $request){
        return $this->GestionarActividad($request);
    }
    public function OpcionActividad(Request $request){
        if($request->botonopcion=='crear'){
            return $this->CrearActividad($request);
        }
        else if($request->botonopcion=='eliminar'){
            return $this->EliminarActividad($request);
        }
        else{
            return $this->ModificarActividad($request);
        }
    }
}
