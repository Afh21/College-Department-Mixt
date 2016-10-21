<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Math;

class MathController extends Controller
{
    public function save(Request $request){
        if($request->ajax()){
            $math = new Math();

            $math->math_code = $request->code;
            $math->math_name = $request->name;
            $math->save();

            return response()->json([
               'msn' => 'Materia creada exitosamente'
            ]);
        }
    }

    public function find($id){
        $math = Math::find($id);

        return response()->json([
           'msn' => $math
        ]);
    }
}
