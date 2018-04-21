<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 03/03/18
 * Time: 02:46 م
 */

namespace App\API\Middleware;


class Middleware
{
    protected $container;

    /**
     * @return mixed
     */
    public function __construct($container)
    {
         $this->container=$container;
    }

    /**
     * @param $property
     * @return mixed
     */
    public function __get($property)
    {
        if($this->container->{$property}){
            return $this->container->{$property};
        }
    }

}