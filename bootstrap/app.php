<?php
/**
 * Created by PhpStorm.
 * User: radwan mohamed
 * Date: 28/02/18
 * Time: 11:00 AM
 */

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config.php';

$app = new \Slim\App(['settings'=> $config]);

// start session
session_start();

// make  copy of container
$container = $app->getContainer();

/**
 * add obj from validator
 * @param $container
 * @return \App\API\Validation\Validator
 */

$container['validator']=function ($container){
    return new App\API\Validation\Validator($container);
};
/**
 * stores user validation  obj
 * @param $container
 * @return \App\API\Validation\UserValidation
 */

$container['UserValidation']=function ($container){
    return new App\API\Validation\UserValidation($container);
};
/**
 *  stores company validation  obj
 * @param $container
 * @return \App\API\Validation\CompanyValidation
 */
$container['CompanyValidation']=function ($container){
    return new App\API\Validation\CompanyValidation($container);
};

/**
 * stores user HomeController  obj
 * @param $container
 * @return \App\API\Controllers\HomeController
 */
$container['HomeController']=function ($container){
    return new App\API\Controllers\HomeController($container);
};


/**
 * store object from Auth controller
 * @param $container
 * @return \App\API\Controllers\Auth\AuthController
 */
$container['AuthController']=function ($container){
    return new App\API\Controllers\Auth\AuthController($container);
};
/**
 * store object from Auth controller
 * @param $container
 * @return \App\API\Auth\Auth
 */

$container['Auth']=function ($container){
    return new \App\API\Auth\Auth($container);
};
/**
 * store object from user controller
 * @param $container
 * @return \App\API\Controllers\UserController
 */

$container['UserController']=function ($container){
    return new App\API\Controllers\UserController($container);
};



//eloquent database
$capsule = new Illuminate\Database\Capsule\Manager();
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['db']=function ($container) use ($capsule){
    return $capsule;
};
/**
 * middleware to check some errors that appears
 */
$app->add(new \App\API\Middleware\ValidationErrorsMiddleware($container));


//routes
require __DIR__ .'/../app/routes.php';
