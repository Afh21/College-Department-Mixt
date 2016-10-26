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

        if($period->maths()){
            $period->maths()->detach();
        }

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

    public function save(Request $request){
        if($request->ajax()) {

            $period = new Period();
            $period->period_name = $request->create;
            $period->save();

            return response()->json([
                'msn' => 'Periodo creado exitosamente'
            ]);
        }
    }

    public function updateStatePeriod(Request $request, $id){

        if($request->ajax()){
            //dd($request->all());

            if($request->per == 0){
                Period::where('id', $id)->where('period_state', 0)->update(['period_state' => true]);
            }
            if($request->per == 1){
                Period::where('id', $id)->where('period_state', 1)->update(['period_state' => false]);
            }

            return response()->json([
                'msn' => 'Estado cambiado exitosamente'
            ]);
        }

    }
}
