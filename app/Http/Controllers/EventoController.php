<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EventoController extends Controller
{

    public function GestionarEvento()
    {
        $eventsA=DB::table('eventos')->select('id_evento','nombre','fechainicio','fechaFin','descripcion','estado','Ambientesid_amb')->where('estado','=','1')->get();
        $eventsP=DB::table('eventos')->select('id_evento','nombre','fechainicio','fechaFin','descripcion','estado','Ambientesid_amb')->where('estado','=','0')->get();
        for($i=0;$i<sizeof($eventsA);$i=$i+1){
            $eventsA[$i]->count=$i+1;
        }
        for($i=0;$i<sizeof($eventsP);$i=$i+1){
            $eventsP[$i]->count=$i+1;
        }
        return view('evento.GestionarEvento',['eventsA'=>$eventsA,'eventsP'=>$eventsP]);
    }
    public function CrearEventostore(Request $request){
        $id_evento=DB::table('eventos')->insertGetId(
            ['id_evento' => NULL, 'nombre' => $request->evento, 'fechainicio'=>$request->fechainicio, 'fechaFin'=>$request->fechafinal, 'descripcion'=>$request->descripcion,'estado'=>1,'Ambientesid_amb'=>$request->recinto]
        );
        $request->id_evento = $id_evento;
        return (new PersonalController)->GestionarPersonal($request);
    }
    public function ModificarEventostore(Request $request){
        $id_evento=$request->id_evento;
        DB::table('eventos')->where('id_evento','=',$id_evento)->update(
            ['nombre' => $request->evento, 'fechainicio'=>$request->fechainicio, 'fechaFin'=>$request->fechafinal, 'descripcion'=>$request->descripcion,'Ambientesid_amb'=>$request->recinto]
        );
        $recintos=DB::table('ambientes')->where('Ambientesid_amb','=',NULL)->select('id_amb','nombre')->get();
        $data=DB::table('eventos')->where('id_evento','=',$id_evento)->select('id_evento','nombre','fechainicio','fechaFin','descripcion','Ambientesid_amb')->get();
        return view('evento.ModificarEvento',['recintos'=>$recintos,'data'=>$data[0]]);
    }
    public function AdaptarEventostore(Request $request){
        $id_evento=DB::table('eventos')->insertGetId(
            ['id_evento' => NULL, 'nombre' => $request->evento, 'fechainicio'=>$request->fechainicio, 'fechaFin'=>$request->fechafinal, 'descripcion'=>$request->descripcion,'estado'=>1,'Ambientesid_amb'=>$request->recinto]
        );
        $request->id_evento = $id_evento;
        return (new PersonalController)->GestionarPersonal($request);
    }
    public function CrearEvento(Request $request){
        $recintos=DB::table('ambientes')->where('Ambientesid_amb','=',NULL)->select('id_amb','nombre')->get();
        return view('evento.CrearEvento',['recintos'=>$recintos]);
    }
    public function AdaptarEvento(Request $request){
        $id_evento=$request->evento;
        $recintos=DB::table('ambientes')->where('Ambientesid_amb','=',NULL)->select('id_amb','nombre')->get();
        $data=DB::table('eventos')->where('id_evento','=',$id_evento)->select('id_evento','nombre','fechainicio','fechaFin','descripcion','Ambientesid_amb')->get();
        return view('evento.AdaptarEvento',['recintos'=>$recintos,'data'=>$data[0]]);
    }
    public function ModificarEvento(Request $request){
        $id_evento=$request->evento;
        $recintos=DB::table('ambientes')->where('Ambientesid_amb','=',NULL)->select('id_amb','nombre')->get();
        $data=DB::table('eventos')->where('id_evento','=',$id_evento)->select('id_evento','nombre','fechainicio','fechaFin','descripcion','Ambientesid_amb')->get();
        return view('evento.ModificarEvento',['recintos'=>$recintos,'data'=>$data[0]]);
    }
    public function OpcionEvento(Request $request){
        if($request->botonopcion=='crear'){
            return $this->CrearEvento($request);
        }
        else if($request->botonopcion=='adaptar'){
            return $this->AdaptarEvento($request);
        }
        else{
            return $this->ModificarEvento($request);
        }
    }
}
