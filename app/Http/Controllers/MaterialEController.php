<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\MaterialE;
use Illuminate\Http\Request;

class MaterialEController extends Controller
{
    public function GestionarMaterialE(Request $request){
        $id_amb=$request->id_amb;
        $materiales=DB::table('materiales')->join('matestaticos','matestaticos.Materialesid_mat','=','materiales.id_mat')->select('id_mat','descripcion','nombre','cantidad')->where('matestaticos.Ambientesid_amb','=',$id_amb)->get();
        for($i=0;$i<sizeof($materiales);$i=$i+1){
            $materiales[$i]->count=$i;
        }
        return view('materiale.GestionarMaterialE', ['materiales'=>$materiales,'id_amb'=>$id_amb]);
    }
    public function CrearMaterialEstore(Request $request){
        $id_amb=$request->id_amb;
        $id_mat=DB::table('materiales')->insertGetId(
            ['id_mat' => NULL, 'nombre' => $request->materiale , 'descripcion' => $request->descripcion]
        );

        DB::table('matestaticos')->insert(
            ['Ambientesid_amb' => $id_amb, 'Materialesid_mat' => $id_mat , 'cantidad' => $request->cantidad]
        );
        return $this->GestionarMaterialE($request);
    }
    public function ModificarMaterialEstore(Request $request){
        $id_mat=$request->id_mat;
        $id_amb=$request->id_amb;
        DB::table('materiales')->where('id_mat','=',$id_mat)->update(['nombre' => $request->materiale,'descripcion'=>$request->descripcion]);
        DB::table('matestaticos')->where('Materialesid_mat','=',$id_mat)->where('Ambientesid_amb','=',$id_amb)->update(['cantidad'=>$request->cantidad]);
        return $this->GestionarMaterialE($request);
    }
    public function CrearMaterialE(Request $request){
        $id_amb=$request->id_amb;
        return view('materiale.CrearMaterialE',['id_amb'=>$id_amb]);
    }
    public function EliminarMaterialE(Request $request){
        $id_amb=$request->id_amb;
        $id_mat=$request->material;
        DB::table('matestaticos')->where('Materialesid_mat','=',$id_mat)->where('Ambientesid_amb','=',$id_amb)->delete();
        DB::table('materiales')->where('id_mat','=',$id_mat)->delete();
        return $this->GestionarMaterialE($request);
    }
    public function ModificarMaterialE(Request $request){
        $id_amb=$request->id_amb;
        $id_mat=$request->material;
        $data=DB::table('materiales')->join('matestaticos','matestaticos.Materialesid_mat','=','materiales.id_mat')->select('id_mat','descripcion','nombre','cantidad')->where('matestaticos.Ambientesid_amb','=',$id_amb)->where('id_mat','=',$id_mat)->get();
        $data[0]->id_amb=$id_amb;
        return view('materiale.ModificarMaterialE',['data'=>$data[0]]);
    }
    public function OpcionMaterialE(Request $request){
        if($request->botonopcion=='crear'){
            return $this->CrearMaterialE($request);
        }
        else if($request->botonopcion=='eliminar'){
            return $this->EliminarMaterialE($request);
        }
        else{
            return $this->ModificarMaterialE($request);
        }
    }
}
