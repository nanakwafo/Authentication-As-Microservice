<?php
/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 19/04/2020
 * Time: 16:22
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Accountverification extends Model
{

    protected $table = 'accountverifications';

    protected $fillable = ['account', 'code', 'expiry', 'verified'];


    public function updateAccountVerification ($account)
    {
        $this->where ('account', $account)
            ->update (['verified' => 1]);
    }

   
    public function isVerified ($account)
    {

    }

}