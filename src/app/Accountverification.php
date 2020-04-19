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

    protected $table = 'accountverification';

    protected $fillable = ['account', 'code', 'expiry', 'verified'];


  
}