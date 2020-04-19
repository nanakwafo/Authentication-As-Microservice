<?php
use App\Http\Controllers\Controller;

/**
 * Created by PhpStorm.
 * User: nanakwafo
 * Date: 19/04/2020
 * Time: 17:31
 */

class AccountverificationController extends Controller{




    public function verifycode(Request $request){
        $code= $request->code;
        if($code == \App\Accountverification::where ('account', $request->account)->code->first ()){

            //activateuser
            //update account verification table
        }else{
            return 'account could not be verified';
        }

    }

}