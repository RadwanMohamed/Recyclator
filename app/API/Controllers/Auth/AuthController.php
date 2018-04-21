<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 03/03/18
 * Time: 11:30 ص
 */

namespace App\API\Controllers\Auth;

use App\API\Controllers\Controller;
use App\API\Models\Company;
use App\API\Models\User;

/**
 * Class AuthController inherit from controller parent
 * used in all Auth operation (sign in, sign up)
 * @package App\API\Controllers\Auth
 */
class AuthController extends Controller
{
    /**
     * signup function to add users
     * @param $Request
     * @param $Response
     * @return type json
     */
    public function userSignup($Request,$Response){
        $validation = $this->UserValidation->validateUserToSignup($Request);

        if (!$validation->failed()){
            $user =  User::create([
                'FirstName' => $Request->getParam('FirstName'),
                'LastName'  => $Request->getParam('LastName'),
                'Email'     => $Request->getParam('Email'),
                'Phone'     => $Request->getParam('Phone'),
                'Password'  => password_hash($Request->getParam('Password'),PASSWORD_DEFAULT),
                'Image'     => $Request->getParam('Image'),
                'district'  => $Request->getParam('district')
            ]);

            if ($user) {
                $auth = $this->Auth->attempt($user->Email, $Request->getParam('Password'));
                $response['message'] = "sign up operation completed";
                $response['status'] = 'success';
                return $Response->withJson($response, 200);
            }else{
                $response['message'] = "sign up operation not completed";
                $response['status'] = 'failed';
                return $Response->withJson($response, 422);
            }

        }

    }

    /**
     * log in user function
     * @param $Request
     * @param $Response
     * @return mixed
     */
    public function userSignin($Request,$Response){
        $validation = $this->UserValidation->validateUserToSignin($Request);
        if (!$validation->failed()) {
            $auth = $this->Auth->attempt($Request->getParam('Email'), $Request->getParam('Password'));
            if ($auth){
            $response['status'] = 'success';
            $response['message'] = 'you are login it';
            return $Response->withJson($response, 200);
            }
            else{
                $response['status'] = 'failed';
                $response['message'] = 'you can not login it';
                return $Response->withJson($response, 422);
            }
        }

    }
    /**
     * sign out the user
     * @param $Request
     * @param $Response
     * @return mixed
     */
    public function userSignOut($Request,$Response){
        $this->Auth->logOut();
        $response['status']='success';
        $response['message']='you are logged out';
        return $Response->withJson($response,200);
    }



                    // company Auth functions

    /**
     * signup function to add company
     * @param $Request
     * @param $Response
     * @return mixed
     */
    public function companySignup($Request,$Response){
        $companyValidation = $this->CompanyValidation->validateCompanyToSignup($Request);

        if (!$companyValidation->failed()){
            $company =  Company::create([
                'Name' => $Request->getParam('Name'),
                'Bio'  => $Request->getParam('Bio'),
                'Email'     => $Request->getParam('Email'),
                'Phone'     => $Request->getParam('Phone'),
                'Password'  => password_hash($Request->getParam('Password'),PASSWORD_DEFAULT),
                'Image'     => $Request->getParam('Image'),
                'district'  => $Request->getParam('district'),
                'LocationTarget'  => $Request->getParam('LocationTarget')
            ]);

            if ($company) {
                $companyAuth = $this->Auth->companyAttempt($company->Email, $Request->getParam('Password'));
                $response['message'] = "sign up operation completed";
                $response['status'] = 'success';
                return $Response->withJson($response, 200);
            }else{
                $response['message'] = "sign up operation not completed";
                $response['status'] = 'failed';
                return $Response->withJson($response, 422);
            }

        }

    }

    /**
     * log in company function
     * @param $Request
     * @param $Response
     * @return mixed
     */

    public function companySignin($Request,$Response){
        $companyValidation = $this->CompanyValidation->validateCompanyToSignin($Request);
        if (!$companyValidation->failed()) {
            $companyAuth = $this->Auth->companyAttempt($Request->getParam('Email'), $Request->getParam('Password'));
            if ($companyAuth){
                $response['status'] = 'success';
                $response['message'] = 'you are login it';
                return $Response->withJson($response, 200);
            }
            else{
                $response['status'] = 'failed';
                $response['message'] = 'you can not login it';
                return $Response->withJson($response, 422);
            }
        }

    }

    /**
     * sign out the company
     * @param $Request
     * @param $Response
     * @return mixed
     */
    public function companySignOut($Request,$Response){
         $this->Auth->companyLogOut();
        $response['status']='success';
        $response['message']='you are logged out';
        return $Response->withJson($response,200);
    }


}
/**
"Name": "omarfffffahoofffcom",
"LastName":"gvdhfbf",
"Bio": "fhffh",
"Phone": "012011478",
"Email":"radwanmohamegggd334@gmail.com",
"Image":"fhhghg",
"Password": "hhghs",
"district":"fkjff",
"LocationTarget":"dndfnf"
 */