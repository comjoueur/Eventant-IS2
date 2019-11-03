<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function GestionarPersonal(Request $request){
        $evento = "Evento1";
        $personal = [[1,'FIA 2019','22/10/19','31/10/19','Evento que agrupa las ferias más importantes',213],[2,'CONEISC','20/10/19','29/10/19','Evento de Tecnología']];
        return view('personal.GestionarPersonal',['evento'=>$evento,'personal'=>$personal]);
    }
    public function CrearPersonalstore(Request $request){
        return $this->GestionarPersonal($request);
    }
    public function ModificarPersonalstore(Request $request){
        return $this->GestionarPersonal($request);
    }
    public function CrearPersonal(Request $request){
        return view('personal.CrearPersonal');
    }
    public function ModificarPersonal(Request $request){
        return view('personal.ModificarPersonal');
    }
    public function EliminarPersonal(Request $request){
        return $this->GestionarPersonal($request);
    }
    public function OpcionPersonal(Request $request){
        if($request->botonopcion=='crear'){
            return $this->CrearPersonal($request);
        }
        else if($request->botonopcion=='eliminar'){
            return $this->EliminarPersonal($request);
        }
        else{
            return $this->ModificarPersonal($request);
        }
    }
}
