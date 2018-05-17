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
 use App\API\Models\CompanyRequests;

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

     /**
      * send request to specific company
      * @param $Request
      * @param $Response
      * @return mixed
      */
    public function makeRequest($Request,$Response){
        $validation = $this->UserValidation->validateUserRequest($Request);
        if (!$validation->failed()){
            $request = CompanyRequests::create([
                'Status' => -1,
                'Request_ID' => $Request->getParam('Request_ID'),
                'Company_ID' => $Request->getParam('Company_ID')
            ]);
            if ($request){
                $response['status']= "success";
                $response['Message']= "the Request is send";
                return $Response->withJson($response,200);

            }else{
                $response['status']= "failed";
                $response['Message']= "the Request is not send";
                return $Response->withJson($response,422);
            }
        }
    }


}