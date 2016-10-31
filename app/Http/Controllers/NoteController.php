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



    public function findNote($user, $group, $math, $period){
        $note = User::find($user)->notes()->select('note')->where('group_id', $group)->where('math_id', $math)->where('period_id', $period)->first();

        return response()->json([
            'note' => $note
        ]);
    }

    public function saveNote(Request $request, $teacher,  $user, $group, $math, $period){

        if($request->ajax()){

            $teacher = User::find($teacher);
            $user   = User::find($user);
            $group  = Group::find($group);
            $math   = Math::find($math);
            $period = Period::find($period);

            $note = new Note($request->all());
                $teacher->teacherNote()->save($note);
                $user->Notes()->save($note);
                $group->notes()->save($note);
                $math->notes()->save($note);
                $period->notes()->save($note);
                $note->save();

            return response()->json([
                'msn' => 'Nota guardada correctamente'
            ]);
        }
    }




}
