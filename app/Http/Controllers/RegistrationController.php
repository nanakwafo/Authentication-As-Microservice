<?php
namespace App\Http\Controllers;


use App\User;
use Cartalyst\Sentinel\Laravel\Facades\Activation;
use Illuminate\Http\Request;
use Cartalyst\Sentinel\Users\EloquentUser;
use Cartalyst\Sentinel\Laravel\Facades\Sentinel;

//definition of class
class RegistrationController extends Controller
{
    /**
     * RegistrationController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /*
     * create a user for an application without activation
    */
    public function createUserWithOutActivation(Request $request)
    {
        $this->validate($request, [  //Validate request parameters
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        if ($this->validateJsonRequest($request) === true) { //validate json request
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            $user = Sentinel::register($credentials);
            return response()
                ->json($user, parent::SUCCESSCREATION)
                ->header('Content-Type', parent::$requestType);
        } else {
            return response()
                ->json('Invalid Request', parent::BAD_REQUEST)
                ->header('Content-Type', parent::$requestType);
        }
    }

    /*
     * create a user for an application with activation if the application involves activation of a user
    */
    public function createUserWithActivation(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        if ($this->validateJsonRequest($request) === true) { //validate json request
            $credentials = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            $user = Sentinel::registerAndActivate($credentials);
            return response()
                ->json($user, parent::SUCCESSCREATION)
                ->header('Content-Type', parent::$requestType);
        } else {
            return response()
                ->json('Invalid Request', parent::BAD_REQUEST)
                ->header('Content-Type', parent::$requestType);
        }

    }

    /*
     * update a user information for an application
     * 
    */
    public function updateUser($email, Request $request)
    {
        if ($this->validateJsonRequest($request) === true) {//validate json request
            $user = Sentinel::findByCredentials(['login' => $email]);
            $credentials = [
                'first_name' => $request->first_name,
            ];

            $user = Sentinel::update($user, $credentials);
            return response()->json($user, parent::SUCCESSCREATION)
                ->header('Content-Type', 'application/json');

        } else {
            return response()
                ->json('Invalid Request', parent::BAD_REQUEST)
                ->header('Content-Type', parent::$requestType);
        }
    }

    /*
     * create a user for an application 
    */

    public function deleteUser($id)
    {
        // TODO check if user exit
        $user = Sentinel::findById($id);

        $user->delete();
        return response()
            ->json('User Deleted Successfully', parent::SUCCESSRESPONSE)
            ->header('Content-Type', 'application/json');
    }

    /*
     * Retrieve all user information for an application
    */
    public function showAllUsers()
    {
        return response()
            ->json(User::all(), parent::SUCCESSRESPONSE)
            ->header('Content-Type', 'application/json');
    }

    /*
     * Retrieve a user by an id  from your application
    */

    public function findUserById($id)
    {
        // TODO check if user exit
        $user = Sentinel::findById($id);
        return response()
            ->json($user, parent::SUCCESSRESPONSE)
            ->header('Content-Type', 'application/json');

    }

    /*
     * Retrieve a user by email from your application
    */

    public function findByCredentials($email)
    {
        // TODO check if user exit
        $credentials = [
            'login' => $email,
        ];
        $user = Sentinel::findByCredentials($credentials);
        return response()
            ->json($user, parent::SUCCESSRESPONSE)
            ->header('Content-Type', 'application/json');
    }

    public function findByUsername($username)
    {
        //TODO retrieve all users by username
    }

    public function activateUser(Request $email)
    {
        $credentials = [
            'login' => $email,
        ];

        $user = Sentinel::findById(14);
        $activation = Activation::create($user);
        return response()->json($activation);
    }

}