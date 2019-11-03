<?php

namespace App\Http\Controllers;

use App\Evento;
use Illuminate\Http\Request;

class EventoController extends Controller
{

    public function GestionarEvento()
    {
        $eventsA=[[1,'FIA 2019','22/10/19','31/10/19','Evento que agrupa las ferias mas importantes'],[2,'CONEISC','20/10/19','29/10/19','Evento de Tecnología','45']];
        $eventsP=[[1,'CISC','20/10/18','29/10/18','Evento de tecnología'],[2,'FIA 2018','22/10/18','29/10/18','Evento que agrupa las ferias más importantes','32']];
        return view('evento.GestionarEvento',['eventsA'=>$eventsA,'eventsP'=>$eventsP]);
    }
    public function CrearEventostore(Request $request){
        return (new PersonalController)->GestionarPersonal($request);
    }
    public function ModificarEventostore(Request $request){
        $noti="true";
        $recintos=[[0,'AQPrecinto'],[1,'LimaRecinto']];
        $encargados=[[0,'Guido Tapia'],[1,'Alonso Valdivia']];
        return view('evento.ModificarEvento',['noti'=>$noti,'recintos'=>$recintos,'encargados'=>$encargados]);
    }
    public function AdaptarEventostore(Request $request){
        return (new PersonalController)->GestionarPersonal($request);
    }
    public function CrearEvento(Request $request){
        $recintos=[[0,'AQPrecinto'],[1,'LimaRecinto']];
        $encargados=[[0,'Guido Tapia'],[1,'Alonso Valdivia']];
        return view('evento.CrearEvento',['noti'=>'false','recintos'=>$recintos,'encargados'=>$encargados]);
    }
    public function AdaptarEvento(Request $request){
        $recintos=[[0,'AQPrecinto'],[1,'LimaRecinto']];
        $encargados=[[0,'Guido Tapia'],[1,'Alonso Valdivia']];
        return view('evento.AdaptarEvento',['noti'=>'false','recintos'=>$recintos,'encargados'=>$encargados]);
    }
    public function ModificarEvento(Request $request){
        $recintos=[[0,'AQPrecinto'],[1,'LimaRecinto']];
        $encargados=[[0,'Guido Tapia'],[1,'Alonso Valdivia']];
        return view('evento.ModificarEvento',['noti'=>'false','recintos'=>$recintos,'encargados'=>$encargados]);
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
