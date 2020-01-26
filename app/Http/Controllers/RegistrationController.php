<?php
namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Cartalyst\Sentinel\Users\EloquentUser;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;
class RegistrationController extends controller{

    public function __construct()
    {

    }
    public function createUserWithOutActivation(Request $request){
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        $user = Sentinel::register($credentials);

        return response()->json($user);
    }

    public function createUserWithActivation(Request $request){
        $credentials = [
            'email'    => $request->email,
            'password' => $request->password,
        ];

        $user = Sentinel::registerAndActivate($credentials);

        return response()->json($user);
    }
    public function activateUser(){
        
    }
    public function updateUser(){
        
    }
    public function deleteUser(){
        
    }
    public function showAllUsers(){
        return response()->json(EloquentUser::all()) ;
    }
    public function showOneUser($id){
        return response()->json(EloquentUser::find($id));
    }
}