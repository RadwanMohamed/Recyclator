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
 use App\API\Models\Request;

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
            $target = $Request->getAttribute('LocationTarget');
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
    /**
     * return all users
     * @param  [mixed] $Request  [description]
     * @param  [mixed] $Response [description]
     * @return [mixed]           [description]
     */
    public function users($Request,$Response){
        $users = User::all();
        return $Response->withJson($users);

    }
    /**
     * [setMaps taked the coordination of the company in the map and sets it in the DB]
     * @param [Mixed] $Request  [description]
     * @param [Mixed] $Response json
     */
public function setMaps($Request,$Response){
        $validation = $this->UserValidation->validateToMap($Request);

         if (!$validation->failed()) {
            $map = User::where('id',$Request->getParam('id'))->update([
                    'width' => $Request->getParam('width'),
                    'height' => $Request->getParam('height')
            ]);
            
            
            if ($map) {
                $data["status"] = 'success';
                $data["message"] = 'your response is recorded';
                return $Response->withJson($data,200);
            }else
            {
                $data["status"] = 'failed';
                $data["message"] = 'something is wrong';
                return $Response->withJson($data,422);
            }
         }

    }
/**
 * store rate 
 * @param  [type] $Request  [description]
 * @param  [type] $Response [description]
 * @return [type]           [description]
 */
    public function rate($Request,$Response){
              $validation = $this->UserValidation->validaterate($Request);
               if (!$validation->failed()) {
                    $rate = User::where('id',$Request->getParam('id'))->update([
                    'rate' => $Request->getParam('rate'),
                    
            ]);
            
            
            if ($rate) {
                $data["status"] = 'success';
                $data["message"] = 'your response is recorded';
                return $Response->withJson($data,200);
            }else
            {
                $data["status"] = 'failed';
                $data["message"] = 'something is wrong';
                return $Response->withJson($data,422);
            }
               }
    }
    /**
     * return all requests for specific user
     * @param  [type] $Request  [description]
     * @param  [type] $Response [description]
     * @return [type]           [description]
     */
    public function requests($Request,$Response){
          $id = intval($Request->getAttribute('id')); 
          $data = Request::where('User_ID',$id)->get();
          return $Response->withJson($data,200);
    }
    /**
     * return rate, width, and height from company
     * @param  mixed $Request  
     * @param  mixed $Response 
     * @return mixed           
     */
    public function getRate($Request,$Response){
        $data = User::select('id','width','height','rate')->get();
        return $Response->withJson($data,200);
    }
       /**
     * return user by id  
     * @param  [type] $Request  [description]
     * @param  [$Response]  [description]
     * @return mixed   company
     */
    public function get($Request, $Response){
            $id = intval($Request->getAttribute('id'));
            $data = User::where('id',$id)->get();
            return $Response->withJson($data,200);
    }
}