<?php
namespace App\Http\Controllers;




use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Users\EloquentUser;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

class RegistrationController extends Controller{

    public function __construct()
    {

    }
    
    /*
     * create a user for an application without activation
    */
    public function createUserWithOutActivation(Request $request){
        if ($this->validateJsonRequest($request)===true){ //validate json request
            $credentials = [
                'email'    => $request->email,
                'password' => $request->password,
            ];
            $user = Sentinel::register($credentials);
            return response()
                ->json($user,parent::SUCCESSCREATION)
                ->header('Content-Type', parent::$requestType);
        }else{
            return response()
                ->json('Invalid Request',parent::BAD_REQUEST)
                ->header('Content-Type', parent::$requestType);
        }
    }

    /*
     * create a user for an application with activation if the application involves activation of a user
    */
    public function createUserWithActivation(Request $request){
        if ($this->validateJsonRequest($request)===true){ //validate json request
            $credentials = [
                'email'    => $request->email,
                'password' => $request->password,
            ];
            $user = Sentinel::registerAndActivate($credentials);
            return response()
                ->json($user,parent::SUCCESSCREATION)
                ->header('Content-Type', parent::$requestType);
        }else{
            return response()
                ->json('Invalid Request',parent::BAD_REQUEST)
                ->header('Content-Type', parent::$requestType);
        }

    }
        /*
         * update a user information for an application
        */
    public function updateUser($id,Request $request){
        // TODO check if user exit
        if ($this->validateJsonRequest($request)===true) {//validate json request
            $user = Sentinel::findById($id);

            $credentials = [
                'email' => $request->email,
            ];

            $user = Sentinel::update($user, $credentials);
            return response()->json($user, parent::SUCCESSCREATION)
                ->header('Content-Type', 'application/json');

        }else{
            return response()
                ->json('Invalid Request',parent::BAD_REQUEST)
                ->header('Content-Type', parent::$requestType);
        }
    }
    
    /*
     * create a user for an application 
    */
    
    public function deleteUser($id){
        // TODO check if user exit
        $user = Sentinel::findById($id);

        $user->delete();
        return response()
            ->json('User Deleted Successfully',parent::SUCCESSRESPONSE)
            ->header('Content-Type', 'application/json');
    }
    
    /*
     * Retrieve all user information for an application
    */
    public function showAllUsers(){
        return response()
            ->json(EloquentUser::all(),parent::SUCCESSRESPONSE)
            ->header('Content-Type', 'application/json');
    }

    /*
     * Retrieve a user by an id  from your application
    */
    
    public function findUserById($id){
        // TODO check if user exit
        $user = Sentinel::findById($id);
        return response()
            ->json($user,parent::SUCCESSRESPONSE)
            ->header('Content-Type', 'application/json');

    }

    /*
     * Retrieve a user by email from your application
    */
    
    public function findByCredentials($email){
        // TODO check if user exit
        $credentials = [
            'login' =>$email,
        ];
        $user = Sentinel::findByCredentials($credentials);
        return response()
            ->json($user,parent::SUCCESSRESPONSE)
            ->header('Content-Type', 'application/json');
    }
    
    public function findByUsername($username){
        //TODO retrieve all users by username
    }
    public function activateUser(Request $email){
        $credentials = [
            'login' => $email,
        ];

        $user =Sentinel::findById(14);
        $activation = Activation::create($user);
        return  response()->json($activation);
    }

}