<?php
/**
 * Created by PhpStorm.
 * User: radwan
 * Date: 22/04/18
 * Time: 08:03 ص
 */

namespace App\API\Controllers;

use App\API\Controllers\Controller;
use App\API\Models\Request;
use App\API\Models\RequestMaterial;
class RequestController extends Controller
{
    /**
     * return all requests that are available in DB
     * @param $Response
     * @return mixed
     */
    public function index($Request,$Response){

        $requests = Request::all();
        dd($requests[0]->Companies);
        //return $Response->withJson($requests);
    }

    /**
     * add the request material type
     * @param $Request
     * @param $Response
     * @param $id
     * @return bool
     */
    public function addMaterial($Request,$Response,$id){
        RequestMaterial::create([
            'Request_ID' => $id,
            'Material_ID' =>$Request->getParam('Material_ID')
        ]);
        return true;
    }

    /**
     * store the user's requests in database
     * @param $Request
     * @param $Response
     * @return mixed
     */
    public function create($Request,$Response){
        $validation = $this->RequestValidation->ValidateRequest($Request);

        if (!$validation->failed()){
            $request = Request::create([
                'Name' => $Request->getParam('Name'),
                'quantity' => $Request->getParam('quantity'),
                'SuggetedPrice' => $Request->getParam('SuggetedPrice'),
                'Image' => $Request->getParam('Image'),
                'User_ID' => $Request->getParam('User_ID')
            ]);

            if ($request){
                $this->addMaterial($Request,$Response,$request->id);
                $response['message'] = "the request is completed";
                $response['status'] = 'success';
                return $Response->withJson($response, 200);
            }else{
                $response['message'] = "the request is not completed";
                $response['status'] = 'failed';
                return $Response->withJson($response, 422);
            }
        }
    }


}