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


    public function studentNotes($student, $group, $period){
        $user = DB::table('notes')
                            ->join('users', 'notes.user_id', '=', 'users.id')
                            ->join('maths', 'notes.math_id', '=', 'maths.id')
                            ->join('periods', 'notes.period_id', '=', 'periods.id')
                            ->where('notes.user_id', '=', $student)
                            ->where('notes.period_id', '=', $period)
                            ->where('notes.group_id', '=', $group)
                            ->select('maths.math_name', 'periods.period_name', 'notes.note')
                            ->get();

        return response()->json([
            'msn'   => $user
        ]);
    }
}
