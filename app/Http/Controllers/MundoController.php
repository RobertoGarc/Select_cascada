<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Continente;
use App\Models\Pais;

class MundoController extends Controller
{
    public function index(){

        $continentes=Continente::all();

        return \View::make('mundo',compact('continentes')); 
    }

    public function paises(Request $request){
        

        if(isset($request->texto)){
            $paises=Pais::select('nombre_pais','id_pais')
            ->where('id_continente',"=",$request->texto)
            ->get();
            return response()->json(
                [
                    'lista' => $paises,
                    'success' => true
                ]
                );
        }else{
            return response()->json(
                [
                    'success' => false
                ]
                );

        }

    }


}
