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


}
