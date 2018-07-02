<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 22/04/18
 * Time: 03:47 م
 */

namespace App\API\Controllers;
use App\API\Controllers\Controller;
use App\API\Models\Company;
use App\API\Models\CompanyRequests;


class CompanyController extends Controller
{
    /**
     * return all company requests
     * @param $Request
     * @param $Response
     * @return mixed
     */
    public function index($Request,$Response)
    {
        $data = [];
        $id = intval($Request->getParam('id'));
        $companies = Company::find($id);
        if (!is_null($companies)) {
            foreach ($companies->requests as $request) {
                array_push($data, $request);
            }
            return $Response->withJson($data,200);
        }else{
            $data["status"] = 'failed';
            $data["message"] = 'please check the company id';
            return $Response->withJson($data,422);
        }
    }
/**
 * this methof is to store the company decision about specific request
 * @param  [object] $Request  [the request that is coming from user]
 * @param  [object] $Response [the return response]
 * @return [mixed]           
 */
    public function action($Request,$Response){
        $validation = $this->CompanyValidation->validateAction($Request);
        if (!$validation->failed()) {
            $status = CompanyRequests::where('id', $Request->getParam('id'))->update([
                'Status' => $Request->getParam('Status')
            ]);
            if ($status){
                $data["status"] = 'success';
                $data["message"] = 'your response is recorded';
                return $Response->withJson($data,200);
            }else{
                $data["status"] = 'failed';
                $data["message"] = 'something is wrong';
                return $Response->withJson($data,422);
            }
        }
    }
    /**
     * return all companies
     * @param  [mixed] $Request  [description]
     * @param  [mixed] $Response [description]
     * @return [mixed]           [description]
     */
    public function companies($Request,$Response){
        $companies = Company::all();
        return $Response->withJson($companies);

    }
    /**
     * [setMaps taked the coordination of the company in the map and sets it in the DB]
     * @param [Mixed] $Request  [description]
     * @param [Mixed] $Response json
     */
    public function setMaps($Request,$Response){
        $validation = $this->CompanyValidation->validateToMap($Request);

         if (!$validation->failed()) {
            $map = Company::where('id',$Request->getParam('id'))->update([
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
     *store company rate
     * @param  [type] $Request  [description]
     * @param  [type] $Response [description]
     * @return [type]           [description]
     */
     public function rate($Request,$Response){
              $validation = $this->CompanyValidation->validaterate($Request);
               if (!$validation->failed()) {
                    $rate = Company::where('id',$Request->getParam('id'))->update([
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



}
