<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 03/03/18
 * Time: 10:08 م
 */

namespace App\API\Validation;
use Respect\Validation\Validator as V;
class UserValidation extends Validator
{
    /**
     * validate user information to sign up
     * @param $Request
     * @return $this
     */
    public function validateUserToSignup($Request)
    {

        $validation = $this->validate($Request,[
            'FirstName' => v::noWhitespace()->notEmpty()->alpha(),
            'LastName'  => v::noWhitespace()->notEmpty()->alpha(),
            'Email'     => v::noWhitespace()->notEmpty()->Email(),
            'Phone'     => v::noWhitespace()->notEmpty()->phone(),
            'Password'  => v::noWhitespace()->notEmpty(),
            'Image'     => v::noWhitespace()->notEmpty(),
            'district'  => v::noWhitespace()->notEmpty()->alnum()

        ]);
        return $this;
    }

    /**
     * validate user form to log in
     * @param $Request
     * @return $this
     */
    public function validateUserToSignin($Request)
    {

        $validation = $this->validate($Request,[
            'Email'     => v::noWhitespace()->notEmpty()->Email(),
            'Password'  => v::noWhitespace()->notEmpty(),
        ]);
        return $this;
    }

    /**
     * validate user search to get companies that serve the target
     * @param $Request
     * @return $this
     */
    public function validateUserSearch($Request)
    {
        $validation = $this->validate($Request,['LocationTarget'  => v::noWhitespace()->notEmpty()->alnum(),]);
        return $this;
    }

    public function validateUserRequest($Request){
        $validation = $this->validate($Request,[
            'Status'     => V::noWhitespace()->notEmpty()->boolVal(),
           'Request_ID' => V::noWhitespace()->notEmpty()->intVal(),
           'Company_ID' => V::noWhitespace()->notEmpty()->intVal()
        ]);
        return $this;
    }

}