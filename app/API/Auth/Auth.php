<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 03/03/18
 * Time: 05:11 م
 */

namespace App\API\Auth;


use App\API\Models\Company;
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


                // Company Auth functions

    /**
     * check if the company is exists or not
     * @param $email
     * @param $password
     * @return bool
     */

    public function companyAttempt($email,$password){

        $company = Company::where('email',$email)->first();
        if(!$company){
            return false;
        }
        if(password_verify($password,$company->Password)){
            $_SESSION['company'] = $company->id;
            return true;
        }

        return false;
    }

    /**
     * checks if there is company stored in session
     * @return bool
     */

    public function companyCheck(){
        return isset($_SESSION['company']);
    }

    /**
     * return company information that stored in session
     * @return mixed
     */

    public function company(){
        return User::find($_SESSION['company']);
    }

    /**
     * destroy the session of the company
     */
    public function companyLogOut(){
        unset($_SESSION['company']);
    }
}