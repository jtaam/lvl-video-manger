<?php
/**
 * Created by PhpStorm.
 * User: jtam
 * Date: 10/24/18
 * Time: 9:13 AM
 */
namespace App\Services;

use App\User;

class AccountActivation{
    private function generateToken(){
        return mt_rand(1111111,9999999).'-'.time();
    }
    public function handle($registeredUser){
//        logger($registeredUser->user);
        $user = User::find($registeredUser->user->id);
        $user->activation_token = $this->generateToken();
        $user->save();
    }
}