<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Math;
use App\Period;

class MathController extends Controller
{
    public function save(Request $request)
    {
        if ($request->ajax()) {
            $math = new Math();

            $math->math_code = $request->code;
            $math->math_name = $request->name;
            $math->save();

            $math->periods()->attach($request->periods);

            return response()->json([
                'msn' => 'Materia creada exitosamente'
            ]);
        }
    }

    public function find($id)
    {
        $math = Math::find($id);

        return response()->json([
            'msn' => $math
        ]);
    }

    public function update(Request $request, $id){
        $math = Math::find($id);

        $math->math_code    = $request->code;
        $math->math_name    = $request->name;
        $math->save();

        if($request->periods) {
            $math->periods()->sync($request->periods);
        }


        return response()->json([
           'msn' => 'Datos actualizados exitosamente'
        ]);
    }

    public function periods(){
        $period = Period::orderBy('period_name', 'ASC')->get();

        return response()->json([
           'msn' => $period
        ]);
    }


}