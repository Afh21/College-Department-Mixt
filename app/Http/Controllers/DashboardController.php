<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Role;
use App\Period;
use App\Math;
use App\Group;
use DB;
use Symfony\Component\Routing\Matcher\RedirectableUrlMatcher;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.app');
    }

    public function getUsers(){
        $admin = User::all();
        return view('dashboard.views.administrators.administrators')->with('admin', $admin);
    }

    public function getPeriods(){
        $periods = Period::orderBy('period_name', 'ASC')->get();

        return view('dashboard.views.periods.periods')->with('periods', $periods);
    }

    public function getMaths(){
        $math = Math::orderBy('math_code', 'ASC')->get();

        return view('dashboard.views.maths.maths')->with('math', $math);
    }

    public function getGroups(){
        $group = Group::orderBy('group_code', 'ASC')->get();
        return view('dashboard.views.groups.groups')->with('group', $group);
    }

    public function extras(){
        $group = Group::orderBy('group_code', 'ASC')->get();
        $math  = Math::orderBy('math_code', 'ASC')->get();
        return response()->json([
            'msn'  => $group,
            'math' => $math
        ]);
    }


    public function AsignGroup(Request $request, $id){
        if($request->ajax()){
            $user = User::find($id);
            if($user->TeacherDirector ){
                $group = Group::find($request->AsignarGrupoDirector);//->update(['group_assigned' => 1, 'user_teacher_director' => $user->id]);
                $user->TeacherDirector()->save($group);
                $group->where('user_teacher_director', $user->id)->update(['group_assigned' => 1]);
            }

            return response()->json(['msn' => 'Grupo guardado exitosamente']);
        }

    }

    public function UnassignGroup($id){
        $user = User::find($id);
        if($user->TeacherDirector()){
            $user->TeacherDirector()->where('user_teacher_director', $user->id)->update(['group_assigned' =>  0, 'user_teacher_director' => null ]);
        }

        return redirect()->back();
    }

    public function GroupsAvailable(){
        $group = Group::where('group_assigned', 0)->where('user_teacher_director', null)->get();
        return response()->json([
            'groups' => $group
        ]);
    }

    public function find($id)
    {
        $user = User::find($id);

        foreach ($user->roles as $role){

            if ($role->slug == 'teacher') {

                $grupos = $user->TeacherGroups;
                $maths = $user->TeacherMaths;

                return response()->json([
                    'user' => $user,
                    'group' => $grupos,
                    'math' => $maths,
                    'role' => $user->roles,
                ]);

            } else if($role->slug == 'student'){
                $grupo = $user->group->group_name;

                return response()->json([
                    'user' => $user,
                    'grupo' => $grupo,
                    'role' => $user->roles,
                ]);
            } else {
                return response()->json([
                    'user' => $user,
                    'role' => $user->roles,
                ]);
            }
        }
    }

    public function updateAdmin(Request $request, $id){

        if($request->ajax()){

            $user = User::find($id);
            $user->user_type        = $request->type;
            $user->user_identity    = $request->identity;
            $user->name             = $request->name;
            $user->user_lastname    = $request->lastname;
            $user->email            = $request->email;
                if($request->password != ""){ $user->password = bcrypt($request->password); }
            $user->user_genre       = $request->genre;
            $user->user_birthday    = $request->birthday;
            $user->user_age         = $request->age;
            $user->user_address     = $request->address;
            $user->user_phone       = $request->phone;
            $user->user_blood       = $request->blood;
            $user->user_profession  = $request->profession;
                if($request->active)    { $user->user_state = 'enabled'; }
                if($request->disabled)  { $user->user_state = 'disabled';}

            // Si es profesor
            if($request->editgroup1 == "2" && $request->groupsTeachersMultipleProfe != "" && $request->mathsTeacherMultipleProfe != ""){

                if($user->TeacherGroups || $user->TeacherMaths){
                    $user->TeacherGroups()->detach();
                    $user->TeacherMaths()->detach();
                }

                if($user->group){
                    $user->group()->dissociate();
                    $user->save();
                }

                $rol = Role::find($request->editgroup1);
                $user->roles()->detach();
                $user->roles()->attach($rol);

                if($request->groupsTeachersMultipleProfe != ""){
                    $user->TeacherGroups()->sync($request->groupsTeachersMultipleProfe);
                }
                if($request->mathsTeacherMultipleProfe != ""){
                    $user->TeacherMaths()->sync($request->mathsTeacherMultipleProfe);
                }
            }


            // Si es estudiante
            if($request->editgroup1 == "3" && $request->groupsTeachersMultipleStudent != ""){
                $group = Group::find($request->groupsTeachersMultipleStudent);
                if($user->TeacherGroups || $user->TeacherMaths){
                    $user->TeacherGroups()->detach();
                    $user->TeacherMaths()->detach();
                }
                $group->students()->save($user);
                $user->user_state = 'enabled';
                $group->save();


                $rol = Role::find($request->editgroup1);
                $user->roles()->detach();
                $user->roles()->attach($rol);
            }

            // Si es Administrador
            if($request->editgroup1 == "1"){

                if($user->TeacherGroups || $user->TeacherMaths){
                    $user->TeacherGroups()->detach();
                    $user->TeacherMaths()->detach();
                }

                if($user->group){
                    $user->group()->dissociate();
                    $user->save();
                }

                $rol = Role::find($request->editgroup1);
                $user->roles()->detach();
                $user->roles()->attach($rol);

            }

            // Estudiante actual
            if($request->groupsTeachersMultipleStudent){
                $group = Group::find($request->groupsTeachersMultipleStudent);
                $user->group()->dissociate();
                $group->students()->save($user);
                $group->save();
            }

            $user->save();

            // Se quiere editar un profesor actual
            if($request->editgroup1 != "3" && $request->editgroup1 != "1") {
                if($user->TeacherGroups()->count() > 0 && $request->groupsTeachersMultipleProfe) {
                        $user->TeacherGroups()->sync($request->groupsTeachersMultipleProfe);
                } else {
                    $user->TeacherGroups()->attach($request->groupsTeachersMultipleProfe);
                }

                if($user->TeacherMaths()->count() > 0 && $request->mathsTeacherMultipleProfe) {
                    $user->TeacherMaths()->sync($request->mathsTeacherMultipleProfe);
                } else {
                    $user->TeacherMaths()->attach($request->mathsTeacherMultipleProfe);
                }
            }



            return response()->json([
                'msn' => 'Datos actualizados exitosamente'
            ]);
        }
    }

    public function saveAdmin(Request $request){
        if($request->ajax()){

            $user = new User();
            $user->user_type    = $request->user_type;
            $user->user_identity= $request->cc;
            $user->name         = $request->nombre;
            $user->user_lastname= $request->apellidos;
            $user->email        = $request->correo;
            $user->password     = bcrypt($request->password);
            $user->user_genre   = $request->genero;
            $user->user_birthday= $request->fecha_nac;
            $user->user_age     = $request->edad;
            $user->user_address = $request->direccion;
            $user->user_phone   = $request->telefono;
            $user->user_blood   = $request->rh;
            $user->user_profession = $request->profesion;

            if($request->group1 == "3") {
                $group = Group::find($request->groups);
                $group->students()->save($user);
            }

            $user->save();

            $rol = Role::find($request->group1);
            $user->attachRole($rol);


            if($request->group1 == "2"){
                $user->TeacherGroups()->attach($request->groupsTeachersMultiple);
                $user->TeacherMaths()->attach($request->mathsTeacherMultiple);
            }

            return response()->json([ 'msn' => 'Usuario registrado exitosamente' ]);
        }
    }

    public function destroy($id){
        $user = User::find($id);
            if($user->group()){ $user->group()->dissociate(); }
            if($user->TeacherDirector()){Group::where('user_teacher_director', $user->id)->update(['user_teacher_director'=>null, 'group_assigned' => 0]);}


        $user->delete();

        if($user->roles())        { $user->roles()->detach();        }
        if($user->TeacherGroups()){ $user->TeacherGroups()->detach();}
        if($user->TeacherMaths()) { $user->TeacherMaths()->detach(); }

        return redirect()->back();
    }

    public function show($id){
        $user = User::find($id);

        return view('dashboard.views.administrators.show')->with('user', $user);
    }


}
