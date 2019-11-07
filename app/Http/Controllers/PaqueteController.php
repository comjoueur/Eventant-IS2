<?php

namespace App\Http\Controllers;

use App\Paquete;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaqueteController extends Controller
{
    public function GestionarPaquete(Request $request){
        $id_evento = $request->id_evento;
        $paquetes = DB::table('paquetes')->where('Eventoid_evento','=',$id_evento)->select('id_paquete','nombre','precioEst','precioProf','precioColab')->get();
        for($i=0;$i<sizeof($paquetes);$i=$i+1){
            $paquetes[$i]->count=$i+1;
            $paquetes[$i]->actividades = DB::table('actividades')
                ->join('pactividades','pactividades.Actividadid_act','=','actividades.id_act')
                ->where('pactividades.Paqueteid_paquete','=',$paquetes[$i]->id_paquete)
                ->select('id_act','nombre')->get();
        }
        return view('paquete.GestionarPaquete',['paquetes'=>$paquetes,'id_evento'=>$id_evento]);
    }
    public function CrearPaquetestore(Request $request){
        $actividades=$request->acti;
        $id_paquete=DB::table('paquetes')
            ->insertGetId(['nombre'=>$request->nombre,'precioEst'=>$request->PrecioEstudiante,'precioProf'=>$request->PrecioProfesional,'precioColab'=>$request->PrecioColaborador,'Eventoid_evento'=>$request->id_evento]);
        for($i=0;$i<sizeof($actividades);$i=$i+1){
            DB::table('pactividades')->insert(['Paqueteid_paquete'=>$id_paquete,'Actividadid_act'=>$actividades[$i]]);
        }
        return $this->GestionarPaquete($request);
    }
    public function ModificarPaquetestore(Request $request){
        $actividades=$request->acti;
        $id_paquete=$request->id_paquete;
        DB::table('paquetes')
            ->where('id_paquete','=',$id_paquete)
            ->update(['nombre'=>$request->nombre,'precioEst'=>$request->PrecioEstudiante,'precioProf'=>$request->PrecioProfesional,'precioColab'=>$request->PrecioColaborador]);
        DB::table('pactividades')
            ->where('Paqueteid_paquete','=',$id_paquete)
            ->delete();
        for($i=0;$i<sizeof($actividades);$i=$i+1){
            DB::table('pactividades')->insert(['Paqueteid_paquete'=>$id_paquete,'Actividadid_act'=>$actividades[$i]]);
        }
        return $this->GestionarPaquete($request);
    }
    public function CrearPaquete(Request $request){
        $data=DB::table('actividades')
                ->select('id_act','nombre')->get();
        return view('Paquete.CrearPaquete',['data'=>$data,'id_evento'=>$request->id_evento]);
    }
    public function ModificarPaquete(Request $request){
        $data = DB::table('paquetes')->where('id_paquete','=',$request->paquete)->select('id_paquete','nombre','precioEst','precioProf','precioColab')->first();
        $data->actividades=DB::table('actividades')
                ->join('pactividades','pactividades.Actividadid_act','=','actividades.id_act')
                ->where('pactividades.Paqueteid_paquete','=',$request->paquete)
                ->select('id_act','nombre')->get();
        $activis=DB::table('actividades')
                ->select('id_act','nombre')->get();
        return view('Paquete.ModificarPaquete',['data'=>$data,'activis'=>$activis,'id_evento'=>$request->id_evento]);
    }
    public function EliminarPaquete(Request $request){
        $id_paquete=$request->paquete;
        print_r($id_paquete);
        DB::table('pactividades')
            ->where('Paqueteid_paquete','=',$id_paquete)
            ->delete();
        DB::table('paquetes')
            ->where('id_paquete','=',$id_paquete)
            ->delete();
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
