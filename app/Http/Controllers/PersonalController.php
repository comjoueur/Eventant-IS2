<?php

namespace App\Http\Controllers;

use App\Personal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonalController extends Controller
{
    public function GestionarPersonal(Request $request){
        $id_evento=$request->id_evento;
        $personal = DB::table('trabajadores')->join('personas','personas.dni','=','trabajadores.Personasdni')->where('Eventoid_evento','=',$id_evento)->select('id_trab','Eventoid_evento','dni','correo','rol','nombre','apellido')->get();
        for($i=0;$i<sizeof($personal);$i=$i+1){
            $personal[$i]->count=$i+1;
        }
        return view('personal.GestionarPersonal',['personal'=>$personal,'id_evento'=>$id_evento]);
    }
    public function CrearPersonalstore(Request $request){
        DB::table('personas')->insert(['dni'=>$request->dni,'nombre'=>$request->nombre,'apellido'=>$request->apellido]);
        $id_trab=DB::table('trabajadores')->insertGetId(['correo'=>$request->correo,'rol'=>$request->rol,'Personasdni'=>$request->dni,'Eventoid_evento'=>$request->id_evento]);
        DB::table('cuentas')->insert(['usuario'=>$request->usuario,'contra'=>$request->contra,'Trabajadoresid_trab'=>$id_trab]);
        return $this->GestionarPersonal($request);
    }
    public function ModificarPersonalstore(Request $request){
        $dni=DB::table('trabajadores')->where('id_trab','=',$request->id_trab)->select('Personasdni')->first()->Personasdni;
        DB::table('personas')->where('dni','=',$dni)->update(['nombre'=>$request->nombre,'apellido'=>$request->apellido]);
        DB::table('trabajadores')->where('id_trab','=',$request->id_trab)->update(['correo'=>$request->correo,'rol'=>$request->rol]);
        DB::table('cuentas')->where('Trabajadoresid_trab','=',$request->id_trab)->update(['usuario'=>$request->usuario,'contra'=>$request->contra]);
        return $this->GestionarPersonal($request);
    }
    public function CrearPersonal(Request $request){
        $id_evento=$request->id_evento;
        return view('personal.CrearPersonal',['data'=>$id_evento]);
    }
    public function ModificarPersonal(Request $request){
        $id_evento=$request->id_evento;
        $id_trab=$request->id_trab;
        $personal = DB::table('trabajadores')
            ->join('personas','personas.dni','=','trabajadores.Personasdni')
            ->join('cuentas','cuentas.Trabajadoresid_trab','=','trabajadores.id_trab')
            ->where('id_trab','=',$id_trab)
            ->select('usuario','contra','id_trab','Eventoid_evento','dni','correo','rol','nombre','apellido')->get();
        $personal[0]->id_evento=$id_evento;
        return view('personal.ModificarPersonal',['data'=>$personal[0]]);
    }
    public function EliminarPersonal(Request $request){
        DB::table('cuentas')->where('Trabajadoresid_trab','=',$request->id_trab)->delete();
        $dni=DB::table('trabajadores')->where('id_trab','=',$request->id_trab)->select('Personasdni')->first()->Personasdni;
        DB::table('trabajadores')->where('id_trab','=',$request->id_trab)->delete();
        DB::table('personas')->where('dni','=',$dni)->delete();
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
