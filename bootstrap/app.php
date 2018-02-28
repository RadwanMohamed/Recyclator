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

// make  copy of container
$container = $app->getContainer();

// store object from Home class
$container['HomeController']=function ($container){
    return new App\API\Controllers\HomeController($container);
};

//eloquent database
$capsule = new Illuminate\Database\Capsule\Manager();
$capsule->addConnection($container['settings']['db']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
$container['db']=function ($container) use ($capsule){
    return $capsule;
};
//

//routes
require __DIR__ .'/../app/routes.php';
