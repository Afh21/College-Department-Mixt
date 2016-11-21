<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Math;
use App\Note;
use DB;

class StudentController extends Controller
{
    public function profile($id){
        $user = User::find($id);
        $period = $user->Notes->unique('period_id');
        return view('dashboard.views.students.students')
                                                        ->with('user', $user)
                                                        ->with('period', $period);
    }

    public function notas($math, $period, $student){
        $note = Note::where('math_id', $math)->where('period_id', $period)->where('user_id', $student)->select('note')->first();
        return response()->json([
           'note' => $note
        ]);
    }


    public function studentNotes($group){

        $user = DB::table('group_math')
            ->join('groups', 'group_math.group_id', '=', 'groups.id')
            ->join('maths', 'group_math.math_id', '=', 'maths.id')
            ->where('groups.id', '=', $group)
            ->select('maths.math_name', 'maths.id')
            ->orderBy('maths.math_name')
            ->get();

        /*$nota = DB::table('group_math')
            ->join('groups', 'group_math.group_id', '=', 'groups.id')
            ->join('maths', 'group_math.math_id', '=', 'maths.id')
            ->join('notes', 'maths.id', '=', 'notes.math_id')
            ->join('periods', 'notes.period_id', '=', 'periods.id')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->where('groups.id', '=', $group)
            ->where('users.id', '=', $student)
            ->select('maths.math_name', 'maths.id', 'notes.note', 'periods.period_name')
            ->orderBy('maths.math_name')
            ->get();*/

        return response()->json([
            'msn'   => $user,
        ]);
    }


}
