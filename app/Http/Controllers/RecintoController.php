<?php

namespace App\Http\Controllers;

use App\Recinto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class RecintoController extends Controller
{
    public function GestionarRecinto(){

        $recintos=DB::table('ambientes')->select('id_amb','nombre','ubicacion','capacidad','descripcion')->where('Ambientesid_amb','=',NULL)->get();
        for($i=0;$i<sizeof($recintos);$i=$i+1){
            $recintos[$i]->count=$i;
        }
        return view('recinto.GestionarRecinto', ['recintos'=>$recintos]);
    }
    public function CrearRecintostore(Request $request){
        $id_recin=DB::table('ambientes')->insertGetId(
            ['id_amb' => NULL, 'nombre' => $request->recinto , 'ubicacion' => $request->ubicacion , 'capacidad' => $request->capacidad, 'descripcion' => $request->descripcion, 'Ambientesid_amb' => NULL]
        );
        $request->merge(['id_recinto' => $id_recin]);
        return (new AmbienteController)->GestionarAmbiente($request);
    }
    public function AdaptarRecintostore(Request $request){
        $id_recin=DB::table('ambientes')->insertGetId(
            ['id_amb' => NULL, 'nombre' => $request->recinto , 'ubicacion' => $request->ubicacion , 'capacidad' => $request->capacidad, 'descripcion' => $request->descripcion, 'Ambientesid_amb' => NULL]
        );
        $request->merge(['id_recinto' => $id_recin]);
        return (new AmbienteController)->GestionarAmbiente($request);
    }
    public function ModificarRecintostore(Request $request){
        DB::table('ambientes')->where('id_amb','=',$request->id_amb)->update(['nombre' => $request->recinto , 'ubicacion' => $request->ubicacion , 'capacidad' => $request->capacidad, 'descripcion' => $request->descripcion, 'Ambientesid_amb' => NULL]);
        $request->merge(['id_recinto' => $request->id_amb]);
        return (new AmbienteController)->GestionarAmbiente($request);
    }
    public function CrearRecinto(Request $request){
        return view('recinto.CrearRecinto');
    }
    public function AdaptarRecinto(Request $request){
        $id=$request->recinto;
        $data=DB::table('ambientes')->select('id_amb','nombre','ubicacion','capacidad','descripcion')->where('id_amb','=',$id)->get();
        return view('recinto.AdaptarRecinto',['data'=>$data[0]]);
    }
    public function ModificarRecinto(Request $request){
        $id=$request->recinto;
        $data=DB::table('ambientes')->select('id_amb','nombre','ubicacion','capacidad','descripcion')->where('id_amb','=',$id)->get();
        return view('recinto.ModificarRecinto',['data'=>$data[0]]);
    }
    public function OpcionRecinto(Request $request){
        if($request->botonopcion=='crear'){
            return $this->CrearRecinto($request);
        }
        else if($request->botonopcion=='adaptar'){
            return $this->AdaptarRecinto($request);
        }
        else{
            return $this->ModificarRecinto($request);
        }
    }
}
