<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 21/04/18
 * Time: 09:36 م
 */

namespace App\API\Validation;
use Respect\Validation\Validator as V;

/**
 * validate Requests inputs
 * Class RequestValidation
 * @package App\API\Validation
 */
class RequestValidation extends Validator
{
    /**
     * validate the user request
     * @param $Request
     * @return $this
     */
    public function ValidateRequest($Request){
        $validation = $this->validate($Request,[
            'Name'      => v::noWhitespace()->notEmpty()->alpha(),
            'quantity'  => v::noWhitespace()->notEmpty()->intVal(),
            'SuggetedPrice'  => v::noWhitespace(),
            'User_ID'  => v::noWhitespace()->notEmpty()->intVal(),
            'Material_ID'  => v::noWhitespace()->notEmpty()->intVal(),
            'Image'     => v::noWhitespace()->notEmpty(),
        ]);
        return $this;
    }
}