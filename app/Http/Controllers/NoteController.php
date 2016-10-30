<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Group;
use App\Note;
use App\User;
use App\Math;
use App\Period;

class NoteController extends Controller
{
    public function groups($group, $math, $period){

        $group  = Group::where('id', $group)->select(['id','group_name'])->first();
        $math   = Math::where('id', $math)->select(['id','math_name'])->first();
        $period = Period::where('id', $period)->select(['id', 'period_name'])->first();

        if($group->students->count() > 0){
            return response()->json([
                'group' => $group,
                'math'  => $math,
                'period'=> $period,
            ]);
        }else {
            return response()->json([
                'error' => 'No hay estudiantes en el grupo'
            ]);
        }
    }

    public function saveNote(Request $request, $user, $group){ //, $math, $period){
        if($request->ajax()){
            $note = new Note($request->all());
            $user   = User::find($user);
            $group  = Group::find($group);

            //dd($user, $group);
            /*$math   = Math::find($math);
            $period = Period::find($period);

            dd($user, $group, $math, $period, $request->note); */
            //dd($user, $group);

            $group->notes()->save($note);
            $user->Notes()->save($note);


            $note->save();

                /*$math->notes()->save($note);
                $period->notes()->save($note);*/


            return response()->json([
                'msn' => 'Nota guardada correctamente'
            ]);
        }
    }




}
