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

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    public function index(){
        return view('dashboard.app');
    }

    public function getAdmins(){
        $admin = DB::table('role_user')
                                    ->join('users', 'role_user.user_id', '=', 'users.id')
                                    ->join('roles', 'role_user.role_id', '=', 'roles.id')
                                    ->where('roles.name', '=', 'Administrator')
                                    ->select('users.name', 'users.id', 'users.email', 'users.user_lastname', 'users.user_state')
                                    ->get();

        return view('dashboard.views.administrators.administrators')->with('admin', $admin);
    }


    public function getPeriods(){
        $periods = Period::orderBy('id', 'ASC')->get();

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

    public function find($id){
        $user = User::find($id);

        return response()->json([
            'user' => $user
        ]);
    }

    public function updateAdmin(Request $request, $id){

        if($request->ajax()){

            $user = User::find($id);
            $user->user_type        = $request->type;
            $user->user_identity    = $request->identity;
            $user->name             = $request->name;
            $user->user_lastname    = $request->lastname;
            $user->email            = $request->email;

            if($request->password != ""){
                $user->password = bcrypt($request->password);
            }

            $user->user_genre       = $request->genre;
            $user->user_birthday    = $request->birthday;
            $user->user_age         = $request->age;
            $user->user_address     = $request->address;
            $user->user_phone       = $request->phone;
            $user->user_blood       = $request->blood;
            $user->user_profession  = $request->profession;

            if($request->active){
                $user->user_state = 'enabled';
            }

            if($request->disabled){
                $user->user_state = 'disabled';
            }

            $user->save();

            return response()->json([
                'msn' => 'Datos actualizados exitosamente'
            ]);
        }
    }

    public function saveAdmin(Request $request){
        if($request->ajax()){
            $rol = Role::find($request->group1);

            $user = new User;
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
            $user->save();
            $user->attachRole($rol);

            return response()->json([
               'msn' => 'Usuario creado exitosamente'
            ]);
        }
    }


}
