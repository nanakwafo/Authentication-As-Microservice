<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\Hash;

class User extends Model implements AuthenticatableContract, AuthorizableContract, JWTSubject
{

    protected $table = 'userapps';
    protected $fillable = ['email', 'password'];
    use Authenticatable, Authorizable;


    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier ()
    {
        return $this->getKey ();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims ()
    {
        return [];
    }


    public static function Credential (Faker $faker)
    {

        $password = $faker->password ();

        return [

            'email'           => $faker->email,
            'password'        => $password,
            'password_hashed' => Hash::make ($password)
        ];

    }

}
