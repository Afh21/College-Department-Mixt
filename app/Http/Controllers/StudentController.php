<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Math;
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


    public function studentNotes($group, $student ){

        $user = DB::table('group_math')
            ->join('groups', 'group_math.group_id', '=', 'groups.id')
            ->join('maths', 'group_math.math_id', '=', 'maths.id')
            ->join('notes', 'maths.id', '=', 'notes.math_id')
            ->join('periods', 'notes.period_id', '=', 'periods.id')
            ->join('users', 'notes.user_id', '=', 'users.id')
            ->where('groups.id', '=', $group)
            ->where('users.id', '=', $student)
            ->where('periods.id', '=', 1)
            ->select('maths.math_name', 'notes.note', 'periods.period_name')
            ->groupBy('maths.math_name')
            ->get();


        return response()->json([
            'msn'   => $user
        ]);
    }


}
