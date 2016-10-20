<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Period;

class PeriodController extends Controller
{
    public function find($id){
        $period = Period::find($id);

        return response()->json([
            'msn' => $period
        ]);
    }

    public function destroy($id){
        $period = Period::find($id);
        $period->delete();

        return redirect()->back();
    }

    public function update(Request $request, $id){

        if($request->ajax()){
            //dd(Period::find($id));

            $period = Period::find($id);
            $period->period_name = $request->update;
            $period->save();

            return response()->json([
               'msn' => 'Actualizacion exitosa'
            ]);
        }


    }
}
