<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 03/03/18
 * Time: 12:44 م
 */

namespace App\API\Validation;
use Respect\Validation\Exceptions\NestedValidationException;
use  Respect\Validation\Validator as Respect;

/**
 * Class Validator base class
 * @package App\API\Validation
 */
class Validator
{
    /**
     * errors container
     * @var array
     */
    protected $errors = [];

    /**
     * add errors the result from validation
     *  in organized way
     * @param $Request
     * @param array $rules
     * @return $this
     */

    public  function validate($Request, array $rules){
        foreach ($rules as $field=>$rule){
            try {
                $rule->setName(ucfirst($field))->assert($Request->getParam($field));
            }catch (NestedValidationException $exception){
                $this->errors[$field] = $exception->getMessages();
            }
        }
        $_SESSION['errors'] = $this->errors;

        return $this;
    }

    /**
     * checks if the errors is not empty
     * @return bool
     */
    public function failed(){
       return !empty($this->errors);
    }
}