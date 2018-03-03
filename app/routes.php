<?php
/**
 * Created by PhpStorm.
 * User: radwan mohamed
 * Date: 28/02/18
 * Time: 11:16 AM
 */
$app->get('/',"HomeController:index");
$app->post('/signup',"AuthController:signup");
$app->post('/signin',"AuthController:signin");
$app->post('/signout',"AuthController:signOut");

/*
 *
 $app->group('',function ()use ($app){

})->add(new \App\API\Middleware\AuthMiddleware());

$app->group('',function ()use ($app){

})->add(new \App\API\Middleware\GuestMiddleware());
*/