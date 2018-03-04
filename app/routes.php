<?php
/**
 * Created by PhpStorm.
 * User: radwan mohamed
 * Date: 28/02/18
 * Time: 11:16 AM
 */
$app->get('/',"HomeController:index");
$app->post('/signup',"AuthController:userSignup");
$app->post('/signin',"AuthController:userSignin");
$app->post('/signout',"AuthController:userSignOut");

/*
 *
 $app->group('',function ()use ($app){

})->add(new \App\API\Middleware\AuthMiddleware());

$app->group('',function ()use ($app){

})->add(new \App\API\Middleware\GuestMiddleware());
*/