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
        $id_amb=DB::table('ambientes')->insertGetId(
            ['id_amb' => NULL, 'nombre' => $request->ambiente , 'ubicacion' => $request->ubicacion , 'capacidad' => $request->capacidad, 'descripcion' => $request->descripcion, 'Ambientesid_amb' => $request->id_recinto]
        );
        $request->merge(['id_amb' => $id_amb]);
        return (new MaterialEController)->GestionarMaterialE($request);
    }
    public function AdaptarAmbientestore(Request $request){
        $id_amb=DB::table('ambientes')->insertGetId(
            ['id_amb' => NULL, 'nombre' => $request->ambiente , 'ubicacion' => $request->ubicacion , 'capacidad' => $request->capacidad, 'descripcion' => $request->descripcion, 'Ambientesid_amb' => $request->id_recinto]
        );
        $request->merge(['id_amb' => $id_amb]);
        return (new MaterialEController)->GestionarMaterialE($request);
    }
    public function ModificarAmbientestore(Request $request){
        DB::table('ambientes')->where('id_amb','=',$request->id_amb)->update(['nombre' => $request->ambiente , 'ubicacion' => $request->ubicacion , 'capacidad' => $request->capacidad, 'descripcion' => $request->descripcion, 'Ambientesid_amb' => $request->id_recinto]);
        return (new MaterialEController)->GestionarMaterialE($request);
    }
    public function CrearAmbiente(Request $request){
        $id_recinto=$request->id_recinto;
        return view('ambiente.CrearAmbiente',['id_recinto'=>$id_recinto]);
    }
    public function AdaptarAmbiente(Request $request){
        $id_recinto=$request->id_recinto;
        $id_amb=$request->ambiente;
        $data=DB::table('ambientes')->select('id_amb','nombre','ubicacion','capacidad','descripcion')->where('id_amb','=',$id_amb)->get();
        $data[0]->id_recinto=$id_recinto;
        return view('ambiente.AdaptarAmbiente',['data'=>$data[0]]);
    }
    public function ModificarAmbiente(Request $request){
        $id_recinto=$request->id_recinto;
        $id_amb=$request->ambiente;
        $data=DB::table('ambientes')->select('id_amb','nombre','ubicacion','capacidad','descripcion')->where('id_amb','=',$id_amb)->get();
        $data[0]->id_recinto=$id_recinto;
        return view('ambiente.ModificarAmbiente',['data'=>$data[0]]);
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
