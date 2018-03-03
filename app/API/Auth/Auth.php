<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 03/03/18
 * Time: 05:11 م
 */

namespace App\API\Auth;


use App\API\Models\User;

class Auth
{
    /**
     * check if the user is exists or not
     * @param $email
     * @param $password
     * @return bool
     */
    public function attempt($email,$password){

        $user = User::where('email',$email)->first();
        if(!$user){
            return false;
        }
        if(password_verify($password,$user->Password)){
            $_SESSION['user'] = $user->id;
            return true;
        }

        return false;
    }

    /**
     * checks if there is user stored in session
     * @return bool
     */

    public function check(){
        return isset($_SESSION['user']);
    }

    /**
     * return user information that stored in session
     * @return mixed
     */

    public function user(){
        return User::find($_SESSION['user']);
    }

    /**
     * destroy the session of the user
     */

    public function logOut(){
        unset($_SESSION['user']);
    }


}