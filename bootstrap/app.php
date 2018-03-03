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

$container['UserValidation']=function ($container){
    return new App\API\Validation\UserValidation($container);
};
// store object from Home class
$container['HomeController']=function ($container){
    return new App\API\Controllers\HomeController($container);
};
// store object from Auth controller
$container['AuthController']=function ($container){
    return new App\API\Controllers\Auth\AuthController($container);
};
$container['Auth']=function ($container){
    return new \App\API\Auth\Auth($container);
};
//Auth



//eloquent database
$capsule = new Illuminate\Database\Capsule\Manager();
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['db']=function ($container) use ($capsule){
    return $capsule;
};
$app->add(new \App\API\Middleware\ValidationErrorsMiddleware($container));

//
//routes
require __DIR__ .'/../app/routes.php';
