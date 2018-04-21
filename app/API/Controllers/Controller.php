<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 28/02/18
 * Time: 02:13 م
 */

namespace App\API\Controllers;


class Controller
{
    /**
     * @var array
     */
    protected $container;

    /**
     * Controller constructor.
     * @param $container
     */
    public function  __construct($container)
    {
        $this->container = $container;
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