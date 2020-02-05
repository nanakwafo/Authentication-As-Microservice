<?php
namespace App\Http\Controllers;


use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Users\EloquentUser;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

//definition of class
class ActivationController extends Controller
{
    /**
     * ActivationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function activateUser(Request $request)
    {

        $user = Sentinel::findByCredentials( ['login' => $request->email]);
        $activation = Activation::create($user);
        return response()->json($activation);
    }

    public function activationExit(Request $request){
        $user = Sentinel::findByCredentials($request->email);

        $activationExit = Activation::exists($user);
        return response()->json($activationExit);
    }

    public function activationCompleted(Request $request){
        $user = Sentinel::findByEmail(['login'=>$request->email]);

        if ($activation = Activation::completed($user))
        {
            return response()->json($activation,parent::SUCCESSRESPONSE);
        }
        else
        {
            return response()->json($activation,parent::SUCCESSRESPONSE);
        }
    }

    public function deativate(Request $request){
         $user = Sentinel::findByEmail(['login'=>$request->email]);

        $activation =Activation::remove($user);
        return response()->json($activation,parent::SUCCESSRESPONSE);
    }

}