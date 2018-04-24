<?php
/**
 * Created by PhpStorm.
 * User: radwan mohamed
 * Date: 28/02/18
 * Time: 11:16 AM
 */
$app->get('/',"HomeController:index");

//user routes

$app->post('/signup',"AuthController:userSignup");
$app->post('/signin',"AuthController:userSignin");
$app->post('/signout',"AuthController:userSignOut");
$app->post('/request/make',"UserController:makeRequest");

//search companies by user routes
$app->post('/search',"UserController:index");


// company routes
$app->post('/company/signup',"AuthController:companySignup");
$app->post('/company/signin',"AuthController:companySignin");
$app->post('/company/signout',"AuthController:companySignOut");
$app->post('/company/requests',"CompanyController:index");

// Requests
$app->get('/request',"RequestController:index");
$app->post('/request',"RequestController:create");


// materials
$app->get('/material','MaterialTypeController:index');
$app->Post('/material','MaterialTypeController:create');
/*
 *
 $app->group('',function ()use ($app){

})->add(new \App\API\Middleware\AuthMiddleware());

$app->group('',function ()use ($app){

})->add(new \App\API\Middleware\GuestMiddleware());
*/