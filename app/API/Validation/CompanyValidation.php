<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 04/03/18
 * Time: 11:43 ص
 */

namespace App\API\Validation;

use Respect\Validation\Validator as V;

/**
 * Class CompanyValidation to validate company inputs
 * @package App\API\Validation
 */
class CompanyValidation  extends Validator
{
    //`Name`, `Email`, `Phone`, `Bio`, `Password`, `District`, `Image`, `HashTable`, `LocationTarget`

    /**
     * validate company information to sign up
     * @param $Request
     * @return $this
     */
    public function validateCompanyToSignup($Request)
    {

        $validation = $this->validate($Request,[
            'Name' => v::noWhitespace()->notEmpty()->alpha(),
            'Bio'  => v::noWhitespace()->notEmpty()->alpha(),
            'Email'     => v::noWhitespace()->notEmpty()->Email(),
            'Phone'     => v::noWhitespace()->notEmpty()->phone(),
            'Password'  => v::noWhitespace()->notEmpty(),
            'Image'     => v::noWhitespace()->notEmpty(),
            'district'  => v::noWhitespace()->notEmpty()->alnum(),
            'LocationTarget' => v::noWhitespace()->notEmpty()->alnum()

        ]);
        return $this;
    }

    /**
     * validate company form to log in
     * @param $Request
     * @return $this
     */
    public function validateCompanyToSignin($Request)
    {

        $validation = $this->validate($Request,[
            'Email'     => v::noWhitespace()->notEmpty()->Email(),
            'Password'  => v::noWhitespace()->notEmpty(),
        ]);
        return $this;
    }

}