<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 22/04/18
 * Time: 09:40 ص
 */

namespace App\API\Validation;
use Respect\Validation\Validator as V;

/**
 * Class MaterialTypeValidation validate Material inputs
 * @package App\API\Validation
 */
class MaterialTypeValidation extends Validator
{
    /**
     * function responsible for validate information to insert material
     * @param $Request
     * @return $this
     */
    public function validateMaterial($Request)
    {

        $validation       = $this->validate($Request,[
            'Name'        => V::noWhitespace()->notEmpty()->alpha(),
            'Type'        => V::noWhitespace()->notEmpty()->alpha(),
            'measurement' => V::noWhitespace()->notEmpty()->alpha()
        ]);
        return $this;
    }
}