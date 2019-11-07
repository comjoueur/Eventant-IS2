<?php

namespace App\Http\Controllers;

use App\Material;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MaterialController extends Controller
{
    public function GestionarMaterial(Request $request){
        $id_evento = $request->id_evento;
        $materiales = DB::table('materiales')
            ->join('almacenes','almacenes.Materialesid_mat','=','materiales.id_mat')
            ->select('id_mat','descripcion','nombre','cantidad')
            ->where('almacenes.Eventosid_evento','=',$id_evento)->get();
        for($i=0;$i<sizeof($materiales);$i=$i+1){
            $materiales[$i]->count=$i+1;
        }
        return view('material.GestionarMaterial',['id_evento'=>$id_evento,'materiales'=>$materiales]);
    }
    public function CrearMaterialstore(Request $request){
        $id_evento= $request->id_evento;
        $id_mat=DB::table('materiales')
            ->insertGetId(['nombre'=>$request->nombre,'descripcion'=>$request->descripcion]);
        DB::table('almacenes')->insert(['Materialesid_mat'=>$id_mat,'Eventosid_evento'=>$id_evento,'cantidad'=>$request->cantidad]);
        return $this->GestionarMaterial($request);
    }
    public function ModificarMaterialstore(Request $request){
        $id_evento=$request->id_evento;
        $id_mat=$request->id_mat;
        DB::table('materiales')
            ->where('id_mat','=',$id_mat)
            ->update(['nombre'=>$request->nombre,'descripcion'=>$request->descripcion]);
        DB::table('almacenes')
            ->where('Materialesid_mat','=',$id_mat)
            ->where('Eventosid_evento','=',$id_evento)
            ->update(['cantidad'=>$request->cantidad]);
        return $this->GestionarMaterial($request);
    }
    public function CrearMaterial(Request $request){
        $id_evento=$request->id_evento;
        return view('material.CrearMaterial',['id_evento'=>$id_evento]);
    }
    public function ModificarMaterial(Request $request){
        $id_evento=$request->id_evento;
        $id_mat=$request->material;
        $data=DB::table('materiales')
            ->join('almacenes','almacenes.Materialesid_mat','=','materiales.id_mat')
            ->where('almacenes.Eventosid_evento','=',$id_evento)
            ->where('id_mat','=',$id_mat)
            ->select('id_mat','descripcion','nombre','cantidad')->first();
        $data->id_evento = $id_evento;
            
        return view('material.ModificarMaterial',['data'=>$data]);
    }
    public function EliminarMaterial(Request $request){
        $id_evento=$request->id_evento;
        $id_mat=$request->material;
        DB::table('almacenes')
            ->where('Eventosid_evento','=',$id_evento)
            ->where('Materialesid_mat','=',$id_mat)->delete();
        DB::table('materiales')
            ->where('id_mat','=',$id_mat)->delete();
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
