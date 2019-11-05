<?php

namespace App\Http\Controllers;

use App\Paquete;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    public function GestionarPaquete(Request $request){
        $evento = "Evento1";
        $paquetes = [[1,'Combo1'],[2,'Combo2']];
        $actividades= [[1,'Act1'],[1,'Act2'],[1,'Act3'],[2,'Act1'],[2,'Act3'] ];
        return view('paquete.GestionarPaquete',['evento'=>$evento,'paquetes'=>$paquetes,'actividades'=>$actividades]);
    }
    public function CrearPaquetestore(Request $request){
        return $this->GestionarPaquete($request);
    }
    public function ModificarPaquetestore(Request $request){
        return $this->GestionarPaquete($request);
    }
    public function CrearPaquete(Request $request){
        $actividades= [[10,'Act1'],[12,'Act2'],[13,'Act3']];
        return view('Paquete.CrearPaquete',['actividades'=>$actividades]);
    }
    public function ModificarPaquete(Request $request){
        $actividades= [[10,'Act1'],[12,'Act2'],[13,'Act3']];
        return view('Paquete.ModificarPaquete',['actividades'=>$actividades]);
    }
    public function EliminarPaquete(Request $request){
        return $this->GestionarPaquete($request);
    }
    
    public function OpcionPaquete(Request $request){
        if($request->botonopcion=='crear'){
            return $this->CrearPaquete($request);
        }
        else if($request->botonopcion=='eliminar'){
            return $this->EliminarPaquete($request);
        }
        else{
            return $this->ModificarPaquete($request);
        }
    }
}
