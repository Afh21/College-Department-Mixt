<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Math;
use App\Group;

class GroupController extends Controller
{
    public function maths(){
        $math = Math::orderBy('math_code', 'ASC')->get();

        return response()->json([
           'msn' => $math
        ]);
    }

    public function save(Request $request){

        if($request->ajax()) {
            $group = new Group();

            $group->group_code = $request->codegroup;
            $group->group_name = $request->namegroup;
            $group->group_quantity = $request->cantgroup;
            $group->group_jornade = $request->jornade;
            $group->save();

            if ($request->maths) {
                $group->GroupMaths()->attach($request->maths);
            }

            return response()->json([
               'msn' => 'Grupo creado exitosamente'
            ]);
        }
    }

    public  function destroy($id){
        $group = Group::find($id);
        $group->delete();

        if($group->GroupMaths()){
            $group->GroupMaths()->detach();
        }

        return redirect()->back();
    }

    public function find($id){
        $group = Group::find($id);

        return response()->json([
            'msn'  => $group,
            'math' => $group->GroupMaths
        ]);
    }

    public function update(Request $request, $id){
        if($request->ajax()) {
            $group = Group::find($id);

            $group->group_code = $request->codegroup;
            $group->group_name = $request->namegroup;
            $group->group_quantity = $request->cantgroup;

            if ($request->jornade) {
                $group->group_jornade  = $request->jornade;
            }

            $group->save();

            if($request->maths){
                $group->GroupMaths()->sync($request->maths);
            }

            return response()->json([
                'msn' => 'Datos Actualizados correctamente'
            ]);
        }

    }


}
