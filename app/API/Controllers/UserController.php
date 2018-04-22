<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 21/04/18
 * Time: 05:06 م
 */

namespace App\API\Controllers;

 use App\API\Controllers\Controller;
 use App\API\Models\Company;
 use App\API\Models\User;

 class UserController extends Controller
{
     /**
      * search for companies that serve specific target
      * @param $Request
      * @param $Response
      * @return mixed
      */
    public function index($Request,$Response){

        $validation = $this->UserValidation->validateUserSearch($Request);
        if (!$validation->failed()){
            $target = $Request->getParam('LocationTarget');
            $companies = Company::where('LocationTarget','LIKE',"%$target%")->get();
            if ($companies->isNotEmpty()){
                return $Response->withJson($companies);
            }else{
                $response['message'] = 'nothing is found';
                return $Response->withJson($response);
            }
        }
    }


}