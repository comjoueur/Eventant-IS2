<?php

namespace App\Http\Controllers;

use App\Recinto;
use Illuminate\Http\Request;

class RecintoController extends Controller
{
    public function GestionarRecinto(){
        $recintos=[[1,'Centro Comercial','10000 personas','Cerro Juli',2121],[2,'Universidad','1500 personas','San Lazro',21212]];
        return view('recinto.GestionarRecinto', ['recintos'=>$recintos]);
    }
    public function CrearRecintostore(Request $request){
        return (new AmbienteController)->GestionarAmbiente($request);
    }
    public function AdaptarRecintostore(Request $request){
        return (new AmbienteController)->GestionarAmbiente($request);
    }
    public function ModificarRecintostore(Request $request){
        return (new AmbienteController)->GestionarAmbiente($request);
    }
    public function CrearRecinto(Request $request){
        return view('recinto.CrearRecinto');
    }
    public function AdaptarRecinto(Request $request){
        return view('recinto.AdaptarRecinto');
    }
    public function ModificarRecinto(Request $request){
        return view('recinto.ModificarRecinto');
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
