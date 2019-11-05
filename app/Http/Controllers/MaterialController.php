<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function GestionarMaterial(Request $request){
        $evento = "Evento1";
        $materiales = [[1,'Material1','Desc...',1000],[2,'MAterial2','Desc...',500]];
        return view('material.GestionarMaterial',['evento'=>$evento,'materiales'=>$materiales]);
    }
    public function CrearMaterialstore(Request $request){
        return $this->GestionarMaterial($request);
    }
    public function ModificarMaterialstore(Request $request){
        return $this->GestionarMaterial($request);
    }
    public function CrearMaterial(Request $request){
        return view('material.CrearMaterial');
    }
    public function ModificarMaterial(Request $request){
        return view('material.ModificarMaterial');
    }
    public function EliminarMaterial(Request $request){
        return $this->GestionarMaterial($request);
    }
    
    public function OpcionMaterial(Request $request){
        if($request->botonopcion=='crear'){
            return $this->CrearMaterial($request);
        }
        else if($request->botonopcion=='eliminar'){
            return $this->EliminarMaterial($request);
        }
        else{
            return $this->ModificarMaterial($request);
        }
    }
}
