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


}
