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
$app->get('/users',"UserController:users");
$app->get('/user/{id}/approvedrequests',"UserController:requests");
$app->Post('/user/map',"UserController:setMaps");
$app->Post('/user/rate',"UserController:rate");

//search companies by user routes
$app->get('/search/{LocationTarget}',"UserController:index");


// company routes
$app->post('/company/signup',"AuthController:companySignup");
$app->post('/company/signin',"AuthController:companySignin");
$app->post('/company/signout',"AuthController:companySignOut");
$app->post('/company/requests',"CompanyController:index");
$app->post('/company/requests/action',"CompanyController:action");
$app->get('/companies',"CompanyController:companies");
$app->get('/company/{id}/approvedrequests',"CompanyController:requests");
$app->post('/company/map',"CompanyController:setMaps");
$app->post('/company/rate',"CompanyController:rate");


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